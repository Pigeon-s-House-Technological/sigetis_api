<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Pregunta_opcion_multiple;

class PreguntaOpcionMultipleController extends Controller
{
    public function index(){
        $preg_op_mult = Pregunta_opcion_multiple::all();
        if ($preg_op_mult->isEmpty()) {
            $data = [
                'message' => 'No se encontraron Preguntas_op_multiples',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($preg_op_mult, 200);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),
        [
            'pregunta_opcion_multiple' => 'required',
            'tipo_opcion_multiple' => 'required',
            'id_criterio_evaluacion' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $preg_op_mult = Pregunta_opcion_multiple::create([
            'pregunta_opcion_multiple' => $request->pregunta_opcion_multiple,
            'tipo_opcion_multiple' => $request->tipo_opcion_multiple,
            'id_criterio_evaluacion' => $request->id_criterio_evaluacion
        ]);
        if (!$preg_op_mult){
            $data = [
                'message' => 'error al crear la preg_op_mult',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'preg_op_mult' => $preg_op_mult,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($criterioId){
        $preg_op_mult = Pregunta_opcion_multiple::where('id_criterio_evaluacion', $criterioId)->get();

        if ($preg_op_mult->isEmpty()) {
            return response()->json([
                'message' => 'No se encontró la pregunta de opción múltiple para este criterio.',
                'status' => 404
            ], 404);
        }
        return response()->json($preg_op_mult, 200);
    }

    public function destroy($id){
        $preg_op_mult = Pregunta_opcion_multiple::find($id);
        if (!$preg_op_mult){
            $data = [
                'message' => 'No se encontro el preg_op_mult',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $preg_op_mult->delete();
        $data = [
            'message' => 'Pregunta_opcion_multiple eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $preg_op_mult = Pregunta_opcion_multiple::find($id);
        if (!$preg_op_mult){
            $data = [
                'message' => 'No se encontro el preg_op_mult',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $validator = Validator::make($request->all(),
        [
            'pregunta_opcion_multiple' => 'required_without_all:tipo_opcion_multiple,id_criterio_evaluacion',
            'tipo_opcion_multiple' => 'required_without_all:pregunta_opcion_multiple,id_criterio_evaluacion',
            'id_criterio_evaluacion' => 'required_without_all:pregunta_opcion_multiple,tipo_opcion_multiple'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->pregunta_opcion_multiple != null) {
            $preg_op_mult->pregunta_opcion_multiple = $request->pregunta_opcion_multiple;
        }
        if ($request->tipo_opcion_multiple != null) {
            $preg_op_mult->tipo_opcion_multiple = $request->tipo_opcion_multiple;
        }
        if ($request->id_criterio_evaluacion != null) {
            $preg_op_mult->id_criterio_evaluacion = $request->id_criterio_evaluacion;
        }

        $preg_op_mult->save();
        $data = [
            'message' => 'Pregunta_opcion_multiple actualizado',
            'preg_op_mult' => $preg_op_mult,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
