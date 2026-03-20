<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inscripcion extends Model
{
    protected $table = 'inscripciones';

    public function alumno()
    {
        return $this->belongsTo(User::class, 'alumno_id');
    }
}
