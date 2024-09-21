<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\usuarioController;
use App\Http\Controllers\Api\historiaUsuarioController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/usuarios', [usuarioController::class, 'index']);
Route::get('/usuarios/{id}', [usuarioController::class, 'show']);
Route::post('/usuarios', [usuarioController::class, 'store']);
Route::put('/usuarios/{id}', [usuarioController::class, 'update']);
Route::patch('/usuarios/{id}', [usuarioController::class, 'updatePartial']);
Route::delete('/usuarios/{id}', [usuarioController::class, 'destroy']);

Route::get('/historiaUsuarios', [historiaUsuarioController::class, 'index']);
Route::get('/historiaUsuarios/{id}', [historiaUsuarioController::class, 'show']);
Route::post('/historiaUsuarios', [historiaUsuarioController::class, 'store']);
Route::put('/historiaUsuarios/{id}', [historiaUsuarioController::class, 'update']);
Route::patch('/historiaUsuarios/{id}', [historiaUsuarioController::class, 'updatePartial']);
Route::delete('/historiaUsuarios/{id}', [historiaUsuarioController::class, 'destroy']);