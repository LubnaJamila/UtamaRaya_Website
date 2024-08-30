<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentalbikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rental_bike')->insert([
            [
                'nama_rentalbike' => 'Sepeda Keranjang Cewek',
                'harga_rentalbike' => 75000,
                'gambar_rentalbike' => 'gambar_rentalbike/sepeda_cewek.jpeg',
            ],
        ]);
    }
}