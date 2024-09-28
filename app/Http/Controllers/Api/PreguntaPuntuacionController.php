<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Pregunta_puntuacion;

class PreguntaPuntuacionController extends Controller
{
    public function index(){
        $preguntasPuntuacion = Pregunta_puntuacion::all();
        if($preguntasPuntuacion->isEmpty()){
            $data = [
                'message' => 'No hay preguntas de puntuación registradas',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        return response()->json($preguntasPuntuacion, 200);
    }

    public function store(){
        $validator = Validator::make($request->all(), [
            'id_criterio_evaluacion' => 'required',
            'puntuacion' => 'required',
            'respuesta_puntuacion' => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $preguntaPuntuacion = Pregunta_puntuacion::create([
            'id_criterio_evaluacion' => $request->id_criterio_evaluacion,
            'puntuacion' => $request->puntuacion,
            'respuesta_puntuacion' => $request->respuesta_puntuacion,
        ]);

        if(!$preguntaPuntuacion){
            $data = [
                'message' => 'Error al crear la pregunta de puntuación',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => $preguntaPuntuacion,
            'status' => 201
        ];

        return response()->json($data, 201);
    }
}
