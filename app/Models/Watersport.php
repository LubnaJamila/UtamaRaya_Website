<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watersport extends Model
{
    protected $table = 'watersport';
    protected $primaryKey = 'id_watersport';
    protected $fillable = [
        'nama_watersport',
        'harga_watersport',
        'deskripsi',
        'gambar_watersport'
    ];
}
