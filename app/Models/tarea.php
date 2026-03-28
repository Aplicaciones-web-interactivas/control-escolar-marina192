<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tarea extends Model
{
    protected $fillable = ['titulo','descripcion','fecha_entrega','horario_id'];

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }
}
