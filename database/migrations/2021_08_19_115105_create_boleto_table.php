<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boleto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nro_boleto');

            $table->unsignedBigInteger('venta_id')->nullable();
            $table->foreign('venta_id')
                ->references('id')
                ->on('venta');

            $table->unsignedBigInteger('reserva_id')->nullable();
            $table->foreign('reserva_id')
                ->references('id')
                ->on('reserva');

            $table->unsignedBigInteger('viaje_id');
            $table->foreign('viaje_id')
                ->references('id')
                ->on('viaje');  
                
            $table->unsignedBigInteger('asiento_id');
            $table->foreign('asiento_id')
                ->references('id')
                ->on('asiento');     
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
        Schema::dropIfExists('boleto');
    }
}
