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
        Schema::create('rek_pembayaran', function (Blueprint $table) {
            $table->Increments('id_rek');
            $table->string('nama_bank');
            $table->string('nama_pemilik');
            $table->string('no_rek');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rek_pembayaran');
    }
};
