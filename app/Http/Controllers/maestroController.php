<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Inscripcion;
use App\Models\Calificacion;
use App\Models\Horario;
use App\Models\Tarea;

class maestroController extends Controller
{
    public function indexInscripcion()
    {
        $inscripciones = Inscripcion::all()->groupBy('grupo_id');
        return view('maestro.inscripcion')->with('inscripciones', $inscripciones);
    }

    public function saveInscripcion(Request $request)
    {
        $nuevaInscripcion = new Inscripcion();
        $nuevaInscripcion->grupo_id = $request->input('grupo');
        $nuevaInscripcion->alumno_id = $request->input('alumno');
        $nuevaInscripcion->save();
        return redirect()->back();
    }

    public function deleteInscripcion($id)
    {
        $inscripcionEliminar = Inscripcion::find($id);
        if ($inscripcionEliminar) {
            $inscripcionEliminar->delete();
        } else {
            return redirect()->back()->withErrors('error', 'Inscripcion no encontrada');
        }
        return redirect()->back();
    }

    public function indexCalificacion()
    {
        $grupos = Grupo::with([
            'inscripciones.alumno',
            'horagrupo.horario.materia',
            'horagrupo.calificaciones'
        ])->get();

        return view('maestro.calificacion', compact('grupos'));
    }

    public function saveCalificacion(Request $request)
    {
        foreach ($request->input('calificaciones', []) as $alumnoId => $horarios) {
            foreach ($horarios as $horagrupoId => $nota) {
                Calificacion::updateOrCreate(
                    [
                        'alumno_id' => $alumnoId,
                        'horagrupo_id' => $horagrupoId,
                    ],
                    [
                        'calificacion' => $nota,
                    ]
                );
            }
        }
        return redirect()->back()->with('success', 'Calificaciones guardadas correctamente');
    }

    public function indexTarea()
    {
        $horarios = Horario::with('materia')->where('maestro_id', auth()->user()->clave)->get();
        $tareas = Tarea::with('horario.materia')->whereIn('horario_id', $horarios->pluck('id'))->get();
        return view('maestro.tarea', compact('horarios','tareas'));
    }

    public function asignarTarea(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_entrega' => 'required|date',
            'horario_id' => 'required|exists:horarios,id',
        ]);
        $tarea = new Tarea();
        $tarea->titulo = $request->input('titulo');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->fecha_entrega = $request->input('fecha_entrega');
        $tarea->horario_id = $request->input('horario_id');
        $tarea->save();
        return redirect()->back();
    }
}