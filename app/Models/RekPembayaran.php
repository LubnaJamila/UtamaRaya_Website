<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekPembayaran extends Model
{
    protected $table = 'rek_pembayaran';
    protected $primaryKey = 'id_rek';
    protected $fillable = [
        'nama_bank',
        'nama_pemilik',
        'harga_rata',
        'no_rek'
    ];
}
