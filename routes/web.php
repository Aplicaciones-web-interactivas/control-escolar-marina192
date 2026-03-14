<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', [adminController::class, 'registro'])->name('registro');
Route::post('/guardarRegistro', [adminController::class, 'guardarRegistro'])->name('registro.save');
Route::get('/materia', [adminController::class, 'indexMateria'])->name('index.materia');
Route::post('/materia', [adminController::class, 'saveMateria'])->name('save.materia');
Route::delete('/materia/eliminar/{id}', [adminController::class, 'deleteMateria'])->name('delete.materia');
Route::get('/materia/editar/{id}', [adminController::class, 'editarMateria'])->name('editar.materia');
Route::put('/materia/editar/{id}', [adminController::class, 'updateMateria'])->name('update.materia');
Route::get('/horario', [adminController::class, 'indexHorario'])->name('index.horario');
Route::post('/horario', [adminController::class, 'saveHorario'])->name('save.horario');
Route::delete('/horario/eliminar/{id}', [adminController::class, 'deleteHorario'])->name('delete.horario');
Route::get('/horario/editar/{id}', [adminController::class, 'editarHorario'])->name('editar.horario');
Route::put('/horario/editar/{id}', [adminController::class, 'updateHorario'])->name('update.horario');

Route::get('/grupo', [adminController::class, 'indexGrupo'])->name('index.grupo');
Route::post('/grupo', [adminController::class, 'saveGrupo'])->name('save.grupo');
Route::delete('/grupo/eliminar/{id}', [adminController::class, 'deleteGrupo'])->name('delete.grupo');
Route::get('/grupo/editar/{id}', [adminController::class, 'editarGrupo'])->name('editar.grupo');
Route::put('/grupo/editar/{id}', [adminController::class, 'updateGrupo'])->name('update.grupo');