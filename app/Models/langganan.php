<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class langganan extends Model
{
    protected $table = 'langganan';
    protected $primaryKey = 'id_langganan';

    protected $fillable = [
        'status_langganan',
        'tanggal_mulai',
        'tanggal_berakhir',
        'bukti_tf',
        'harga_terkecil',
        'harga_tertinggi',
        'harga_rata',
        'harga_langganan',
        'id_user',
        'id_rek',
    ];
}
