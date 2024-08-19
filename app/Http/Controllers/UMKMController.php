<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UMKMController extends Controller
{
    public function showUMKM()
    {
        return view('frontend.umkm.detail_umkm');
    }

    public function index()
    {
        return view('backend.umkm.dashboard_umkm');
    }

     public function paketUMKM()
    {
        return view('backend.umkm.langgananumkm');
    }
    
     public function produk()
    {
        return view('backend.umkm.produk');
    }
      public function create()
    {
        return view('backend.umkm.create');
    }
       public function edit()
    {
        return view('backend.umkm.edit');
    }
    public function registerUmkm(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'no_hp' => 'required|string|max:15',
            'nama_usaha' => 'required|string|max:50',
            'deskripsi_umkm' => 'required|string|max:300',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'password' => 'required|string|min:3|confirmed',
            'password_confirmation' => 'required|string|min:3',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus berformat email yang valid',
            'email.unique' => 'Email sudah digunakan',
            'no_hp.required' => 'No Hp wajib diisi',
            'nama_usaha.required' => 'Nama Usaha wajib diisi',
            'deskripsi_umkm.required' => 'Deskripsi Usaha wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password harus terdiri dari minimal 3 karakter',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi',
            'password_confirmation.confirmed' => 'Konfirmasi password tidak sama',
            'password_confirmation.min' => 'Konfirmasi password harus terdiri dari minimal 3 karakter',
        ]);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'nama_usaha' => $request->nama_usaha,
            'deskripsi_umkm' => $request->deskripsi_umkm,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => Hash::make($request->password),
            'jabatan' => 'umkm', 
        ]);
        
        if ($user) {
           return redirect()->route('umkm')->with('Sukses', 'Pendaftaran UMKM berhasil!');
        } else {
            return back()->with('error', 'Gagal membuat akun, silakan coba lagi.');
        }
      
        
    }
}