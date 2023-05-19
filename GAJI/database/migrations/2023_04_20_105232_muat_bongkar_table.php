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
        Schema::create('muat_bongkar', function (Blueprint $table) {
            $table->id();
            $table->string('muatBongkar', 40);
            $table->string('tujuan');
            $table->integer('uang_jalan');
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
        Schema::dropIfExists('muat_bongkar');
    }
};
