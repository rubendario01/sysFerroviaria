<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asiento', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_asiento');
            $table->string('descripcion');

            $table->unsignedBigInteger('vagon_id')->nullable();
            $table->foreign('vagon_id')
                ->references('id')->on('vagon')
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
        Schema::dropIfExists('asiento');
    }
}
