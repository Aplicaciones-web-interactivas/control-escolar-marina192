@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h2>🎓 Bienvenido, {{ auth()->user()->nombre }}</h2>
        </div>
        <div class="card-body text-center">
            <p class="lead">Bienvenido al sistema de control escolar.</p>
        </div>
        <div class="card-footer text-muted text-center">
            &copy; {{ date('Y') }} Control Escolar
        </div>
    </div>
</div>
@endsection
