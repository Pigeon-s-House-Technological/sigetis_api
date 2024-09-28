<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Actividad;

class ActividadController extends Controller
{
    public function index(){
        $actividad = Actividad::all();
        if ($actividad->isEmpty()) {
            $data = [
                'message' => 'No se encontraron Actividades',
                'status' => 200
            ];
        }
        return response()->json($actividad, 200);
    }

    public function store(){

        $validator = Validator::make($request->all(),
        [
            'id_hu' => 'required',
            'nombre_actividad' => 'required',
        ]);

        $actividad = Actividad::create([
            'id_hu' => $request->id_hu,
            'nombre_actividad' => $request->nombre_actividad,
            'estado_actividad' => $request->estado_actividad,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'encargado' => $request->encargado
        ]);
        if (!$actividad){
            $data = [
                'message' => 'error al crear la actividad',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'actividad' => $actividad,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id){
        $actividad = Actividad::find($id);
        if (!$actividad){
            $data = [
                'message' => 'Actividad no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($actividad, 200);
    }

    public function update(Request $request, $id){
        $actividad = Actividad::find($id);
        if (!$actividad){
            $data = [
                'message' => 'Actividad no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $actividad->update($request->all());
        $data = [
            'actividad' => $actividad,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id){
        $actividad = Actividad::find($id);
        if (!$actividad){
            $data = [
                'message' => 'Actividad no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $actividad->delete();
        $data = [
            'message' => 'Actividad eliminada',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $actividad = Actividad::find($id);
        if(!$actividad){
            $data = [
                'message' => 'actividad no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(), [
            'id_hu' => 'required_without_all:nombre_actividad,estado_actividad,fecha_inicio,fecha_fin,encargado',
            'nombre_actividad' => 'required_without_all:estado_actividad,fecha_inicio,fecha_fin,encargado',
            'estado_actividad' => 'required_without_all:fecha_inicio,fecha_fin,encargado',
            'fecha_inicio' => 'required_without_all:fecha_fin,encargado',
            'fecha_fin' => 'required_without_all:encargado',
            'encargado' => 'required_without_all:fecha_fin'
        ]);
        

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if($request->has('id_hu')){
            $actividad->id_hu = $request->id_hu;
        }

        if($request->has('nombre_actividad')){
            $actividad->nombre_actividad = $request->nombre_actividad;
        }

        if($request->has('estado_actividad')){
            $actividad->estado_actividad = $request->estado_actividad;
        }

        if($request->has('fecha_inicio')){
            $actividad->fecha_inicio = $request->fecha_inicio;
        }

        if($request->has('fecha_fin')){
            $actividad->fecha_fin = $request->fecha_fin;
        }

        if($request->has('encargado')){
            $actividad->encargado = $request->encargado;
        }
        
        $actividad->save();

        $data = [
            'message' => 'Criterio de evaluación actualizado',
            'evaluacion' => $criterio_evaluacion,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
