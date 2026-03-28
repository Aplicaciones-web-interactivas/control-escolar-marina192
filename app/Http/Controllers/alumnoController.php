<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class alumnoController extends Controller
{
    public function tareasAlumno()
    {
        $alumnoId = auth()->id();
        $horarios = Inscripcion::where('alumno_id', $alumnoId)->pluck('horario_id');
        $tareas = Tarea::with('horario.materia')->whereIn('horario_id', $horarios)->get();
        return view('alumno.tarea', compact('tareas'));
    }
}
