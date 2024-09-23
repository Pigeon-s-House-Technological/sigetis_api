<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\usuarioController;
use App\Http\Controllers\Api\EvaluaciónController;
use App\Http\Controllers\Api\historiaUsuarioController;
use App\Http\Controllers\Api\ActividadController as Actividad;
use App\Http\Controllers\Api\ElementoController as Resultado;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/usuarios', [usuarioController::class, 'index']);
Route::get('/usuarios/{id}', [usuarioController::class, 'show']);
Route::post('/usuarios', [usuarioController::class, 'store']);
Route::put('/usuarios/{id}', [usuarioController::class, 'update']);
Route::patch('/usuarios/{id}', [usuarioController::class, 'updatePartial']);
Route::delete('/usuarios/{id}', [usuarioController::class, 'destroy']);

Route::get('/evaluaciones', [EvaluacionController::class, 'getEvaluations']);
Route::post('/evaluaciones', [EvaluacionController::class, 'store']); 
Route::get('/evaluaciones/{id}', [EvaluacionController::class, 'show']);
Route::put('/evaluaciones/{id}', [EvaluacionController::class, 'update']);
Route::patch('/evaluciones/{id}', [EvaluacionController::class, 'updatePartial']);
Route::delete('/evaluciones/{id}', [EvaluacionController::class, 'destroy']);

Route::get('/grupos', [grupoController::class, 'index']);
Route::post('/grupos', [grupoController::class, 'store']); 
Route::get('/grupos/{id}', [grupoController::class, 'show']);
Route::put('/grupos/{id}', [grupoController::class, 'update']);
Route::patch('/grupos/{id}', [grupoController::class, 'updatePartial']);
Route::delete('/grupos/{id}', [grupoController::class, 'destroy']);

Route::get('/criterios', [criterioController::class, 'getcriterio']);
Route::post('/criterios', [criterioController::class, 'store']); 
Route::get('/criterios/{id}', [criterioController::class, 'show']);
Route::put('/criterios/{id}', [criterioController::class, 'update']);
Route::patch('/criterios/{id}', [criterioController::class, 'updatePartial']);
Route::delete('/criterios/{id}', [criterioController::class, 'destroy']);

Route::get('/historiaUsuarios', [historiaUsuarioController::class, 'index']);
Route::get('/historiaUsuarios/{id}', [historiaUsuarioController::class, 'show']);
Route::post('/historiaUsuarios', [historiaUsuarioController::class, 'store']);
Route::put('/historiaUsuarios/{id}', [historiaUsuarioController::class, 'update']);
Route::patch('/historiaUsuarios/{id}', [historiaUsuarioController::class, 'updatePartial']);
Route::delete('/historiaUsuarios/{id}', [historiaUsuarioController::class, 'destroy']);

Route::get('/actividades', [Actividad::class, 'index']);
Route::get('/actividades/{id}', [Actividad::class, 'show']);
Route::post('/actividades', [Actividad::class, 'store']);
Route::put('/actividades/{id}', [Actividad::class, 'update']);
Route::patch('/actividades/{id}', [Actividad::class, 'updatePartial']);
Route::delete('/actividades/{id}', [Actividad::class, 'destroy']);

Route::get('/resultados', [Resultado::class, 'index']);
Route::get('/resultados/{id}', [Resultado::class, 'show']);
Route::post('/resultados', [Resultado::class, 'store']);
Route::put('/resultados/{id}', [Resultado::class, 'update']);
Route::patch('/resultados/{id}', [Resultado::class, 'updatePartial']);
Route::delete('/resultados/{id}', [Resultado::class, 'destroy']);

