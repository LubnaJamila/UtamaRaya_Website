<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\NoKamar;
use App\Models\Penginapan;
use App\Models\TipeKamar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RescheduleController extends Controller
{
    public function checkAvailabilityReschedule(Request $request)
    {
        $roomId = $request->input('room_id');
        $id_booking = $request->input('id_booking');
        $checkInDate = $request->input('check_in_date');
        $checkOutDate = $request->input('check_out_date');
        
        $unavailableRoomIds = Booking::where(function ($query) use ($checkInDate, $checkOutDate) {
            $query->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->whereBetween('tanggal_checkin', [$checkInDate, $checkOutDate])
                    ->orWhereBetween('tanggal_checkout', [$checkInDate, $checkOutDate])
                    ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                        $query->where('tanggal_checkin', '<', $checkOutDate)
                            ->where('tanggal_checkout', '>', $checkInDate);
                    });
            });
        })
            ->whereIn('status_booking', ['pengajuan_booking', 'booking', 'check in'])
            ->pluck('id_no_kamar');

        $cancellableRooms = NoKamar::where('id_tipe_kamar', $roomId)
            ->whereIn('id_no_kamar', function ($query) use ($checkInDate, $checkOutDate) {
                $query->select('id_no_kamar')
                    ->from('booking')
                    ->whereIn('status_booking', ['pengajuan_pembatalan', 'dibatalkan', 'check out'])
                    ->where(function ($query) use ($checkInDate, $checkOutDate) {
                        $query->where(function ($query) use ($checkInDate, $checkOutDate) {
                            $query->whereBetween('tanggal_checkin', [$checkInDate, $checkOutDate])
                                ->orWhereBetween('tanggal_checkout', [$checkInDate, $checkOutDate])
                                ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                                    $query->where('tanggal_checkin', '<', $checkOutDate)
                                        ->where('tanggal_checkout', '>', $checkInDate);
                                });
                        });
                    })
                    ->pluck('id_no_kamar');
            })
            ->whereNotIn('id_no_kamar', $unavailableRoomIds)
            ->get();

        $allAvailableRooms = NoKamar::where('id_tipe_kamar', $roomId)
            ->whereNotIn('id_no_kamar', $unavailableRoomIds)
            ->get()
            ->merge($cancellableRooms)
            ->unique('id_no_kamar');

        $roomType = Penginapan::find($roomId);

        $booking = Booking::with('NoKamar.Penginapan')->findOrFail($id_booking);

        $totalPrice = 0;
        $currentDate = Carbon::parse($checkInDate);

        while ($currentDate->lessThan(Carbon::parse($checkOutDate))) {
            $dayOfWeek = $currentDate->dayOfWeek;
            $isWeekend = ($dayOfWeek == Carbon::FRIDAY || $dayOfWeek == Carbon::SATURDAY);

            $pricePerDay = $isWeekend ? $roomType->harga_weekend : $roomType->harga_weekdays;
            $totalPrice += $pricePerDay;

            $currentDate->addDay();
        }

        $numberOfNights = Carbon::parse($checkInDate)->diffInDays(Carbon::parse($checkOutDate));

        return view('backend.user.reschedule2', [
            'roomType' => $roomType,
            'availableRooms' => $allAvailableRooms,
            'totalPrice' => $totalPrice,
            'checkInDate' => $checkInDate,
            'checkOutDate' => $checkOutDate,
            'numberOfNights' => $numberOfNights,
            'booking' => $booking, 
        ]);
    }
    public function updateBooking(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'booking_id' => 'required|integer|exists:booking,id_booking',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date',
            'total_price' => 'required|numeric',
            'selected_room_id' => 'required|integer|exists:no_kamar,id_no_kamar',
        ]);

        $booking = Booking::find($validatedData['booking_id']);

        if (!$booking) {
            return redirect()->back()->withErrors(['Booking not found.']);
        }

        $booking->tanggal_checkin = $validatedData['check_in_date'];
        $booking->tanggal_checkout = $validatedData['check_out_date'];
        $booking->total_harga = $validatedData['total_price'];
        $booking->id_no_kamar = $validatedData['selected_room_id'];
        $booking->update();

        return redirect()->route('dashboard')->with('success', 'Booking has been successfully rescheduled.');
    }
}