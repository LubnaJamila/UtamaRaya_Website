<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.landingpage');
    }

    public function about(){
        return view('frontend.about');
    }

    public function umkm()
{
    $products = DB::table('produk')
        ->join('langganan', 'produk.id_langganan', '=', 'langganan.id_langganan')
        ->join('users', 'langganan.id_user', '=', 'users.id') 
        ->where('langganan.status_langganan', 'aktif')
        ->select('produk.*', 'users.no_hp')
        ->get();

    $jenisKelamin = User::getJenisKelamin();

    return view('frontend.umkm.umkm', compact('jenisKelamin', 'products'));
}



    public function akomodasi(){
        return view('frontend.hotel');
    }
}