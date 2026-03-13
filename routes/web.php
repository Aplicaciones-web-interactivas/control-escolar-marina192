<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', [adminController::class, 'registro'])->name('registro');
Route::get('/materia', [adminController::class, 'indexMateria'])->name('index.materia');
Route::post('/materia', [adminController::class, 'saveMateria'])->name('save.materia');
Route::delete('/materia/eliminar/{id}', [adminController::class, 'deleteMateria'])->name('delete.materia');
Route::put('/materia/editar/{id}', [adminController::class, 'updateMateria'])->name('update.materia');