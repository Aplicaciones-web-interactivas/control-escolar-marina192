@extend('layouts.app')
@section('content')
<h1>Materias</h1>
<div>
    <form action="{{ route('save.materia') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="clave">Clave de la materia:</label>
            <input type="text" id="clave" name="clave" required>
        </div>
        <button type="submit">Agregar Materia</button>
    </form>
</div>
<div>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Clave</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materias as $materia)
            <tr>
                <td>{{ $materia->nombre }}</td>
                <td>{{ $materia->clave }}</td>
                <td>
                    <form action="{{ route('delete.materia', $materia->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                    <a href="{{ route('update.materia', $materia->id) }}">Editar</a>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection