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
        Schema::create('booking', function (Blueprint $table) {
            $table->increments('id_booking');
            $table->date('tanggal_checkin');
            $table->date('tanggal_checkout');
            $table->integer('total_harga');
            $table->integer('min_dp');
            $table->string('bukti_tf');
            $table->enum('status_booking', ['pengajuan_booking','booking','dibatalkan', 'pengajuan_pembatalan','checkin', 'checkout'])->default('pengajuan_booking')->nullable();
            $table->string('bukti_pengembalian')->nullable();
            $table->string('alasan_pengembalian')->nullable();
            $table->string('no_rek_tamu')->nullable();
            $table->string('nama_pemilik_tamu')->nullable();
            $table->string('nama_bank_tamu')->nullable();
            $table->unsignedInteger('id_no_kamar');
            $table->foreign('id_no_kamar')->references('id_no_kamar')->on('no_kamar')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('id_rek');
            $table->foreign('id_rek')->references('id_rek')->on('rek_pembayaran')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};