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
        Schema::create('kas_uj', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            $table->integer('jumlah_uang');
            $table->string('expenses', 100);
            $table->boolean('dari_bos');
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
        Schema::dropIfExists('kas_uj');
    }
};
