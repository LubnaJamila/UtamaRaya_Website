<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $primaryKey = 'id_booking';

    protected $fillable = [
        'tanggal_checkin',
        'tanggal_checkout',
        'total_harga',
        'min_dp',
        'bukti_tf',
        'status_booking',
        'bukti_pengembalian',
        'alasan_pengembalian',
        'no_rek_tamu',
        'nama_pemilik_tamu',
        'nama_bank_tamu',
        'id_no_kamar',
        'id_rek',
        'id_user',
    ];

    /**
     * Relasi ke model User.
     */
    
    /**
     * Relasi ke model NoKamar.
     */
    public function noKamar()
    {
        return $this->belongsTo(NoKamar::class, 'id_no_kamar');
    }

    /**
     * Relasi ke model RekPembayaran.
     */
    public function rekPembayaran()
    {
        return $this->belongsTo(RekPembayaran::class, 'id_rek');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}