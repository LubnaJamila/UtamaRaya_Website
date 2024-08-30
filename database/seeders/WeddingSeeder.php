<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeddingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wedding')->insert([
            [
                'nama_paket' => 'Teras Pantai',
                'harga_paket' => 20000000,
                'gambar_paket' => 'gambar_paket\teras.jpeg',
            ],
            [
                'nama_paket' => 'Royal Ballroom',
                'harga_paket' => 25000000,
                'gambar_paket' => 'gambar_paket\royal.jpeg',
            ],
        ]);
    }
}