<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WatersportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('watersport')->insert([
            [
                'nama_watersport' => 'Jet Ski',
                'harga_watersport' => 250000,
                'deskripsi' => '10 Menit',
                'gambar_watersport' => 'gambar_watersport/jet_ski.jpeg',
            ],
        ]);
    }
}