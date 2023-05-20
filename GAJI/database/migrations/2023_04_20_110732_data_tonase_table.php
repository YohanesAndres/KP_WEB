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
        Schema::create('data_tonase', function (Blueprint $table) {
            $table->id();
            $table->string('no_spk');
            $table->string('no_do');
            $table->integer('tonase_actual');
            $table->unsignedBigInteger('id_tujuan');
            $table->foreign('id_tujuan')->references('id')->on('tujuans')->onDelete('cascade');
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
        Schema::dropIfExists('data_tonase');
    }
};
