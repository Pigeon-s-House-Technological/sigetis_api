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
}
