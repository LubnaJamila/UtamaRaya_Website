<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UMKMController extends Controller
{
    public function showUMKM()
    {
        return view('frontend.umkm.detail_umkm');
    }
}