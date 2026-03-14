@extends('layouts.app')
@section('content')
<h1>Horarios</h1>
<div>
    <form action="{{ route('save.grupo') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="horario">ID del horario:</label>
            <input type="number" id="horario" name="horario" required>
        </div>
        <button type="submit">Agregar Grupo</button>
    </form>
</div>
<div>
    @foreach ($grupos as $horario_id => $grupoGrupos)
        <h2>Grupos del horario {{ $horario_id }}</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>ID del horario</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grupoGrupos as $grupo)
                    <tr>
                        <td>{{ $grupo->nombre }}</td>
                        <td>{{ $grupo->horario_id }}</td>
                        <td>
                            <form action="{{ route('delete.grupo', $grupo->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                            <a href="{{ route('editar.grupo', $grupo->id) }}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</div>
@endsection