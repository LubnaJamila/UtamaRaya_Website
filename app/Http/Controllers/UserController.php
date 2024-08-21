<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('backend.user.dashboard');
    }

    public function pembatalan(){
        return view('backend.user.pembatalan');
    }

    public function pengaturan(){
         $user=auth()->user();
        $data['user']=$user;
        return view('backend.pengaturan.profileuser' , $data);
    }
        public function edit_profile()
    {
        $user=auth()->user();
        $data['user']=$user;
        return view('Backend.pengaturan.edituser',$data);
    }

  public function update_profile(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'no_hp' => 'required|string|max:15',
           
        ], [
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus berformat email yang valid',
            'email.unique' => 'Email sudah digunakan',
            'no_hp.required' => 'No Hp wajib diisi',
        ]);
        
        $user=auth()->user();
        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);
        return redirect()->route('edit_profile')->with('success','profile berhasil di edit');
    }
}