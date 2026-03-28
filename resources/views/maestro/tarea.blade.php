@extends('layouts.app')
@section('content')
<h1>Asignar Tareas por Horario</h1>
<form action="{{ route('asignar.tarea') }}" method="POST">
    @csrf
    <div>
        <label>Título:</label>
        <input type="text" name="titulo" required>
    </div>
    <div>
        <label>Descripción:</label>
        <textarea name="descripcion" required></textarea>
    </div>
    <div>
        <label>Fecha de entrega:</label>
        <input type="date" name="fecha_entrega" required>
    </div>
    <div>
        <label>Horario:</label>
        <select name="horario_id" required>
            @foreach($horarios as $horario)
                <option value="{{ $horario->id }}">
                    {{ $horario->materia->nombre }} - {{ $horario->dia }} {{ $horario->hora_inicio }} a {{ $horario->hora_fin }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit">Asignar tarea</button>
</form>
<hr>
<h2>Tareas asignadas</h2>
<ul>
    @foreach($tareas as $tarea)
        <li>
            {{ $tarea->titulo }} - {{ $tarea->horario->materia->nombre }}
            ({{ $tarea->horario->dia }} {{ $tarea->horario->hora_inicio }} a {{ $tarea->horario->hora_fin }})
            Entrega: {{ $tarea->fecha_entrega }}
        </li>
    @endforeach
</ul>
@endsection