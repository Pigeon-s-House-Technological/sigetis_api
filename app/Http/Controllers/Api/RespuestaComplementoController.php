<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Respuesta_complemento;

class RespuestaComplementoController extends Controller
{
    public function index(){
        $respuesta_complemento = Respuesta_complemento::all();
        if ($respuesta_complemento->isEmpty()) {
            $data = [
                'message' => 'No se encontraron respuestas_complemento',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($respuesta_complemento, 200);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),
        [
            'id_pregunta_complemento' => 'required',
            'respuesta_complemento' => 'required',
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

        $respuesta_complemento = Respuesta_complemento::create([
            'id_pregunta_complemento' => $request->id_pregunta_complemento,
            'respuesta_complemento' => $request->respuesta_complemento,
            'id_grupo_evaluacion' => $request->id_grupo_evaluacion,
        ]);
        if (!$respuesta_complemento){
            $data = [
                'message' => 'error al crear la respuesta_complemento',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'respuesta_complemento' => $respuesta_complemento,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id){
        $respuesta_complemento = Respuesta_complemento::find($id);
        if (!$respuesta_complemento){
            $data = [
                'message' => 'No se encontro la respuesta_complemento',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($respuesta_complemento, 200);
    }

    public function destroy($id){
        $respuesta_complemento = Respuesta_complemento::find($id);
        if (!$respuesta_complemento){
            $data = [
                'message' => 'No se encontro el respuesta_complemento',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $respuesta_complemento->delete();
        $data = [
            'message' => 'Respuesta_complemento eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $respuesta_complemento = Respuesta_complemento::find($id);
        if (!$respuesta_complemento){
            $data = [
                'message' => 'No se encontro el respuesta_complemento',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $validator = Validator::make($request->all(),
        [
            'id_pregunta_complemento' => '',
            'respuesta_complemento' => '',
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

        if ($request->id_pregunta_complemento != null) {
            $respuesta_complemento->id_pregunta_complemento = $request->id_pregunta_complemento;
        }
        if ($request->respuesta_complemento != null) {
            $respuesta_complemento->respuesta_complemento = $request->respuesta_complemento;
        }
        if ($request->id_grupo_evaluacion != null) {
            $respuesta_complemento->id_grupo_evaluacion = $request->id_grupo_evaluacion;
        }

        $respuesta_complemento->save();
        $data = [
            'message' => 'Respuesta_complemento actualizado',
            'respuesta_complemento' => $respuesta_complemento,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
