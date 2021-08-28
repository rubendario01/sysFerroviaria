<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viaje', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('horario');
            $table->string('origen');
            $table->string('destino');
            $table->float('precio');

            $table->unsignedBigInteger('tren_id')->nullable();
            $table->foreign('tren_id')
            ->references('id')
            ->on('tren');

            $table->unsignedBigInteger('ruta_id')->nullable();
            $table->foreign('ruta_id')
            ->references('id')
            ->on('ruta');
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
        Schema::dropIfExists('viaje');
    }
}
