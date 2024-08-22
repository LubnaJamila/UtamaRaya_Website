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
        Schema::create('tipe_kamar', function (Blueprint $table) {
            $table->Increments('id_tipe_kamar');
            $table->string('nama_kamar');
            $table->integer('harga_weekdays');
            $table->integer('harga_weekend');
            $table->integer('jumlah_ruangan');
            $table->text('deskripsi');
            $table->string('gambar_kamar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipe_kamar');
    }
};
