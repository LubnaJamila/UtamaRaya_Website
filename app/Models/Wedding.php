<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    protected $table = 'wedding';
    protected $primaryKey = 'id_wedding';
    protected $fillable = [
        'nama_paket',
        'harga_paket',
        'deskripsi',
        'gambar_paket',
    ];
}
