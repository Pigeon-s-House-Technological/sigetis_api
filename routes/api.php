<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\usuarioController;
use App\Http\Controllers\Api\EvaluaciónController;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/usuarios', [usuarioController::class, 'index']);
Route::get('/usuarios/{id}', [usuarioController::class, 'show']);
Route::post('/usuarios', [usuarioController::class, 'store']);
Route::put('/usuarios/{id}', [usuarioController::class, 'update']);
Route::patch('/usuarios/{id}', [usuarioController::class, 'updatePartial']);
Route::delete('/usuarios/{id}', [usuarioController::class, 'destroy']);
Route::get('/Evaluacion', [EvaluacionController::class, 'getEvaluations']);
Route::post('/Evaluacion', [EvaluacionController::class, 'store']); 
Route::get('/Evaluacion/{id}', [EvaluacionController::class, 'show']);
Route::put('/Evaluacion/{id}', [EvaluacionController::class, 'update']);
Route::patch('/Evalucion/{id}', [EvaluacionController::class, 'updatePartial']);
Route::delete('/Evalucion/{id}', [EvaluacionController::class, 'destroy']);
Route::get('/Grupo', [grupoController::class, 'index']);
Route::post('/Grupo', [grupoController::class, 'store']); 
Route::get('/Grupo/{id}', [grupoController::class, 'show']);
Route::put('/Grupo/{id}', [grupoController::class, 'update']);
Route::patch('/Grupo/{id}', [grupoController::class, 'updatePartial']);
Route::delete('/Grupo/{id}', [grupoController::class, 'destroy']);
Route::get('/Criterio', [criterioController::class, 'getcriterio']);
Route::post('/Criterio', [criterioController::class, 'store']); 
Route::get('/Criterio/{id}', [criterioController::class, 'show']);
Route::put('/Criterio/{id}', [criterioController::class, 'update']);
Route::patch('/Criterio/{id}', [criterioController::class, 'updatePartial']);
Route::delete('/Criterio/{id}', [criterioController::class, 'destroy']);