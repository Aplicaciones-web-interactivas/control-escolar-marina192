<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class horagrupo extends Model
{
    protected $table = 'horagrupo';

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }
}
