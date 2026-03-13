@extends('layouts.app')
@section('content')
    <div>>
        <form action="{{ route('update.materia') }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ $materia->nombre }}" required>
                <label for="clave">Clave de la materia:</label>
                <input type="text" id="clave" name="clave" value="{{ $materia->clave }}" required>
            </div>
            <button type="submit">Actualizar Materia</button>
@endsection