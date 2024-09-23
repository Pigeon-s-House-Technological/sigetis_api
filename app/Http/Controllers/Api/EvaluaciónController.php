<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evaluacion;
use App\Models\CriterioEvaluacion;
use Illiminate\Support\Facades\Validator;

class EvaluationController extends Controller
{
    public function getEvaluations()
    {
        $evaluacion = evaluacion::all();
        if ($evaluacion->isEmpty()) {
            $data = [
                'message' => 'No se encontraron Evaluaciones',
                'status' => 200
            ];
        }
        return response()->json($evaluacion, 200);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre_evaluacion' => 'required',
            'tipo_evaluacion' => 'required',
            'estado_evaluacion' => 'required'
        ]);
        If($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $evaluacion = evaluacion::create([
            'nombre_evaluacion' => $request->nombre_evaluacion,
            'tipo_evaluacion' => $request->tipo_evaluacion,
            'estado_evaluacion' => $request->estado_evaluacion
        ]);
        if (!$evaluacion){
            $data = [
                'message' => 'error al crear la evalucion',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'evaluacion' => $evaluacion,
            'status' => 201
        ];
        return response()->json($data, 201);
    }
    public function show($id){
        $evaluacion = evaluacion::find($id);
        if(!$evaluacion){
            $data = [
                'message' => 'Evaluación no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'evaluacion' => $evaluacion,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id){
        $evaluacion = evaluacion::find($id);
        if(!$evaluacion){
            $data = [
                'message' => 'Evaluación no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $evaluacion->delete();
        $data = [
            'message' => 'Evaluación eliminada',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id){
        $evaluacion = evaluacion::find($id);
        if(!$evaluacion){
            $data = [
                'message' => 'Evaluación no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $evaluacion->update([
            'nombre_evaluacion' => $request->nombre_evaluacion,
            'tipo_evaluacion' => $request->tipo_evaluacion,
            'estado_evaluacion' => $request->estado_evaluacion
        ]);
        $data = [
            'message' => 'Evaluación actualizada',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $evaluacion = evaluacion::find($id);
        if(!$evaluacion){
            $data = [
                'message' => 'Evaluación no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre_evaluacion' => 'required',
            'tipo_evaluacion' => 'required',
            'estado_evaluacion' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if($request->has('nombre_evaluacion')){
            $evaluacion->nombre_evaluacion = $request->nombre_evaluacion;
        }
        if($request->has('tipo_evalucion')){
            $evaluacion->tipo_evaluacion = $request->tipo_evaluacion;
        }
        if($request->has('estado_evaluacion')){
            $evaluacion->estado_evaluacion = $request->estado_evaluacion;
        }
        $evaluacion->save();

        $data = [
            'message' => 'Evaluación actualizada',
            'evaluacion' => $evaluacion,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
    public function getCriterioEvaluacion()
    {
        $criterios = CriterioEvaluacion::with('evaluacion')->get(); 
        return response()->json($criterios);
    }
}
