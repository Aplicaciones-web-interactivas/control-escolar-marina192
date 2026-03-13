<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

class adminController extends Controller
{
    public function indexMateria()
    {
        $materias = Materia::all();
        return view('admin.materia')->with('materias', $materias);
    }

    public function saveMateria(Request $request)
    {
        $nuevaMateria = new Materia();
        $nuevaMateria->nombre = $request->input('nombre');
        $nuevaMateria->clave = $request->input('clave');
        $nuevaMateria->save();
        return redirect()->back();
    }

    public function deleteMateria($id)
    {
        $materiaEliminar = Materia::find($id);
        if ($materiaEliminar) {
            $materiaEliminar->delete();
        } else {
            return redirect()->back()->withErrors('error', 'Materia no encontrada');
        }
        return redirect()->back();
    }
}
