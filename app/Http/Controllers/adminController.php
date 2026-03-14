<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Materia;

class adminController extends Controller
{
    public function registro()
    {
        return view('registro');
    }

    public function indexMateria()
    {
        $materias = Materia::all();
        return view('admin.materia')->with('materias', $materias);
    }

    public function guardarRegistro(Request $request)
    {
        $nuevoUsuario = new user();
        $nuevoUsuario->nombre = $request->nombre;
        $nuevoUsuario->clave = $request->clave;
        $nuevoUsuario->password = $request->password;
        $nuevoUsuario->save();
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

    public function editarMateria($id)
    {
        $materiaEditar = Materia::find($id);
        return view('admin.materiaeditar')->with('materia', $materiaEditar);
    }

    public function updateMateria(Request $request, $id)
    {
        $materiaEditar = Materia::find($id);
        $materiaEditar->nombre = $request->nombre;
        $materiaEditar->clave = $request->clave;
        $materiaEditar->save();
        return redirect('/materia');
    }
}
