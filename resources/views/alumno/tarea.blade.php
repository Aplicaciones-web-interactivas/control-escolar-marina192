@extends('layouts.app')

@section('content')
<h1>Mis Tareas</h1>

<ul>
    @forelse($tareas as $tarea)
        <li>
            <strong>{{ $tarea->titulo }}</strong><br>
            {{ $tarea->descripcion }}<br>
            Materia: {{ $tarea->horario?->materia?->nombre ?? 'Sin materia' }}<br>
            Día: {{ $tarea->horario?->dia }} 
            ({{ $tarea->horario?->hora_inicio }} - {{ $tarea->horario?->hora_fin }})<br>
            Fecha de entrega: {{ $tarea->fecha_entrega }}
        </li>
    @empty
        <li>No tienes tareas asignadas.</li>
    @endforelse
</ul>
@endsection
