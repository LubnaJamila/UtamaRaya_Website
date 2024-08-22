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
        Schema::create('watersport', function (Blueprint $table) {
            $table->Increments('id_watersport');
            $table->string('nama_watersport');
            $table->integer('harga_watersport');
            $table->string('deskripsi');
            $table->string('gambar_watersport');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watersport');
    }
};
