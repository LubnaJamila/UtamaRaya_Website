<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.landingpage');
    }

    public function about(){
        return view('frontend.about');
    }

    public function umkm(){
        return view('frontend.umkm.umkm');
    }

    public function akomodasi(){
        return view('frontend.hotel');
    }
}