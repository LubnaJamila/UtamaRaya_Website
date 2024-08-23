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

        // Pengecekan kamar yang tidak tersedia berdasarkan tanggal check-in dan check-out
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
            ->whereIn('status_booking', ['pengajuan_booking', 'booking', 'check in']) // Status aktif
            ->pluck('id_no_kamar'); // ID kamar yang tidak tersedia

        // Pengecekan kamar berdasarkan status booking yang bisa dibooking lagi
        $cancellableRooms = NoKamar::where('id_tipe_kamar', $roomId)
            ->whereIn('id_no_kamar', function ($query) use ($checkInDate, $checkOutDate) {
                $query->select('id_no_kamar')
                    ->from('booking')
                    ->whereIn('status_booking', ['pengajuan_pembatalan', 'dibatalkan', 'check out']) // Status yang bisa dibooking lagi
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
            ->whereNotIn('id_no_kamar', $unavailableRoomIds) // Pastikan tidak dalam daftar unavailable
            ->get();

        // Gabungkan kamar yang tersedia dan kamar yang bisa dibooking lagi
        $allAvailableRooms = NoKamar::where('id_tipe_kamar', $roomId)
            ->whereNotIn('id_no_kamar', $unavailableRoomIds) // Kamar yang benar-benar tersedia
            ->get()
            ->merge($cancellableRooms) // Tambahkan kamar yang bisa dibooking lagi
            ->unique('id_no_kamar'); // Pastikan ID kamar unik

        // Ambil data tipe kamar
        $roomType = Penginapan::find($roomId);

        // Ambil booking berdasarkan kamar yang tersedia
        $booking = Booking::with('NoKamar.Penginapan')->findOrFail($id_booking);

        // Hitung harga berdasarkan hari dalam rentang tanggal
        $totalPrice = 0;
        $currentDate = Carbon::parse($checkInDate);

        while ($currentDate->lessThan(Carbon::parse($checkOutDate))) {
            $dayOfWeek = $currentDate->dayOfWeek;
            $isWeekend = ($dayOfWeek == Carbon::FRIDAY || $dayOfWeek == Carbon::SATURDAY);

            // Tentukan harga berdasarkan hari
            $pricePerDay = $isWeekend ? $roomType->harga_weekend : $roomType->harga_weekdays;
            $totalPrice += $pricePerDay;

            // Tambahkan satu hari
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
            'booking' => $booking, // Kirim data booking ke view
        ]);
    }
    public function updateBooking(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $validatedData = $request->validate([
            'booking_id' => 'required|integer|exists:booking,id_booking',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date',
            'total_price' => 'required|numeric',
            'selected_room_id' => 'required|integer|exists:no_kamar,id_no_kamar',
        ]);

        // Temukan booking berdasarkan ID
        $booking = Booking::find($validatedData['booking_id']);

        if (!$booking) {
            return redirect()->back()->withErrors(['Booking not found.']);
        }

        // Update booking
        $booking->tanggal_checkin = $validatedData['check_in_date'];
        $booking->tanggal_checkout = $validatedData['check_out_date'];
        $booking->total_harga = $validatedData['total_price'];
        $booking->id_no_kamar = $validatedData['selected_room_id'];
        $booking->update();

        return redirect()->route('dashboard')->with('success', 'Booking has been successfully rescheduled.');
    }
}