<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Respuesta_opcion_multiple;

class RespuestaOpcionMultipleController extends Controller
{
    public function index(){
        $respuesta_opcion_multiple = Respuesta_opcion_multiple::all();
        if ($respuesta_opcion_multiple->isEmpty()) {
            $data = [
                'message' => 'No se encontraron respuesta_opcion_multiple',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($respuesta_opcion_multiple, 200);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),
        [
            'id_opcion_pregunta_multiple' => 'required',
            'estado_respuesta_opcion_multiple' => 'required',
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

        $respuesta_opcion_multiple = Respuesta_opcion_multiple::create([
            'id_opcion_pregunta_multiple' => $request->id_opcion_pregunta_multiple,
            'estado_respuesta_opcion_multiple' => $request->estado_respuesta_opcion_multiple,
            'id_grupo_evaluacion' => $request->id_grupo_evaluacion,
        ]);
        if (!$respuesta_opcion_multiple){
            $data = [
                'message' => 'error al crear la respuesta_opcion_multiple',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'respuesta_opcion_multiple' => $respuesta_opcion_multiple,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id){
        $respuesta_opcion_multiple = Respuesta_opcion_multiple::find($id);
        if (!$respuesta_opcion_multiple){
            $data = [
                'message' => 'No se encontro la respuesta_opcion_multiple',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($respuesta_opcion_multiple, 200);
    }

    public function destroy($id){
        $respuesta_opcion_multiple = Respuesta_opcion_multiple::find($id);
        if (!$respuesta_opcion_multiple){
            $data = [
                'message' => 'No se encontro el respuesta_opcion_multiple',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $respuesta_opcion_multiple->delete();
        $data = [
            'message' => 'Respuesta_opcion_multiple eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $respuesta_opcion_multiple = Respuesta_opcion_multiple::find($id);
        if (!$respuesta_opcion_multiple){
            $data = [
                'message' => 'No se encontro el respuesta_opcion_multiple',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $validator = Validator::make($request->all(),
        [
            'id_opcion_pregunta_multiple' => '',
            'estado_respuesta_opcion_multiple' => '',
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

        if ($request->id_opcion_pregunta_multiple != null) {
            $respuesta_opcion_multiple->id_opcion_pregunta_multiple = $request->id_opcion_pregunta_multiple;
        }
        if ($request->estado_respuesta_opcion_multiple != null) {
            $respuesta_opcion_multiple->estado_respuesta_opcion_multiple = $request->estado_respuesta_opcion_multiple;
        }
        if ($request->id_grupo_evaluacion != null) {
            $respuesta_opcion_multiple->id_grupo_evaluacion = $request->id_grupo_evaluacion;
        }

        $respuesta_opcion_multiple->save();
        $data = [
            'message' => 'Respuesta_opcion_multiple actualizado',
            'respuesta_opcion_multiple' => $respuesta_opcion_multiple,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
