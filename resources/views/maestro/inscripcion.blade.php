@extends('layouts.app')
@section('content')
<h1>Inscripciones</h1>
<div>
    <form action="{{ route('save.inscripcion') }}" method="POST">
        @csrf
        <div>
            <label for="grupo">ID del grupo</label>
            <input type="number" id="grupo" name="grupo" required>
            <label for="alumno">ID del alumno:</label>
            <input type="number" id="alumno" name="alumno" required>
        </div>
        <button type="submit">Agregar Alumno</button>
    </form>
</div>
<div>
    @foreach ($inscripciones as $grupo_id => $grupoInscripciones)
        <h2>Alumnos inscritos del grupo {{ $grupo_id }}</h2>
        <table>
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grupoInscripciones as $inscripcion)
                    <tr>
                        <td>{{ $inscripcion->alumno_id }}</td>
                        <td>
                            <form action="{{ route('delete.inscripcion', $inscripcion->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</div>
@endsection