@extends('layouts.app')
@section('content')
<h1>Registro</h1>
<div>
    <form action="{{ route('registro.save') }}" method="POST">
        @csrf
        <div>
            <label>Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label>Clave:</label>
            <input id="clave" name="clave" required>
        </div>
        <div>
            <label>Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Registrar</button>
    </form>
</div>
<div>
    <table>
        <thead>
            <tr>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->clave }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>
                    <form action="{{ route('registro.rol', $usuario->clave) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="rol" onchange="this.form.submit()">
                            <option value="admin" {{ $usuario->rol === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="maestro" {{ $usuario->rol === 'maestro' ? 'selected' : '' }}>Maestro</option>
                            <option value="alumno" {{ $usuario->rol === 'alumno' ? 'selected' : '' }}>Alumno</option>
                            <option value="user" {{ $usuario->rol === 'user' ? 'selected' : '' }}>Sin rol</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection