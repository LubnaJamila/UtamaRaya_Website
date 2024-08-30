<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama_lengkap' => 'Admin Utama Raya',
            'email' => 'adminur@gmail.com',
            'password' => bcrypt('adminur'),
            'jabatan' => 'admin',
        ]);
    }
}