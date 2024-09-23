<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grupo;
use Illuminate\Support\Facades\Validator;


class grupoController extends Controller
{
    public function index(){
        $grupo = grupo::all();
        if($grupo->isEmpty()){
            $data = [
                'message' => 'No hay Grupos registrados',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        return response()->json($grupo, 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre_grupo' => 'required',
            'descripcion_grupo' => 'required',
            'id_tutor' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $grupo = grupo::create([
            'nombre_grupo' => $request->nombre_grupo,
            'descripcion_grupo' => $request->descripcion_grupo,
            'id_tutor' => $request->id_tutor
        ]);

        if(!$grupo){
            $data = [
                'message' => 'Error al crear grupo',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => $grupo,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($id){
        $grupo = grupo::find($id);
        if(!$grupo){
            $data = [
                'message' => 'Grupo no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'grupo' => $grupo,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id){
        $grupo = grupo::find($id);
        if(!$grupo){
            $data = [
                'message' => 'Grupo no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $grupo->delete();
        $data = [
            'message' => 'Grupo eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id){
        $grupo = grupo::find($id);
        if(!$grupo){
            $data = [
                'message' => 'Grupo no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $grupo->update([
            'nombre_grupo' => $request->nombre_grupo,
            'descripcion_grupo' => $request->descripcion_grupo,
            'id_tutor' => $request->id_tutor
        ]);
        $data = [
            'message' => 'Grupo actualizado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $grupo = grupo::find($id);
        if(!$grupo){
            $data = [
                'message' => 'Grupo no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(), [
            'nombre_grupo' => 'required_without_all:descripcion_grupo,id_tutor',
            'descripcion_grupo' => 'required_without_all:nombre_grupo,id_tutor',
            'id_tutor' => 'required_without_all:nombre_grupo,descripcion_grupo'
        ]);
        
        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if($request->has('nombre_grupo')){
            $grupo->nombre_grupo = $request->nombre_grupo;
        }
        if($request->has('descripcion_grupo')){
            $grupo->descripcion_grupo = $request->descripcion_grupo;
        }
        if($request->has('id_tutor')){
            $grupo->id_tutor = $request->id_tutor;
        }

        $grupo->save();

        $data = [
            'message' => 'Grupo actualizado',
            'usuario' => $grupo,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
