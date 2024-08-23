<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoKamar extends Model
{
    protected $table = 'no_kamar';
    protected $primaryKey = 'id_no_kamar';
    protected $fillable = [
        'no_kamar',
        'id_tipe_kamar',
    ];

    public function Penginapan()
    {
        return $this->belongsTo(Penginapan::class, 'id_tipe_kamar');
    }
}