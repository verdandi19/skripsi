<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confidences', function (Blueprint $table) {
            $table->id('id_Proses');
            $table->string('kombinasiItem');
            $table->integer('jumlahItem');
            $table->double('persen');
            $table->double('hasil');
            $table->integer('minConfidence');
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
        Schema::dropIfExists('confidences');
    }
}
