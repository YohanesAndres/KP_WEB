<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_detail', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_muat');
            $table->dateTime('tanggal_bongkar');
            $table->string('nama_sopir');
            $table->unsignedBigInteger('id_uang_jalan');
            $table->foreign('id_uang_jalan')->references('id')->on('uang_jalan')->onDelete('cascade');
            $table->unsignedBigInteger('id_kendaraan');
            $table->foreign('id_kendaraan')->references('id')->on('kendaraan')->onDelete('cascade');
            $table->unsignedBigInteger('id_rekap');
            $table->foreign('id_rekap')->references('id')->on('rekap')->onDelete('cascade');
            $table->integer('kirim_kebun');
            $table->integer('terima_bulking');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekap_detail');
    }
};
