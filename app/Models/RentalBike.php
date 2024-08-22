<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalBike extends Model
{
    protected $table = 'rental_bike';
    protected $primaryKey = 'id_rentalbike';
    protected $fillable = [
        'nama_rentalbike',
        'harga_rentalbike',
        'gambar_rentalbike'
    ];
}
