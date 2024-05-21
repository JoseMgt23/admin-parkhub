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
        Schema::create('Reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('email')->nullable();
            $table->integer('telefono')->nullable();
            $table->date('fecha_reserva')->nullable();
            $table->timestamp('horario_entrada')->nullable();
            $table->timestamp('horario_salida')->nullable();
            $table->integer('metodo_pago')->nullable();
            $table->string('tipo_vehiculo')->nullable();
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
        Schema::dropIfExists('Reservas');
    }
}
