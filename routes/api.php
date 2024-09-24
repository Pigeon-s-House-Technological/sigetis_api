<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\usuarioController;
use App\Http\Controllers\Api\EvaluaciónController;
use App\Http\Controllers\Api\criteriosController;
use App\Http\Controllers\Api\estadis_evaluacioneController;
use App\Http\Controllers\Api\grupoController;

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

Route::get('/evaluaciones/estado', [estadis_evaluacionController::class, 'contador_de_estados']);
Route::get('/evaluaciones/estado', [estadis_evaluacionController::class, 'porcentaje_de_estados']);
Route::get('/evaluaciones/estado', [estadis_evaluacionController::class, 'listar_estado']);
Route::get('/evaluaciones/tipo', [estadis_evaluacionController::class, 'tipo_evaluacion']);