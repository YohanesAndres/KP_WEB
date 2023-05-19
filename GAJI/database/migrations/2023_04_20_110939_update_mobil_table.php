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
        Schema::create('update_mobil', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_uang_jalan');
            $table->foreign('id_uang_jalan')->references('id')->on('uang_jalan')->onDelete('cascade');
            $table->string('status');
            $table->date('tanggal_bongkar')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('update_mobil');
    }
};
