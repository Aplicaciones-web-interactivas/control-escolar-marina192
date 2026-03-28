<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Control Escolar')</title>
    <script src="https://cdn.ksdelivr.net/npm/@taiwindcss/browser@4"></script>
</head>
<body>
    <nav>
        <ul>
            {{-- Admin: puede acceder a Usuarios, Materias, Horarios, Grupos y Horarios de los Grupos --}}
            @if(auth()->check() && auth()->user()->rol === 'admin')
                <li><a href="{{ route('registro') }}">Usuarios</a></li>
                <li><a href="{{ route('index.materia') }}">Materias</a></li>
                <li><a href="{{ route('index.horario') }}">Horarios</a></li>
                <li><a href="{{ route('index.grupo') }}">Grupos</a></li>
                <li><a href="{{ route('index.horagrupo') }}">Horarios de los Grupos</a></li>
            @endif

            {{-- Maestro: puede acceder a Inscripciones, Calificaciones y Asignar tareas --}}
            @if(auth()->check() && auth()->user()->rol === 'maestro')
                <li><a href="{{ route('index.inscripcion') }}">Inscripciones</a></li>
                <li><a href="{{ route('index.calificacion') }}">Calificaciones</a></li>
                <li><a href="{{ route('index.asignatarea') }}">Asignar tareas</a></li>
            @endif

            {{-- Alumnos ven Tareas --}}
            @if(auth()->check() && auth()->user()->rol === 'alumno')
                <li><a href="{{ route('index.tarea') }}">Tareas</a></li>
            @endif

            {{-- Botón de cerrar sesión visible para todos los autenticados --}}
            @auth
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-link">Cerrar sesión</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>