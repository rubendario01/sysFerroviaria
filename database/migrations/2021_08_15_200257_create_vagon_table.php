<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagon', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_vagon');
            $table->string('descripcion');
            $table->integer('capacidad');
          
            $table->unsignedBigInteger('tren_id')->nullable();
            $table->foreign('tren_id')
                    ->references('id')->on('tren')
                    ->onDelete('set null');

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
        Schema::dropIfExists('vagon');
    }
}
