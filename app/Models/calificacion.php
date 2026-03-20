<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class calificacion extends Model
{
    protected $table = 'calificaciones';
    protected $fillable = [
        'alumno_id',
        'horagrupo_id',
        'calificacion',
    ];
}
