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
        Schema::create('no_kamar', function (Blueprint $table) {
            $table->Increments('id_no_kamar');
            $table->integer('no_kamar');
            $table->unsignedInteger('id_tipe_kamar'); 
            $table->foreign('id_tipe_kamar')->references('id_tipe_kamar')->on('tipe_kamar')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('no_kamar');
    }
};
