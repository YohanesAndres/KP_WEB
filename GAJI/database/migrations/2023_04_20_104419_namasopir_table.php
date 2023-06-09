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
        Schema::create('namasopir', function (Blueprint $table) {
            $table->id();
            $table->string('idSopir')->unique();
            $table->string('nama_sopir', 50);
            $table->string('alamat', 50);
            $table->string('NIK')->unique();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('namasopir');
    }
};
