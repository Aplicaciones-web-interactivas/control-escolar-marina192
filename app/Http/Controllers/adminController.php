<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Materia;
use App\Models\Horario;
use App\Models\Grupo;

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

    public function indexHorario()
    {
        $horarios = Horario::all()->groupBy('materia_id');
        return view('admin.horario')->with('horarios', $horarios);
    }

    public function saveHorario(Request $request)
    {
        $nuevoHorario = new Horario();
        $nuevoHorario->materia_id = $request->input('materia');
        $nuevoHorario->maestro_id = $request->input('maestro');
        $nuevoHorario->dia = $request->input('dia');
        $nuevoHorario->hora_inicio = $request->input('hora_inicio');
        $nuevoHorario->hora_fin = $request->input('hora_fin');
        $nuevoHorario->save();
        return redirect()->back();
    }

    public function deleteHorario($id)
    {
        $horarioEliminar = Horario::find($id);
        if ($horarioEliminar) {
            $horarioEliminar->delete();
        } else {
            return redirect()->back()->withErrors('error', 'Horario no encontrado');
        }
        return redirect()->back();
    }

    public function editarHorario($id)
    {
        $horarioEditar = Horario::find($id);
        return view('admin.horarioeditar')->with('horario', $horarioEditar);
    }

    public function updateHorario(Request $request, $id)
    {
        $horarioEditar = Horario::find($id);
        $horarioEditar->materia_id = $request->input('materia');
        $horarioEditar->maestro_id = $request->input('maestro');
        $horarioEditar->dia = $request->input('dia');
        $horarioEditar->hora_inicio = $request->input('hora_inicio');
        $horarioEditar->hora_fin = $request->input('hora_fin');
        $horarioEditar->save();
        return redirect('/horario');
    }

    public function indexGrupo()
    {
        $grupos = Grupo::all()->groupBy('horario_id');
        return view('admin.grupo')->with('grupos', $grupos);
    }

    public function saveGrupo(Request $request)
    {
        $nuevoGrupo = new Grupo();
        $nuevoGrupo->nombre = $request->input('nombre');
        $nuevoGrupo->horario_id = $request->input('horario');
        $nuevoGrupo->save();
        return redirect()->back();
    }

    public function deleteGrupo($id)
    {
        $grupoEliminar = Grupo::find($id);
        if ($grupoEliminar) {
            $grupoEliminar->delete();
        } else {
            return redirect()->back()->withErrors('error', 'Grupo no encontrado');
        }
        return redirect()->back();
    }

    public function editarGrupo($id)
    {
        $grupoEditar = Grupo::find($id);
        return view('admin.grupoeditar')->with('grupo', $grupoEditar);
    }

    public function updateGrupo(Request $request, $id)
    {
        $grupoEditar = Horario::find($id);
        $grupoEditar->nombre = $request->input('nombre');
        $grupoEditar->horario_id = $request->input('horario');
        $grupoEditar->save();
        return redirect('/grupo');
    }
}
