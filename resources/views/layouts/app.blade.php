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
            <li><a href="/">Usuarios</a></li>
            <li><a href="/">Alumnos</a></li>
            <li><a href="/">Materias</a></li>
        </ul>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>