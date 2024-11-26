<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Respuesta_puntuacion;

class RespuestaPuntuacionController extends Controller
{
    public function index(){
        $respuesta_puntuacion = Respuesta_puntuacion::all();
        if ($respuesta_puntuacion->isEmpty()) {
            $data = [
                'message' => 'No se encontraron respuesta_puntuacion',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($respuesta_puntuacion, 200);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),
        [
            'id_pregunta_puntuacion' => 'required',
            'respuesta_puntuacion' => 'required',
            'id_grupo_evaluacion' => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $respuesta_puntuacion = Respuesta_puntuacion::create([
            'id_pregunta_puntuacion' => $request->id_pregunta_puntuacion,
            'respuesta_puntuacion' => $request->respuesta_puntuacion,
            'id_grupo_evaluacion' => $request->id_grupo_evaluacion,
        ]);
        if (!$respuesta_puntuacion){
            $data = [
                'message' => 'error al crear la respuesta_puntuacion',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'respuesta_puntuacion' => $respuesta_puntuacion,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id){
        $respuesta_puntuacion = Respuesta_puntuacion::find($id);
        if (!$respuesta_puntuacion){
            $data = [
                'message' => 'No se encontro la respuesta_puntuacion',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($respuesta_puntuacion, 200);
    }

    public function destroy($id){
        $respuesta_puntuacion = Respuesta_puntuacion::find($id);
        if (!$respuesta_puntuacion){
            $data = [
                'message' => 'No se encontro el respuesta_puntuacion',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $respuesta_puntuacion->delete();
        $data = [
            'message' => 'Respuesta_puntuacion eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $respuesta_puntuacion = Respuesta_puntuacion::find($id);
        if (!$respuesta_puntuacion){
            $data = [
                'message' => 'No se encontro el respuesta_puntuacion',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $validator = Validator::make($request->all(),
        [
            'id_pregunta_puntuacion' => '',
            'respuesta_puntuacion' => '',
            'id_grupo_evaluacion' => '',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->id_pregunta_puntuacion != null) {
            $respuesta_puntuacion->id_pregunta_puntuacion = $request->id_pregunta_puntuacion;
        }
        if ($request->respuesta_puntuacion != null) {
            $respuesta_puntuacion->respuesta_puntuacion = $request->respuesta_puntuacion;
        }
        if ($request->id_grupo_evaluacion != null) {
            $respuesta_puntuacion->id_grupo_evaluacion = $request->id_grupo_evaluacion;
        }

        $respuesta_puntuacion->save();
        $data = [
            'message' => 'Respuesta_puntuacion actualizado',
            'respuesta_puntuacion' => $respuesta_puntuacion,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
