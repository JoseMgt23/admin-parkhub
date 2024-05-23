<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reserva_id')->nullable();
            $table->string('numero_factura')->unique()->nullable();
            $table->date('fecha_factura')->nullable();
            $table->string('nombre_factura')->nullable();
            $table->string('direccion_factura')->nullable();
            $table->string('email_factura')->nullable();
            $table->string('telefono_factura')->nullable();
            $table->decimal('monto')->nullable();
            $table->unsignedInteger('paymode_id')->nullable();
            $table->string('estado')->default('pending')->nullable();
            $table->timestamps();

            $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('set null');
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
        Schema::table('facturas', function (Blueprint $table) {
            $table->dropForeign(['reserva_id']);
            $table->dropForeign(['paymode_id']);
        });

        Schema::dropIfExists('facturas');
    }
}
