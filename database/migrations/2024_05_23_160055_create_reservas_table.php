<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('email')->nullable();
            $table->string('teléfono')->nullable();
            $table->date('fecha_reserva')->nullable();
            $table->timestamp('horario_entrada')->nullable();
            $table->timestamp('horario_salida')->nullable();
            $table->unsignedInteger('paymode_id')->nullable();
            $table->string('tipo_vehiculo')->nullable();
            $table->timestamps();
            $table->foreign('paymode_id')->references('id')->on('paymodes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
