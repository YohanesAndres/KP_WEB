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
        Schema::create('uang_jalan', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            $table->unsignedBigInteger('id_kendaraan');
            $table->foreign('id_kendaraan')->references('id')->on('kendaraan')->onDelete('cascade');
            $table->string('barcode', 50);
            $table->unsignedBigInteger('id_muat_bongkar');
            $table->foreign('id_muat_bongkar')->references('id')->on('muat_bongkar')->onDelete('cascade');
            $table->integer('jumlah_uang_jalan');
            $table->boolean('cek');
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
        Schema::dropIfExists('uang_jalan');
    }
};
