<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evaluacion;

class estadis_evalucionController extends Controller
{
    public function countByStatus()
    {
        // Contar evaluaciones activas
        $activeCount = Evaluation::where('estado_evaluacion', true)->count();
        // Contar evaluaciones inactivas
        $inactiveCount = Evaluation::where('estado_evaluacion', false)->count();
        // Resultados
        $data = [
            'evaluaciones_activas' => $activeCount,
            'evaluaciones_inactivas' => $inactiveCount,
            'status' => 200
        ];

        return response()->json($data, 200);
}
