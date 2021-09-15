<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntemset2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intemset2s', function (Blueprint $table) {
            $table->id('idProses');
            $table->string('kombinasiItem');
            $table->integer('jumlahItem');
            $table->integer('jumlahTransaksi');
            $table->double('persen');
            $table->double('hasil');
            $table->integer('minSupport');
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
        Schema::dropIfExists('intemset2s');
    }
}
