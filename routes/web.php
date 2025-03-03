<?php

use App\Http\Controllers\HistorialController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\TrabajadoresController;
use App\Http\Controllers\UsuarioController;
use App\Models\Historial;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//RUTAS MODELO TRABAJADORES
Route::get('/trabajadores', [TrabajadoresController::class, 'index']);
Route::get('/trabajadores/{id}', [TrabajadoresController::class, 'show']);
Route::post('/trabajadores/add-trabajador', [TrabajadoresController::class, 'insertarDocumento']);
Route::patch('/trabajadores/{id}', [TrabajadoresController::class, 'actualizarDocumento']);



//RUTAS MODELO TRABAJADORES
Route::get('/solicitudes', [SolicitudController::class, 'index']);
Route::get('/solicitudes-por-usuario/{id}', [SolicitudController::class, 'show']);
Route::post('/solicitudes/add-solicitud', [SolicitudController::class, 'insertarDocumento']);
Route::patch('/solicitudes/{id}/edit', [SolicitudController::class, 'update']);


//RUTAS MODELO HISTORIAL

Route::get('/historial', [HistorialController::class, 'index']);
Route::get('/historial-por-usuario/{id}', [HistorialController::class, 'show']);
Route::post('/historial/add-historial', [HistorialController::class, 'insertarDocumento']);


//RUTAS MODELO USUARIO

Route::get('/usuario/{id}', [UsuarioController::class, 'show']);
Route::post('/usuario-add', [UsuarioController::class, 'insertarDocumento']);


