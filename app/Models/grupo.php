<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class grupo extends Model
{
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    public function horagrupo()
    {
        return $this->hasMany(HoraGrupo::class);
    }
}
