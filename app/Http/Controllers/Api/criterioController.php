<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criterio_evaluacion;
use Illuminate\Support\Facades\Validator;


class CriterioController extends Controller
{
    public function index(){
        $criterio_evaluacion = Criterio_evaluacion::all();
        if ($criterio_evaluacion->isEmpty()) {
            $data = [
                'message' => 'No se encontraron Criterios de Evaluación',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($criterio_evaluacion, 200);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id_evaluacion' => 'required',
            'titulo_criterio' => 'required'
        ]);
        If($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $criterio_evaluacion = Criterio_evaluacion::create([
            'id_evaluacion' => $request->id_evaluacion,
            'titulo_criterio' => $request->titulo_criterio
        ]);
        if (!$criterio_evaluacion){
            $data = [
                'message' => 'error al crear el criterio de evaluación',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'criterio_evaluacion' => $criterio_evaluacion,
            'status' => 201
        ];
        return response()->json($data, 201);
    }
    public function show($id){
        $criterio_evaluacion = Criterio_evaluacion::find($id);
        if(!$criterio_evaluacion){
            $data = [
                'message' => 'Criterio de evaluación no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'criterio_evaluacion' => $criterio_evaluacion,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id){
        $criterio_evaluacion = Criterio_evaluacion::find($id);
        if(!$criterio_evaluacion){
            $data = [
                'message' => 'Criterio de evaluación no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $criterio_evaluacion->delete();
        $data = [
            'message' => 'Criterio de evaluación eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id){
        $criterio_evaluacion = Criterio_evaluacion::find($id);
        if(!$criterio_evaluacion){
            $data = [
                'message' => 'Criterio evaluación no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $criterio_evaluacion->update([
            'id_evaluacion' => $request->id_evaluacion,
            'titulo_criterio' => $request->titulo_criterio
        ]);
        $data = [
            'message' => 'Criterio de Evaluacion actualizada',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $criterio_evaluacion = Criterio_evaluacion::find($id);
        if(!$criterio_evaluacion){
            $data = [
                'message' => 'Criterio de evaluación no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(), [
            'id_evaluacion' => 'required_without_all:titulo_criterio',
            'titulo_criterio' => 'required_without_all:id_evaluacion'
        ]);
        

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if($request->has('id_evaluacion')){
            $criterio_evaluacion->id_evaluacion = $request->id_evaluacion;
        }
        if($request->has('titulo_criterio')){
            $criterio_evaluacion->titulo_criterio = $request->titulo_criterio;
        }
        
        $criterio_evaluacion->save();

        $data = [
            'message' => 'Criterio de evaluación actualizado',
            'evaluacion' => $criterio_evaluacion,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
