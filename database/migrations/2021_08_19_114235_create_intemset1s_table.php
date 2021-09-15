<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntemset1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intemset1s', function (Blueprint $table) {
            $table->id('idProses');
            $table->string('atribut');
            $table->integer('jumlahItem');
            $table->integer('jumlahTransaksi');
            $table->double('persen');
            $table->string('status');
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
        Schema::dropIfExists('intemset1s');
    }
}
