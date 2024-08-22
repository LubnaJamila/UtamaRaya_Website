<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    public function pembatalan(){
         return view('backend.admin.validasi.pembatalan');
    }
     public function pembayaran(){
         return view('backend.admin.validasi.pembayaran');
    }
    public function umkm(){
         return view('backend.admin.validasi.umkm');
    }
    
}