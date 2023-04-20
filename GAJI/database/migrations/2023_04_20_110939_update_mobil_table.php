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
            $table->dateTime('tanggal');
            $table->string('status');
            $table->unsignedBigInteger('id_kendaraan');
            $table->foreign('id_kendaraan')->references('id')->on('kendaraan')->onDelete('cascade');
            $table->string('keterangan');
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
