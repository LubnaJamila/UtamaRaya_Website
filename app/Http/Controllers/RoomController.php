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
        // Ambil data tipe kamar
        $tipeKamar = Penginapan::all();
        return view('frontend.akomodasi.penginapan', ['tipeKamar' => $tipeKamar]);
    }
    // app/Http/Controllers/RoomController.php
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

        // Ambil semua kamar berdasarkan tipe kamar
        $allRooms = NoKamar::where('id_tipe_kamar', $roomId)->get();

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
            ->whereIn('status_booking', ['pengajuan_booking', 'booking', 'checkin']) // Status aktif
            ->pluck('id_no_kamar') // ID kamar yang tidak tersedia
            ->toArray();

        // Cek kamar yang dapat dibooking lagi jika tanggal check-out lama sama dengan tanggal check-in baru
        $additionalAvailableRooms = NoKamar::where('id_tipe_kamar', $roomId)
            ->whereIn('id_no_kamar', function ($query) use ($checkInDate) {
                $query->select('id_no_kamar')
                    ->from('booking')
                    ->where('tanggal_checkout', '=', $checkInDate) // Cek jika tanggal checkout lama sama dengan tanggal check-in baru
                    ->whereIn('status_booking', ['pengajuan_booking', 'booking', 'checkin']) // Status yang bisa dibooking lagi
                    ->pluck('id_no_kamar');
            })
            ->whereNotIn('id_no_kamar', $unavailableRoomIds) // Pastikan tidak dalam daftar unavailable
            ->get();

        // Cek kamar berdasarkan status booking yang bisa dibooking lagi
        $cancellableRooms = NoKamar::where('id_tipe_kamar', $roomId)
            ->whereIn('id_no_kamar', function ($query) use ($checkInDate, $checkOutDate) {
                $query->select('id_no_kamar')
                    ->from('booking')
                    ->whereIn('status_booking', ['pengajuan_pembatalan', 'dibatalkan', 'checkout']) // Status yang bisa dibooking lagi
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

        // Gabungkan kamar yang tersedia, kamar yang bisa dibooking lagi, dan kamar dengan checkout sama dengan check-in baru
        $availableRooms = $allRooms->filter(function ($room) use ($unavailableRoomIds, $additionalAvailableRooms, $cancellableRooms) {
            return !in_array($room->id_no_kamar, $unavailableRoomIds) ||
                $additionalAvailableRooms->contains('id_no_kamar', $room->id_no_kamar) ||
                $cancellableRooms->contains('id_no_kamar', $room->id_no_kamar);
        });

        // Ambil data tipe kamar
        $roomType = Penginapan::find($roomId);

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

        // Kirim data ke view
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