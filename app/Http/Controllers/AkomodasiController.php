<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AkomodasiController extends Controller
{
     public function showHotel(){
        $pageTitleAkomodasi = 'Hotel';
        
        return view('frontend.akomodasi.hotel', compact('pageTitleAkomodasi'));
    }
    public function showBungalauw(){
         $pageTitleAkomodasi = 'Bungalauw';
         $data_penginapan = DB::table('tipe_kamar') ->get();
        return view('frontend.akomodasi.bungalauw', compact('pageTitleAkomodasi','data_penginapan'));
    }

    public function showVilla(){
        $pageTitleAkomodasi = 'Villa';
        $data_penginapan = DB::table('tipe_kamar') ->get();
        return view('frontend.akomodasi.villa', compact('pageTitleAkomodasi', 'data_penginapan'));
    }

    public function showCootage()
    {
        $pageTitleAkomodasi = 'Cootage';
        $data_penginapan = DB::table('tipe_kamar') ->get();
        return view('frontend.akomodasi.cootage', compact('pageTitleAkomodasi', 'data_penginapan'));
    }

    public function detailAkomodasi()
    {
        return view('frontend.akomodasi.detail');
    }
    public function showStep1()
    {
        return view('frontend.akomodasi.step1');
    }
    public function showStep2()
    {
        return view('frontend.akomodasi.step2');
    }
    public function showStep3()
    {
        return view('frontend.akomodasi.step3');
    }
}