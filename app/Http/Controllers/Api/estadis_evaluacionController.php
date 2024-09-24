<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evaluacion;

class estadis_evalucionController extends Controller
{
    public function coontador_de_estados()
    {
        
        $trueCount = Evaluacion::where('estado_evaluacion', true)->count();

        $falseCount = Evaluacion::where('estado_evaluacion', false)->count();
    
        $data = [
            'evaluaciones_activas' => $trueCount,
            'evaluaciones_inactivas' => $falseCount,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
    public function porcentaje_de_estados()
    {
        
        $trueCount = Evaluacion::where('estado_evaluacion', true)->count();

        $falseCount = Evaluacion::where('estado_evaluacion', false)->count();
       
        $total = $trueCount+$falseCount;
        $trueCount = 100*($trueCount/total);
        $falseCount = 100*($falseCount/total);
        $data = [
            'evaluaciones_activas' => $trueCount,
            'evaluaciones_inactivas' => $falseCount,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function listar_estado()
    {
        
        $evaluaciones_entregadas = Evaluacion::where('estado_evaluacion', true)->get();
        
        $evaluaciones_no_entregadas = Evaluacion::where('estado_evaluacion', false)->get();
        
        if ($evaluaciones_entregadas->isEmpty() && $evaluaciones_no_entregadas->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron evaluaciones.',
                'status' => 404
            ], 404);
        }
        
        $data = [
            'evaluaciones_entregadas' => $evaluaciones_entregadas,
            'evaluaciones_no_entregadas' => $evaluaciones_no_entregadas,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function tipo_evaluacion()
    {
        
        $autoevaluaciones = Evaluacion::where('tipo_evaluacion', 'Autoevaluación')->get();
        
        $evaluaciones_cruzadas = Evaluacion::where('tipo_evaluacion', 'Evaluación Cruzada')->get();
        
        $evaluaciones_en_pares = Evaluacion::where('tipo_evaluacion', 'Evaluación en Pares')->get();

        if ($autoevaluaciones->isEmpty() && $evaluaciones_cruzadas->isEmpty() && $evaluaciones_en_pares->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron evaluaciones.',
                'status' => 404
            ], 404);
        }

        $data = [
            'autoevaluaciones' => $autoevaluaciones,
            'evaluaciones_cruzadas' => $evaluaciones_cruzadas,
            'evaluaciones_en_pares' => $evaluaciones_en_pares,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
