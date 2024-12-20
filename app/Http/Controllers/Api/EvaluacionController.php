<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evaluacion;
use Illuminate\Support\Facades\Validator;

use App\Models\Criterio_evaluacion;
use App\Models\Pregunta_opcion_multiple;
use App\Models\Pregunta_puntuacion;
use App\Models\Pregunta_complemento;
use App\Models\Opcion_pregunta_multiple;

class EvaluacionController extends Controller
{
    public function index()
    {
        $evaluacion = Evaluacion::all();
        if ($evaluacion->isEmpty()) {
            $data = [
                'message' => 'No se encontraron Evaluaciones',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($evaluacion, 200);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre_evaluacion' => 'required',
            'tipo_evaluacion' => 'required',
            'tipo_destinatario' => 'required'
        ]);
        If($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $evaluacion = Evaluacion::create([
            'nombre_evaluacion' => $request->nombre_evaluacion,
            'tipo_evaluacion' => $request->tipo_evaluacion,
            'tipo_destinatario' => $request->tipo_destinatario
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
        $evaluacion = Evaluacion::find($id);
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
        $evaluacion = Evaluacion::find($id);
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
        $evaluacion = Evaluacion::find($id);
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
            'tipo_destinatario' => $request->tipo_destinatario
        ]);
        $data = [
            'message' => 'Evaluación actualizada',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $evaluacion = Evaluacion::find($id);
        if(!$evaluacion){
            $data = [
                'message' => 'Evaluación no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre_evaluacion' => '',
            'tipo_evaluacion' => '',
            'tipo_destinatario' => ''
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
        $evaluacion->save();

        $data = [
            'message' => 'Evaluación actualizada',
            'evaluacion' => $evaluacion,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function listarPreguntas($id){
        $evaluacion = Evaluacion::with([
            'criterios.pregunta_opcion_multiple.opciones',
            'criterios.pregunta_puntuacion',
            'criterios.pregunta_complemento'
        ])->find($id);
    
        if (!$evaluacion) {
            return response()->json([
                'message' => 'Evaluación no encontrada',
                'status' => 404
            ], 404);
        }
    
        return response()->json([
            'message' => 'Preguntas de la evaluación',
            'evaluacion' => $evaluacion,
            'status' => 200
        ], 200);
    }
}
