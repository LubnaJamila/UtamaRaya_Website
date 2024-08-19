<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index(){
    $monthlyBookings = [
        ['month' => 'January', 'total' => 150],
        ['month' => 'February', 'total' => 200],
        ['month' => 'March', 'total' => 175],
    ];

    $umkmStatuses = [
        ['status' => 'Menunggu Pengaktifan', 'count' => 30],
        ['status' => 'Sudah Aktif', 'count' => 50],
        ['status' => 'Butuh Perpanjangan', 'count' => 20]
    ];
    return view('backend.admin.dashboard_admin', compact('monthlyBookings', 'umkmStatuses'));
}

    public function akomodasi(){
         return view('backend.admin.master.akomodasi');
    }
    public function create()
    {
        return view('backend.admin.master.createakomodasi');
    }
    public function edit()
    {
        return view('backend.admin.master.editakomodasi');
    }
    public function watersport(){
         return view('backend.admin.master.watersport');
    }
     public function createwater()
    {
        return view('backend.admin.master.createwater');
    }
      public function editwater()
    {
        return view('backend.admin.master.editwater');
    }
    public function rental(){
         return view('backend.admin.master.rental');
    }
    public function createrental()
    {
        return view('backend.admin.master.createrental');
    }
       public function editrental()
    {
        return view('backend.admin.master.editrental');
    }
    public function ballroom(){
         return view('backend.admin.master.ballroom');
    }
       public function createballroom()
    {
        return view('backend.admin.master.createballroom');
    }
      public function editballroom()
    {
        return view('backend.admin.master.editballroom');
    }
}