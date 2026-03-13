@extends('layouts.app')
@section('content')
<div>
    <h1>Registro</h1>
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
@endsection