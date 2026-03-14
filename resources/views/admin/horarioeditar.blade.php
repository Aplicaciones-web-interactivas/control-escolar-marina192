@extends('layouts.app')
@section('content')
    <div>
        <form action="{{ route('update.horario', $horario->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="materia">ID de la materia:</label>
                <input type="number" id="materia" name="materia" value="{{ $horario->materia_id }}" required>
                <label for="maestro">ID del maestro:</label>
                <input type="number" id="maestro" name="maestro" value="{{ $horario->maestro_id }}" required>
                <label for="dia">Dia:</label>
                <input type="text" id="dia" name="dia" value="{{ $horario->dia }}" required>
                <label for="hora_inicio">Hora de inicio:</label>
                <input type="time" id="hora_inicio" name="hora_inicio" value="{{ $horario->hora_inicio }}" required>
                <label for="hora_fin">Hora de fin:</label>
                <input type="time" id="hora_fin" name="hora_fin" value="{{ $horario->hora_fin }}" required>
            </div>
            <button type="submit">Actualizar Horario</button>
@endsection