<?php

namespace App\Http\Controllers;
use App\Models\User;
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
       $jenisKelamin = User::getJenisKelamin(); 
    return view('frontend.umkm.umkm', compact('jenisKelamin'));
    }

    public function akomodasi(){
        return view('frontend.hotel');
    }
}