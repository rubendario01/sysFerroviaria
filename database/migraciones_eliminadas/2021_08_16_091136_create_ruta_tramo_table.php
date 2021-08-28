<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutaTramoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruta_tramo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ruta_id');
            $table->unsignedBigInteger('tramo_id');
            $table->foreign('ruta_id')->references('id')->on('ruta')->onDelete('cascade');
            $table->foreign('tramo_id')->references('id')->on('tramo')->onDelete('cascade');

            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruta_tramo');
    }
}
