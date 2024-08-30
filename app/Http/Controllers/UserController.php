<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Dapatkan ID user yang sedang login
        $userId = Auth::id();
        $status = ['pengajuan_booking', 'booking', 'checkin', 'checkout'];

        // Mengambil data booking berdasarkan ID user yang sedang login
        // beserta relasi dengan no_kamar dan tipe_kamar melalui no_kamar
        $bookings = Booking::with(['NoKamar.Penginapan', 'rekPembayaran'])
            ->where('id_user', $userId)
            ->whereIn('status_booking', $status)
            ->get();
        return view('backend.user.dashboard', compact('bookings'));
    }

    public function pembatalan()
    {
        $userId = Auth::id();
        $status = ['pengajuan_pembatalan', 'dibatalkan'];

        // Mengambil data booking berdasarkan ID user yang sedang login
        // beserta relasi dengan no_kamar dan tipe_kamar melalui no_kamar
        $bookings = Booking::with(['NoKamar.Penginapan', 'rekPembayaran'])
            ->where('id_user', $userId)
            ->whereIn('status_booking', $status)
            ->get();
        return view('backend.user.pembatalan', compact('bookings'));
    }

    public function pengaturan()
    {
        $user = auth()->user();
        $data['user'] = $user;
        return view('backend.pengaturan.profileuser', $data);
    }
    public function edit_profile()
    {
        $user = auth()->user();
        $data['user'] = $user;
        return view('Backend.pengaturan.edituser', $data);
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|string|email',
            'no_hp' => 'required|string|max:15',

        ], [
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus berformat email yang valid',
            'email.unique' => 'Email sudah digunakan',
            'no_hp.required' => 'No Hp wajib diisi',
        ]);

        $user = auth()->user();
        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);
        return redirect()->route('edit_profile')->with('success', 'profile berhasil di edit');
    }
}