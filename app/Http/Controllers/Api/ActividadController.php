<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Actividad;

class ActividadController extends Controller
{
    public function index(){
        $actividades = Actividad::all();
        if($actividades->isEmpty()){
            $data = [
                'message' => 'No hay actividades registrados',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        return response()->json($actividades, 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id_hu' => 'required',
            'nombre_actividad'=> 'required',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $actividad = Actividad::create([
            'id_hu' => $request->id_hu,
            'id_usuario' => $request->id_usuario,
            'nombre_actividad' => $request->nombre_actividad,
            'estado_actividad' => $request->estado_actividad,
        ]);

        if(!$actividad){
            $data = [
                'message' => 'Error al crear el actividad',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => $actividad,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($id){
        $actividad = Actividad::find($id);
        if(!$actividad){
            $data = [
                'message' => 'Actividad no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'actividad' => $actividad,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id){
        $actividad = Actividad::find($id);
        if(!$actividad){
            $data = [
                'message' => 'Actividad no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $actividad->delete();
        $data = [
            'message' => 'Actividad eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id){
        $actividad = Actividad::find($id);
        if(!$actividad){
            $data = [
                'message' => 'Actividad no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $actividad->update([
            'id_hu' => $request->id_hu,
            'id_usuario' => $request->id_usuario,
            'nombre_actividad' => $request->nombre_actividad,
            'estado_actividad' => $request->estado_actividad,
        ]);
        $data = [
            'message' => 'Actividad actualizado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $actividad = Actividad::find($id);
        if(!$actividad){
            $data = [
                'message' => 'Actividad no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        if($request->has('nombre_actividad')){
            $actividad->nombre_actividad = $request->nombre_actividad;
        }

        if($request->has('estado_actividad')){
            $actividad->estado_actividad = $request->estado_actividad;
        }

        if($request->has('id_usuario')){
            $actividad->id_usuario = $request->id_usuario;
        }
        
        $actividad->save();

        $data = [
            'message' => 'Actividad actualizado',
            'actividad' => $actividad,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
