@extends('layouts.app')
@section('content')
    <div>
        <form action="{{ route('update.grupo', $grupo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="horario">ID del horario:</label>
                <input type="number" id="horario" name="horario" required>
            </div>
            <button type="submit">Actualizar Grupo</button>
@endsection