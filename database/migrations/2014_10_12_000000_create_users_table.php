<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_lengkap')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('no_hp')->unique()->nullable();
            $table->string('nama_usaha')->nullable();
            $table->string('deskripsi_umkm')->nullable();
            $table->string('alamat')->nullable();
            $table->enum('jenis_kelamin', ['pria', 'wanita'])->nullable();
            $table->string('password');
            $table->enum('jabatan', ['user', 'admin', 'umkm'])->default('user');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};