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
        Schema::create('rekap_fuso_detail', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_muat');
            $table->dateTime('tanggal_bongkar');
            $table->string('no_do');
            $table->unsignedBigInteger('id_kendaraan');
            $table->foreign('id_kendaraan')->references('id')->on('kendaraan')->onDelete('cascade');
            $table->string('nama_sopir');
            $table->integer('estimasi_tonase');
            $table->unsignedBigInteger('id_uang_jalan');
            $table->foreign('id_uang_jalan')->references('id')->on('uang_jalan')->onDelete('cascade');
            $table->integer('quantity_muat_pks_bruto');
            $table->integer('quantity_muat_pks_tarra');
            $table->integer('quantity_bongkar_bruto');
            $table->integer('quantity_bongkar_tarra');
            $table->decimal('mutu_pks_ffa/alb', 10, 2);
            $table->decimal('mutu_pks_ka', 10, 2);
            $table->decimal('mutu_bongkar_ffa/alb', 10, 2);
            $table->decimal('mutu_bongkar_ka', 10, 2);
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
        Schema::dropIfExists('rekap_fuso_detail');
    }
};
