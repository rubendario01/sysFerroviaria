<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tren', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('modelo');
            $table->integer('capacidad');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tren');
    }
}
