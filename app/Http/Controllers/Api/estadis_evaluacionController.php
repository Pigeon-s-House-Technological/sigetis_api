<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evaluacion;
use App\Models\AsignacionEvaluacion;

class estadis_evalucionController extends Controller{

    public function tipo_evaluacion(){
        if (!($autoevaluaciones->isEmpty())){
            $autoevaluaciones = Evaluacion::where('tipo_evaluacion', 1)->get();
            $data = [
                'autoevaluaciones' => $autoevaluaciones,
                'status' => 200
            ];
    
            return response()->json($data, 200);
        }
        if (!($evaluaciones_cruzadas->isEmpty())) {
            $evaluaciones_cruzadas = Evaluacion::where('tipo_evaluacion', 2)->get();
            $data = [
                'evaluaciones_cruzadas' => $evaluaciones_cruzadas,
                'status' => 200
            ];
    
            return response()->json($data, 200);
        }
        if (!($evaluaciones_en_pares->isEmpty())) {
            $evaluaciones_en_pares = Evaluacion::where('tipo_evaluacion', 3)->get();
            $data = [
                
                'evaluaciones_en_pares' => $evaluaciones_en_pares,
                'status' => 200
            ];
    
            return response()->json($data, 200);
        }
        

        if ($autoevaluaciones->isEmpty() && $evaluaciones_cruzadas->isEmpty() && $evaluaciones_en_pares->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron evaluaciones.',
                'status' => 404
            ], 404);
        }
    }

    public function contador_estados_por_grupo(){
        $evaluaciones = Evaluacion::all();
        $grupos = Grupo::all();
        $data = [];
        foreach ($grupos as $grupo) {
            $trueCount = 0;
            $falseCount = 0;
            foreach ($evaluaciones as $evaluacion) {
                $asignacion = AsignacionEvaluacion::where('id_evaluacion', $evaluacion->id)->where('id_grupo', $grupo->id)->first();
                if ($asignacion) {
                    if ($evaluacion->estado_evaluacion) {
                        $trueCount++;
                    } else {
                        $falseCount++;
                    }
                }
            }
            $data[] = [
                'grupo' => $grupo->nombre_grupo,
                'evaluaciones_activas' => $trueCount,
                'evaluaciones_inactivas' => $falseCount
            ];
        }

    }

    public function contador_estados_por_usuario(){
        $evaluaciones = Evaluacion::all();
        $usuarios = Usuario::all();
        $data = [];
        foreach ($usuarios as $usuario) {
            $trueCount = 0;
            $falseCount = 0;
            foreach ($evaluaciones as $evaluacion) {
                $asignacion = AsignacionEvaluacion::where('id_evaluacion', $evaluacion->id)->where('id_usuario', $usuario->id)->first();
                if ($asignacion) {
                    if ($evaluacion->estado_evaluacion) {
                        $trueCount++;
                    } else {
                        $falseCount++;
                    }
                }
            }
            $data[] = [
                'usuario' => $usuario->nombre_usuario,
                'evaluaciones_activas' => $trueCount,
                'evaluaciones_inactivas' => $falseCount
            ];
        }
    }

}
