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
        Schema::create('rekap_fuso', function (Blueprint $table) {
            $table->id();
            $table->string('alamat');
            $table->unsignedBigInteger('id_dataTonase');
            $table->foreign('id_dataTonase')->references('id')->on('data_tonase')->onDelete('cascade');
            $table->string('no_kontrak');
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
        Schema::dropIfExists('rekap_fuso');
    }
};
