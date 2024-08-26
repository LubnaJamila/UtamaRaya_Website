<?php

namespace App\Http\Controllers;

use App\Models\RentalBike;
use App\Models\Watersport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ServiceController extends Controller
{
    
    public function showBallroom(){
        $pageTitle = 'Ballroom Wedding';
        $nama_paket_wedding_1 = DB::table('wedding') 
        ->where('nama_paket', 'Teras Pantai')
        ->select('wedding.*')
        ->get();
        $nama_paket_wedding_2 = DB::table('wedding') 
        ->where('nama_paket', 'Royal Ballroom')
        ->select('wedding.*')
        ->get();
        return view('frontend.services.ballroom', compact('pageTitle','nama_paket_wedding_1','nama_paket_wedding_2'));
    }
    public function detailBallroom(){
        $nama_paket_wedding_1 = DB::table('wedding') 
        ->where('nama_paket', 'Teras Pantai')
        ->select('wedding.*')
        ->get();
        return view('frontend.services.detail_ballroom',compact('nama_paket_wedding_1'));
    }
    public function detailBallroom2(){
        $nama_paket_wedding_2 = DB::table('wedding') 
        ->where('nama_paket', 'Royal Ballroom')
        ->select('wedding.*')
        ->get();
        return view('frontend.services.detail_ballroom2',compact('nama_paket_wedding_2'));
    }

    public function showWaterSport(){
        $pageTitle = 'Water Sport';
        $watersport= Watersport::all();
        return view('frontend.services.water-sport', compact('pageTitle','watersport'));
    }

    public function showRentalBike()
    {
        $pageTitle = 'Rental Bike';
        $rentalBikes = RentalBike::all();
        return view('frontend.services.rental-bike', compact('pageTitle','rentalBikes'));
    }
}