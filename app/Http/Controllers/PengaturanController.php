<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

class PengaturanController extends Controller
{
    public function profile()
    {

        $user=auth()->user();
        $data['user']=$user;
        return view('Backend.pengaturan.profile', $data);
    }
     public function edit_profile_umkm()
    {
        $user=auth()->user();
        $data['user']=$user;
        return view('Backend.pengaturan.edit_profile',$data);
    }
    public function ubah_password()
    {
        return view('Backend.pengaturan.ubah_password');
    }
     public function update_profile_umkm(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:15',
            'nama_usaha' => 'required|string|max:50',
            'deskripsi_umkm' => 'required|string|max:300',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus berformat email yang valid',
            'no_hp.required' => 'No Hp wajib diisi',
            'nama_usaha.required' => 'Nama Usaha wajib diisi',
            'deskripsi_umkm.required' => 'Deskripsi Usaha wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
        ]);
        
        $user=auth()->user();
        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'nama_usaha' => $request->nama_usaha,
            'deskripsi_umkm' => $request->deskripsi_umkm,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        return redirect()->route('edit_profile_umkm')->with('success','profile berhasil di edit');
    }
    public function update_password(Request $request){
        $request->validate([
           'old_password'=>'required|min:3',
           'new_password'=>'required|min:3',
           'confirm_password'=>'required|same:new_password'
            
        ]);
        $current_user=auth()->user();
        if(Hash::check($request->old_password,$current_user->password )){
            $current_user->update([
                'password'=>bcrypt($request->new_password)
            ]);
            return redirect()->back()->with('succsess','Password berhasil diubah');
        }else{
            return redirect()->back()->with('error','Current Password Salah');
        }
    } 
   
}