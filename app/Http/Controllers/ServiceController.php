<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    
    public function showBallroom(){
        $pageTitle = 'Ballroom Wedding';
        return view('frontend.services.ballroom', compact('pageTitle'));
    }
    public function detailBallroom(){
        return view('frontend.services.detail_ballroom');
    }

    public function showWaterSport(){
        $pageTitle = 'Water Sport';
        return view('frontend.services.water-sport', compact('pageTitle'));
    }

    public function showRentalBike()
    {
        $pageTitle = 'Rental Bike';
        return view('frontend.services.rental-bike', compact('pageTitle'));
    }
}