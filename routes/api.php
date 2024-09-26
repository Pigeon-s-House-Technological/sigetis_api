<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\usuarioController;
use App\Http\Controllers\Api\EvaluaciónController;
use App\Http\Controllers\Api\historiaUsuarioController;
use App\Http\Controllers\Api\ActividadController as Actividad;
use App\Http\Controllers\Api\ElementoController as Resultado;
use App\Http\Controllers\Api\PreguntaPuntuacionController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//rutas predefeinidas ya traen el index, store, destroy, show, update
Route::apiResource('evaluaciones', EvaluacionController::class);
Route::apiResource('grupos', GrupoController::class);
Route::apiResource('criterios', CriterioController::class);
Route::apiResource('historiaUsuarios', HistoriaUsuarioController::class);
Route::apiResource('actividades', ActividadController::class);
Route::apiResource('resultados', ResultadoController::class);
Route::apiResource('preguntasPuntuacion', PreguntaPuntuacionController::class);
Route::apiResource('usuarios', usuarioController::class);

// Rutas personalizadas
Route::patch('/evaluaciones/{id}', [EvaluacionController::class, 'updatePartial']);
Route::patch('/grupos/{id}', [GrupoController::class, 'updatePartial']);
Route::patch('/criterios/{id}', [CriterioController::class, 'updatePartial']);
Route::patch('/historiaUsuarios/{id}', [HistoriaUsuarioController::class, 'updatePartial']);
Route::patch('/actividades/{id}', [ActividadController::class, 'updatePartial']);
Route::patch('/resultados/{id}', [ResultadoController::class, 'updatePartial']);
Route::patch('/preguntasPuntuacion/{id}', [PreguntaPuntuacionController::class, 'updatePartial']);
Route::patch('/usuarios/{id}', [usuarioController::class, 'updatePartial']);