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
        Schema::create('rental_bike', function (Blueprint $table) {
            $table->Increments('id_rentalbike');
            $table->string('nama_rentalbike');
            $table->integer('harga_rentalbike');
            $table->string('gambar_rentalbike');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_bike');
    }
};
