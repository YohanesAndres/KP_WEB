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
            $table->string('muat_cpo');
            $table->string('tujuan_bongkar');
            $table->string('no_spk/tanggal');
            $table->string('no_kontrak/tanggal');
            $table->string('no/tanggal_do_besar');
            $table->string('quantity_do(ton)');
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
