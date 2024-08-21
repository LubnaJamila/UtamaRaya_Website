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
        Schema::create('langganan', function (Blueprint $table) {
            $table->Increments('id_langganan');
            $table->enum('status_langganan',['belum langganan','menunggu verifikasi', 'aktif', 'nonaktif']);
            $table->date('tanggal_mulai')->nullable();  
            $table->date('tanggal_berakhir')->nullable();  
            $table->string('bukti_tf')->nullable();
            $table->integer('harga_terkecil');
            $table->integer('harga_tertinggi');
            $table->integer('harga_rata');
            $table->integer('harga_langganan');
            $table->unsignedBigInteger('id_user'); 
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('id_rek')->nullable(); 
            $table->foreign('id_rek')->references('id_rek')->on('rek_pembayaran')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('langganan');
    }
};
