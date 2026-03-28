@extends('layouts.app')
@section('content')
<h1>Calificaciones</h1>
<div>
    @foreach($grupos as $grupo)
        <h2>Grupo: {{ $grupo->nombre }}</h2>
        <form action="{{ route('save.calificacion') }}" method="POST">
            @csrf
            <table>
                <thead>
                    <tr>
                        <th>Alumno</th>
                        @foreach($grupo->horagrupo as $hg)
                            <th>{{ $hg->horario->materia->nombre }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($grupo->inscripciones as $inscripcion)
                        <tr>
                            <td>{{ $inscripcion->alumno->nombre }}</td>
                            @foreach($grupo->horagrupo as $hg)
                                @php
                                    $calificacion = $hg->calificaciones
                                        ->where('alumno_id', $inscripcion->alumno->clave)
                                        ->first();
                                @endphp
                                <td>
                                    <input type="number" step="0.1" min="0" max="10"
                                        name="calificaciones[{{ $inscripcion->alumno->clave }}][{{ $hg->id }}]"
                                        value="{{ $calificacion->calificacion ?? '' }}">
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit">Guardar todas las calificaciones</button>
        </form>
    @endforeach
</div>
@endsection