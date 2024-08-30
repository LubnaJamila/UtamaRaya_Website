<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\NoKamar;
use App\Models\Penginapan;
use App\Models\TipeKamar;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $tipeKamar = Penginapan::all();
        return view('frontend.akomodasi.penginapan', ['tipeKamar' => $tipeKamar]);
    }
    public function show($id_tipe_kamar)
    {
        $tipeKamar = Penginapan::findOrFail($id_tipe_kamar);
        return view('frontend.akomodasi.step1', compact('tipeKamar'));
    }

    public function checkAvailability(Request $request)
    {
        $roomId = $request->input('room_id');
        $checkInDate = $request->input('check_in_date');
        $checkOutDate = $request->input('check_out_date');

        $allRooms = NoKamar::where('id_tipe_kamar', $roomId)->get();

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
            ->whereIn('status_booking', ['pengajuan_booking', 'booking', 'checkin']) 
            ->pluck('id_no_kamar') 
            ->toArray();

        $additionalAvailableRooms = NoKamar::where('id_tipe_kamar', $roomId)
            ->whereIn('id_no_kamar', function ($query) use ($checkInDate) {
                $query->select('id_no_kamar')
                    ->from('booking')
                    ->where('tanggal_checkout', '=', $checkInDate)
                    ->whereIn('status_booking', ['pengajuan_booking', 'booking', 'checkin'])
                    ->pluck('id_no_kamar');
            })
            ->whereNotIn('id_no_kamar', $unavailableRoomIds)
            ->get();

        $cancellableRooms = NoKamar::where('id_tipe_kamar', $roomId)
            ->whereIn('id_no_kamar', function ($query) use ($checkInDate, $checkOutDate) {
                $query->select('id_no_kamar')
                    ->from('booking')
                    ->whereIn('status_booking', ['pengajuan_pembatalan', 'dibatalkan', 'checkout'])
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

        $availableRooms = $allRooms->filter(function ($room) use ($unavailableRoomIds, $additionalAvailableRooms, $cancellableRooms) {
            return !in_array($room->id_no_kamar, $unavailableRoomIds) ||
                $additionalAvailableRooms->contains('id_no_kamar', $room->id_no_kamar) ||
                $cancellableRooms->contains('id_no_kamar', $room->id_no_kamar);
        });

        $roomType = Penginapan::find($roomId);

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

        return view('frontend.akomodasi.step2', [
            'roomType' => $roomType,
            'availableRooms' => $availableRooms,
            'totalPrice' => $totalPrice,
            'checkInDate' => $checkInDate,
            'checkOutDate' => $checkOutDate,
            'numberOfNights' => $numberOfNights
        ]);
    }

}