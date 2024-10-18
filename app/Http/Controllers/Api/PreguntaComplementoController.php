<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Pregunta_complemento;

class PreguntaComplementoController extends Controller
{
    public function index(){
        $preg_comp = Pregunta_complemento::all();
        if ($preg_comp->isEmpty()) {
            $data = [
                'message' => 'No se encontraron Preguntas_comp',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($preg_comp, 200);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),
        [
            'id_criterio_evaluacion' => 'required',
            'pregunta_complemento' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $preg_comp = Pregunta_complemento::create([
            'id_criterio_evaluacion' => $request->id_criterio_evaluacion,
            'pregunta_complemento' => $request->pregunta_complemento
        ]);
        if (!$preg_comp){
            $data = [
                'message' => 'error al crear la preg_comp',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'preg_comp' => $preg_comp,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id){
        $preg_comp = Pregunta_complemento::find($id);
        if (!$preg_comp){
            $data = [
                'message' => 'No se encontro la preg_comp',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($preg_comp, 200);
    }

    public function destroy($id){
        $preg_comp = Pregunta_complemento::find($id);
        if (!$preg_comp){
            $data = [
                'message' => 'No se encontro el preg_comp',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $preg_comp->delete();
        $data = [
            'message' => 'Pregunta_complemento eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $preg_comp = Pregunta_complemento::find($id);
        if (!$preg_comp){
            $data = [
                'message' => 'No se encontro el preg_comp',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $validator = Validator::make($request->all(),
        [
            'id_criterio_evaluacion' => '',
            'pregunta_complemento' => ''
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->pregunta_complemento != null) {
            $preg_comp->pregunta_complemento = $request->pregunta_complemento;
        }
        if ($request->id_criterio_evaluacion != null) {
            $preg_comp->id_criterio_evaluacion = $request->id_criterio_evaluacion;
        }

        $preg_comp->save();
        $data = [
            'message' => 'Pregunta_complemento actualizado',
            'preg_comp' => $preg_comp,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}

