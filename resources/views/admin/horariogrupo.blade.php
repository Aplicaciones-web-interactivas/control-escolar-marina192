@extends('layouts.app')
@section('content')
<h1>Horarios de los Grupos</h1>
<div>
    <form action="{{ route('save.horagrupo') }}" method="POST">
        @csrf
        <div>
            <label for="grupo">ID de grupo:</label>
            <input type="number" id="grupo" name="grupo" required>
            <label for="horario">ID de horario:</label>
            <input type="number" id="horario" name="horario" required>
        </div>
        <button type="submit">Agregar Horario en el Grupo</button>
    </form>
</div>
<div>
    @foreach ($horaGrupos as $grupo_id => $grupoHorarios)
        <h2>Horarios del grupo {{ $grupo_id }}</h2>
        <table>
            <thead>
                <tr>
                    <th>Horarios</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grupoHorarios as $horario)
                    <tr>
                        <td>{{ $horario->horario_id }}</td>
                        <td>
                            <form action="{{ route('delete.horagrupo', $horario->id) }}" method="POST" style="display:inline;">
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