<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Opcion_pregunta_multiple;

class OpcionPreguntaMultipleController extends Controller
{
    public function index(){
        $opcion_pregunta_multiple = Opcion_pregunta_multiple::all();
        if ($opcion_pregunta_multiple->isEmpty()) {
            $data = [
                'message' => 'No se encontraron opciones_pregunta_multiple',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($opcion_pregunta_multiple, 200);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),
        [
            'id_pregunta_multiple' => 'required',
            'opcion_pregunta' => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $opcion_pregunta_multiple = Opcion_pregunta_multiple::create([
            'id_pregunta_multiple' => $request->id_pregunta_multiple,
            'opcion_pregunta' => $request->opcion_pregunta,
        ]);
        if (!$opcion_pregunta_multiple){
            $data = [
                'message' => 'error al crear la opcion_pregunta_multiple',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'opcion_pregunta_multiple' => $opcion_pregunta_multiple,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id){
        $opcion_pregunta_multiple = Opcion_pregunta_multiple::find($id);
        if (!$opcion_pregunta_multiple){
            $data = [
                'message' => 'No se encontro la opcion_pregunta_multiple',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($opcion_pregunta_multiple, 200);
    }

    public function destroy($id){
        $opcion_pregunta_multiple = Opcion_pregunta_multiple::find($id);
        if (!$opcion_pregunta_multiple){
            $data = [
                'message' => 'No se encontro el opcion_pregunta_multiple',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $opcion_pregunta_multiple->delete();
        $data = [
            'message' => 'Opcion_pregunta_multiple eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $opcion_pregunta_multiple = Opcion_pregunta_multiple::find($id);
        if (!$opcion_pregunta_multiple){
            $data = [
                'message' => 'No se encontro el opcion_pregunta_multiple',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $validator = Validator::make($request->all(),
        [
            'id_pregunta_multiple' => '',
            'opcion_pregunta' => '',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->id_pregunta_multiple != null) {
            $opcion_pregunta_multiple->id_pregunta_multiple = $request->id_pregunta_multiple;
        }
        if ($request->opcion_pregunta != null) {
            $opcion_pregunta_multiple->opcion_pregunta = $request->opcion_pregunta;
        }

        $opcion_pregunta_multiple->save();
        $data = [
            'message' => 'Opcion_pregunta_multiple actualizado',
            'opcion_pregunta_multiple' => $opcion_pregunta_multiple,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
