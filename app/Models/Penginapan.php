<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    protected $table = 'tipe_kamar';
    protected $primaryKey = 'id_tipe_kamar';
    protected $fillable = [
        'nama_kamar',
        'harga_weekdays',
        'harga_weekend',
        'jumlah_ruangan',
        'deskripsi',
        'gambar_kamar',
    ];

    public function noKamar()
    {
        return $this->hasMany(NoKamar::class, 'id_tipe_kamar');
    }
}
