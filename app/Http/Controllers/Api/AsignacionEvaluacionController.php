<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\AsignacionEvaluacion;

class AsignacionEvaluacionController extends Controller
{
    public function index(){
        $asignar = AsignacionEvaluacion::all();
        if ($asignar->isEmpty()) {
            $data = [
                'message' => 'No se encontraron asignaciones',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($asignar, 200);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),
        [
            'id_evaluacion' => 'required',
            'id_grupo' => '',
            'id_usuario' => '',
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

        $asignar = AsignacionEvaluacion::create([
            'id_evaluacion' => $request->id_evaluacion,
            'id_grupo' => $request->id_grupo,
            'id_usuario' => $request->id_usuario,
            'estado_evaluacion' => $request->estado_evaluacion
        ]);
        if (!$asignar){
            $data = [
                'message' => 'error al crear la asignacion',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'asignacion' => $asignar,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id){
        $asignar = AsignacionEvaluacion::find($id);
        if (!$asignar){
            $data = [
                'message' => 'No se encontro la asignar',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($asignar, 200);
    }

    public function destroy($id){
        $asignar = AsignacionEvaluacion::find($id);
        if (!$asignar){
            $data = [
                'message' => 'No se encontro el asignar',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $asignar->delete();
        $data = [
            'message' => 'AsignacionEvaluacion eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $asignar = AsignacionEvaluacion::find($id);
        if (!$asignar){
            $data = [
                'message' => 'No se encontro el asignar',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $validator = Validator::make($request->all(),
        [
            'id_evaluacion' => '',
            'id_grupo' => '',
            'id_usuario' => '',
            'estado_evaluacion' => ''
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->id_evaluacion != null) {
            $asignar->id_evaluacion = $request->id_evaluacion;
        }
        if ($request->id_grupo != null) {
            $asignar->id_grupo = $request->id_grupo;
        }
        if ($request->id_usuario != null) {
            $asignar->id_usuario = $request->id_usuario;
        }
        if ($request->estado_evaluacion != null) {
            $asignar->estado_evaluacion = $request->estado_evaluacion;
        }

        $asignar->save();
        $data = [
            'message' => 'AsignacionEvaluacion actualizado',
            'asignar' => $asignar,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
