<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'Reservas';

    protected $fillable = [
        'nombre', 'apellido', 'email', 'telefono', 'fecha_reserva',
        'horario_entrada', 'horario_salida', 'paymode_id', 'tipo_vehiculo'
    ];

    public function paymode()
    {
        return $this->belongsTo(Paymode::class, 'paymode_id');
    }
}
