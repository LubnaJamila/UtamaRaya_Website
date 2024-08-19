<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    public function rekening(){
         return view('backend.admin.validasi.rekening');
    }
     public function editerekening(){
         return view('backend.admin.validasi.editrekening');
    }
    public function createrekening(){
         return view('backend.admin.validasi.createrekening');
    }
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