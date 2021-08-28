<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->float('longitud');
            $table->unsignedBigInteger('ruta_id')->nullable();
            $table->foreign('ruta_id')
                ->references('id')
                ->on('ruta');
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
        Schema::dropIfExists('tramo');
    }
}
