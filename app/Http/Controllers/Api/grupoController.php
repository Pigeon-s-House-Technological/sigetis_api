<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grupo;
use Illuminate\Support\Facades\Validator;


class GrupoController extends Controller
{
    public function index(){
        $grupo = Grupo::all();
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
            'cantidad_integ' => 'required|integer',
            'id_tutor' => 'required',
            'id_jefe_grupo' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $grupo = Grupo::create([
            'nombre_grupo' => $request->nombre_grupo,
            'descripcion_grupo' => $request->descripcion_grupo,
            'cantidad_integ' => $request->cantidad_integ,
            'id_tutor' => $request->id_tutor,
            'id_jefe_grupo' => $request->id_jefe_grupo
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
        $grupo = Grupo::find($id);
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
        $grupo = Grupo::find($id);
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
        $grupo = Grupo::find($id);
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
            'cantidad_integ' => $request->cantidad_integ,
            'id_tutor' => $request->id_tutor,
            'id_jefe_grupo' => $request->id_jefe_grupo
        ]);
        $data = [
            'message' => 'Grupo actualizado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $grupo = Grupo::find($id);
        if(!$grupo){
            $data = [
                'message' => 'Grupo no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(), [
            'nombre_grupo' => 'required_without_all:descripcion_grupo,id_tutor,id_jefe_grupo',
            'descripcion_grupo' => 'required_without_all:nombre_grupo,id_tutor,id_jefe_grupo',
            'cantidad_integ' => 'required_without_all:nombre_grupo,descripcion_grupo,id_tutor,id_jefe_grupo',
            'id_tutor' => 'required_without_all:nombre_grupo,descripcion_grupo,id_jefe_grupo',
            'id_jefe_grupo' => 'required_without_all:nombre_grupo,descripcion_grupo,id_tutor'
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
        if ($request->has('cantidad_integ')) {
            $grupo->cantidad_integ = $request->cantidad_integ;
        }
        if($request->has('id_tutor')){
            $grupo->id_tutor = $request->id_tutor;
        }
        if($request->has('id_jefe_grupo')){
            $grupo->id_jefe_grupo = $request->id_jefe_grupo;
        }

        $grupo->save();

        $data = [
            'message' => 'Grupo actualizado',
            'grupo' => $grupo,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
