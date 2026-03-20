<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;

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
}
