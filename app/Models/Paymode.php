<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paymode extends Model
{
    protected $fillable = ['Nombre'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'paymode_id');
    }
}
