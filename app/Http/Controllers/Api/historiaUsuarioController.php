<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Historia_usuario;


class historiaUsuarioController extends Controller
{
    public function index(){
        $hus = Historia_usuario::all();
        if($hus->isEmpty()){
            $data = [
                'message' => 'No hay hus registrados',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        return response()->json($hus, 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'titulo_hu' => 'required',
            'id_sprint' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $hu = Historia_usuario::create([
            'id_sprint' => $request->id_sprint,
            //'identificador_hu' => $request->identificador_hu,
            //'prerrequisitos' => $request->prerrequisitos,
            //'descripcion_hu' => $request->descripcion_hu,
            //'prioridad' => $request->prioridad,
            //'tiempo_estimado' => $request->tiempo_estimado,
            'titulo_hu' => $request->titulo_hu,
            //'criterios_aceptacion' => $request->criterios_aceptacion,
            //'mockup' => $request->mockup
        ]);

        if(!$hu){
            $data = [
                'message' => 'Error al crear el hu',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => $hu,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($id){
        $hu = Historia_usuario::find($id);
        if(!$hu){
            $data = [
                'message' => 'Historia_usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'hu' => $hu,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id){
        $hu = Historia_usuario::find($id);
        if(!$hu){
            $data = [
                'message' => 'Historia_usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $hu->delete();
        $data = [
            'message' => 'Historia_usuario eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id){
        $hu = Historia_usuario::find($id);
        if(!$hu){
            $data = [
                'message' => 'Historia_usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $hu->update([
            //'id_sprint' => $request->id_sprint,
            //'identificador_hu' => $request->identificador_hu,
            //'prerrequisitos' => $request->prerrequisitos,
            //'descripcion_hu' => $request->descripcion_hu,
            //'prioridad' => $request->prioridad,
            //'tiempo_estimado' => $request->tiempo_estimado,
            'titulo_hu' => $request->titulo_hu,
            //'criterios_aceptacion' => $request->criterios_aceptacion,
            //'mockup' => $request->mockup
        ]);
        $data = [
            'message' => 'Historia_usuario actualizado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $hu = Historia_usuario::find($id);
        if(!$hu){
            $data = [
                'message' => 'Historia_usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        if($request->has('titulo_hu')){
            $hu->titulo_hu = $request->titulo_hu;
        }
        

        $hu->save();

        $data = [
            'message' => 'Historia_usuario actualizado',
            'hu' => $hu,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
