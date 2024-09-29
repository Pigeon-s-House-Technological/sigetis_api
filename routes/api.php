<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\usuarioController;
use App\Http\Controllers\Api\EvaluacionController;
use App\Http\Controllers\Api\HistoriaUsuarioController;
use App\Http\Controllers\Api\ActividadController;
use App\Http\Controllers\Api\ElementoController;
use App\Http\Controllers\Api\PreguntaPuntuacionController;
use App\Http\Controllers\Api\GrupoController;
use App\Http\Controllers\Api\CriterioController;
use App\Http\Controllers\Api\estadis_evaluacionController;
use App\Http\Controllers\Api\SprintController;
use App\Http\Controllers\Api\PreguntaOpcionMultipleController;
use App\Http\Controllers\Api\PreguntaComplementoController;
use App\Http\Controllers\Api\AsignacionEvaluacionController;
use App\Http\Controllers\Api\OpcionPreguntaMultipleController;
use App\Http\Controllers\Api\RespuestaComplementoController;
use App\Http\Controllers\Api\RespuestaOpcionMultipleController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//rutas predefeinidas ya traen el index, store, destroy, show, update
Route::apiResource('evaluaciones', EvaluacionController::class);
Route::apiResource('grupos', GrupoController::class);
Route::apiResource('criterios', CriterioController::class);
Route::apiResource('historiaUsuarios', HistoriaUsuarioController::class);
Route::apiResource('actividades', ActividadController::class);
Route::apiResource('resultados', ElementoController::class);
Route::apiResource('preguntasPuntuacion', PreguntaPuntuacionController::class);
Route::apiResource('usuarios', usuarioController::class);
Route::apiResource('sprints', SprintController::class);
Route::apiResource('preguntasOpcionMultiple', PreguntaOpcionMultipleController::class);
Route::apiResource('preguntasComplemento', PreguntaComplementoController::class);
Route::apiResource('asignaciones', AsignacionEvaluacionController::class);
Route::apiResource('opcionesPreguntaMultiple', OpcionPreguntaMultipleController::class);
Route::apiResource('respuestasComplemento', RespuestaComplementoController::class);
Route::apiResource('respuestasOpcionMultiple', RespuestaOpcionMultipleController::class);

// Rutas personalizadas
Route::patch('/evaluacionesP/{id}', [EvaluacionController::class, 'updatePartial']);
Route::patch('/gruposP/{id}', [GrupoController::class, 'updatePartial']);
Route::patch('/criteriosP/{id}', [CriterioController::class, 'updatePartial']);
Route::patch('/historiaUsuariosP/{id}', [HistoriaUsuarioController::class, 'updatePartial']);
Route::patch('/actividadesP/{id}', [ActividadController::class, 'updatePartial']);
Route::patch('/resultadosP/{id}', [ElementoController::class, 'updatePartial']);
Route::patch('/preguntasPuntuacionP/{id}', [PreguntaPuntuacionController::class, 'updatePartial']);
Route::patch('/usuariosP/{id}', [usuarioController::class, 'updatePartial']);
Route::patch('/sprintsP/{id}', [SprintController::class, 'updatePartial']);
Route::patch('/preguntasOpcionMultipleP/{id}', [PreguntaOpcionMultipleController::class, 'updatePartial']);
Route::patch('/preguntasComplementoP/{id}', [PreguntaComplementoController::class, 'updatePartial']);
Route::patch('/asignacionesP/{id}', [AsignacionEvaluacionController::class, 'updatePartial']);
Route::patch('/opcionesPreguntaMultipleP/{id}', [OpcionPreguntaMultipleController::class, 'updatePartial']);
Route::patch('/respuestasComplementoP/{id}', [RespuestaComplementoController::class, 'updatePartial']);
Route::patch('/respuestasOpcionMultipleP/{id}', [RespuestaOpcionMultipleController::class, 'updatePartial']);

Route::get('/evaluaciones/estado-grupo', [estadis_evaluacionController::class, 'contador_estados_por_grupo']);//1->auto,2->cruzada,3->pares
Route::get('/evaluaciones/estado-individual', [estadis_evaluacionController::class, 'contador_estados_por_usuario']);
Route::get('/evaluaciones/tipo', [estadis_evaluacionController::class, 'tipo_evaluacion']);