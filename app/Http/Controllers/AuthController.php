<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|string|min:3',
    ], [
        'email.required' => 'Email wajib diisi',
        'email.exists' => 'Email tidak terdaftar',
        'password.required' => 'Password wajib diisi',
        'password.min' => 'Password harus diisi minimal 3 karakter',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $user = Auth::user();
        if ($user->jabatan == 'user') {
            return redirect()->intended('/');
        } elseif ($user->jabatan == 'umkm') {
            return redirect()->intended('umkm/langganan');
        } elseif ($user->jabatan == 'admin') {
            return redirect()->intended('dashboard_admin');
        }
    }

    return redirect()->route('login')->with('loginError', 'Login gagal! Periksa kembali email dan password Anda.');
}
    public function register(){
        return view('frontend.register');
    }

      public function registerpost(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:3|confirmed',
            'password_confirmation' => 'required|string|min:3',
            'nama_lengkap' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus berformat email yang valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password harus terdiri dari minimal 5 karakter',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi',
            'password_confirmation.confirmed' => 'Konfirmasi password tidak sama',
            'password_confirmation.min' => 'Konfirmasi password harus terdiri dari minimal 5 karakter',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'no_hp.required' => 'No Hp wajib diisi',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'no_hp' => $request->no_hp,
            'jabatan' => 'user',
        ]);

        if ($user) {
            return redirect()->route('home')->with('success', 'Akun Berhasil Dibuat!');
        } else {
            return back()->with('error', 'Gagal membuat akun, silakan coba lagi.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function forgot_password(){
        return view('frontend.forgot_password');
    }
}