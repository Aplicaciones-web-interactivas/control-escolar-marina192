@extends('layouts.app')
@section('content')
<h1>Horarios</h1>
<div>
    <form action="{{ route('save.horario') }}" method="POST">
        @csrf
        <div>
            <label for="materia">ID de la materia:</label>
            <input type="number" id="materia" name="materia" required>
            <label for="maestro">ID del maestro:</label>
            <input type="number" id="maestro" name="maestro" required>
            <label for="dia">Dia:</label>
            <input type="text" id="dia" name="dia" required>
            <label for="hora_inicio">Hora de inicio:</label>
            <input type="time" id="hora_inicio" name="hora_inicio" required>
            <label for="hora_fin">Hora de fin:</label>
            <input type="time" id="hora_fin" name="hora_fin" required>
        </div>
        <button type="submit">Agregar Horario</button>
    </form>
</div>
<div>
    @foreach ($horarios as $materia_id => $grupoHorarios)
        <h2>Horarios de la materia {{ $materia_id }}</h2>
        <table>
            <thead>
                <tr>
                    <th>ID del maestro</th>
                    <th>Día</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grupoHorarios as $horario)
                    <tr>
                        <td>{{ $horario->maestro_id }}</td>
                        <td>{{ $horario->dia }}</td>
                        <td>{{ $horario->hora_inicio }}</td>
                        <td>{{ $horario->hora_fin }}</td>
                        <td>
                            <form action="{{ route('delete.horario', $horario->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                            <a href="{{ route('editar.horario', $horario->id) }}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</div>
@endsection