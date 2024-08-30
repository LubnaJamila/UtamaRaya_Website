<?php

namespace Database\Seeders;

use App\Models\NoKamar;
use App\Models\Penginapan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenginapanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penginapanData = [
            [
                'nama_kamar' => 'Deluxe Room',
                'harga_weekdays' => 800000,
                'harga_weekend' => 1000000,
                'jumlah_ruangan' => 10,
                'deskripsi' => json_encode(['AC', 'TV', 'Wi-Fi Gratis']),
                'gambar_kamar' => 'gambar_kamar/kamar_deluxe.png',
                'jumlah_no_kamar' => 10,
            ],
            [
                'nama_kamar' => 'Suite Room',
                'harga_weekdays' => 1500000,
                'harga_weekend' => 1800000,
                'jumlah_ruangan' => 5,
                'deskripsi' => json_encode(['AC', 'TV', 'Bathtub', 'Wi-Fi Gratis']),
                'gambar_kamar' => 'gambar_kamar/kamar_suite.jpeg',
                'jumlah_no_kamar' => 5,
            ],
        ];

        // Simpan data penginapan
        foreach ($penginapanData as $data) {
            $tipeKamar = Penginapan::create([
                'nama_kamar' => $data['nama_kamar'],
                'harga_weekdays' => $data['harga_weekdays'],
                'harga_weekend' => $data['harga_weekend'],
                'jumlah_ruangan' => $data['jumlah_ruangan'],
                'deskripsi' => $data['deskripsi'],
                'gambar_kamar' => $data['gambar_kamar'],
            ]);

            // Simpan nomor kamar berdasarkan jumlah_no_kamar
            for ($i = 1; $i <= $data['jumlah_no_kamar']; $i++) {
                NoKamar::create([
                    'no_kamar' => $i,
                    'id_tipe_kamar' => $tipeKamar->id_tipe_kamar,
                ]);
            }
        }
    }
}