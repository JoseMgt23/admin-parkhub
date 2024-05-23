<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'facturas';

    protected $fillable = [
        'reserva_id',
        'numero_factura',
        'fecha_factura',
        'nombre_factura',
        'direccion_factura',
        'email_factura',
        'telefono_factura',
        'monto',
        'paymode_id',
        'estado',
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }

    public function paymode()
    {
        return $this->belongsTo(Paymode::class);
    }
}
