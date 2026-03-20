@extends('layouts.app')
@section('content')
<h1>Grupos</h1>
<div>
    <form action="{{ route('save.grupo') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <button type="submit">Agregar Grupo</button>
    </form>
</div>
<div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grupos as $grupo)
                    <tr>
                        <td>{{ $grupo->id }}</td>
                        <td>{{ $grupo->nombre }}</td>
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
</div>
@endsection