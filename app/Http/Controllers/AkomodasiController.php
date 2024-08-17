<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkomodasiController extends Controller
{
     public function showHotel(){
        $pageTitleAkomodasi = 'Hotel';
        return view('frontend.akomodasi.hotel', compact('pageTitleAkomodasi'));
    }
    public function showBungalauw(){
         $pageTitleAkomodasi = 'Bungalauw';
        return view('frontend.akomodasi.bungalauw', compact('pageTitleAkomodasi'));
    }

    public function showVilla(){
        $pageTitleAkomodasi = 'Villa';
        return view('frontend.akomodasi.villa', compact('pageTitleAkomodasi'));
    }

    public function showCootage()
    {
        $pageTitleAkomodasi = 'Cootage';
        return view('frontend.akomodasi.cootage', compact('pageTitleAkomodasi'));
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