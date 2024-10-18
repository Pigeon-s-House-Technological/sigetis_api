<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Historia_usuario;

class HistoriaUsuarioController extends Controller
{
    public function index(){
        $hu = Historia_usuario::all();
        if ($hu->isEmpty()) {
            $data = [
                'message' => 'No se encontraron hus',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($hu, 200);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),
        [
            'id_sprint' => 'required',
            'titulo_hu' => 'required',
            'identificador_hu' => 'nullable',
            'prerrequisitos' => 'nullable',
            'descripcion_hu' => 'nullable',
            'prioridad' => 'nullable',
            'tiempo_estimado' => 'nullable',
            'criterios_aceptacion' => 'nullable'
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
            'titulo_hu' => $request->titulo_hu,
            'identificador_hu' => $request->identificador_hu,
            'prerrequisitos' => $request->prerrequisitos,
            'descripcion_hu' => $request->descripcion_hu,
            'prioridad' => $request->prioridad,
            'tiempo_estimado' => $request->tiempo_estimado,
            'criterios_aceptacion' => $request->criterios_aceptacion
        ]);
        if (!$hu){
            $data = [
                'message' => 'error al crear el hu',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'hu' => $hu,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id){
        $hu = Historia_usuario::find($id);
        if (!$hu){
            $data = [
                'message' => 'No se encontro el hu',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($hu, 200);
    }

    public function destroy($id){
        $hu = Historia_usuario::find($id);
        if (!$hu){
            $data = [
                'message' => 'No se encontro el hu',
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
        if (!$hu){
            $data = [
                'message' => 'No se encontro el hu',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(),
        [
            'id_sprint' => 'required',
            'titulo_hu' => 'required',
            'identificador_hu' => 'nullable',
            'prerrequisitos' => 'nullable',
            'descripcion_hu' => 'nullable',
            'prioridad' => 'nullable',
            'tiempo_estimado' => 'nullable',
            'criterios_aceptacion' => 'nullable'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $hu->id_sprint = $request->id_sprint;
        $hu->titulo_hu = $request->titulo_hu;
        $hu->identificador_hu = $request->identificador_hu;
        $hu->prerrequisitos = $request->prerrequisitos;
        $hu->descripcion_hu = $request->descripcion_hu;
        $hu->prioridad = $request->prioridad;
        $hu->tiempo_estimado = $request->tiempo_estimado;
        $hu->criterios_aceptacion = $request->criterios_aceptacion;

        $hu->save();
        $data = [
            'message' => 'Historia_usuario actualizado',
            'hu' => $hu,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $hu = Historia_usuario::find($id);
        if (!$hu){
            $data = [
                'message' => 'No se encontro el hu',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $validator = Validator::make($request->all(),
        [
            'id_sprint' => 'required_without_all:titulo_hu,identificador_hu,prerrequisitos,descripcion_hu,prioridad,tiempo_estimado,criterios_aceptacion',
            'titulo_hu' => 'required_without_all:id_sprint,identificador_hu,prerrequisitos,descripcion_hu,prioridad,tiempo_estimado,criterios_aceptacion',
            'identificador_hu' => 'nullable_without_all:id_sprint,titulo_hu,prerrequisitos,descripcion_hu,prioridad,tiempo_estimado,criterios_aceptacion',
            'prerrequisitos' => 'nullable_without_all:id_sprint,titulo_hu,identificador_hu,descripcion_hu,prioridad,tiempo_estimado,criterios_aceptacion',
            'descripcion_hu' => 'nullable_without_all:id_sprint,titulo_hu,identificador_hu,prerrequisitos,prioridad,tiempo_estimado,criterios_aceptacion',
            'prioridad' => 'nullable_without_all:id_sprint,titulo_hu,identificador_hu,prerrequisitos,descripcion_hu,tiempo_estimado,criterios_aceptacion',
            'tiempo_estimado' => 'nullable_without_all:id_sprint,titulo_hu,identificador_hu,prerrequisitos,descripcion_hu,prioridad,criterios_aceptacion',
            'criterios_aceptacion' => 'nullable_without_all:id_sprint,titulo_hu,identificador_hu,prerrequisitos,descripcion_hu,prioridad,tiempo_estimado'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->id_sprint){
            $hu->id_sprint = $request->id_sprint;
        }
        if ($request->titulo_hu){
            $hu->titulo_hu = $request->titulo_hu;
        }
        if ($request->identificador_hu){
            $hu->identificador_hu = $request->identificador_hu;
        }
        if ($request->prerrequisitos){
            $hu->prerrequisitos = $request->prerrequisitos;
        }
        if ($request->descripcion_hu){
            $hu->descripcion_hu = $request->descripcion_hu;
        }
        if ($request->prioridad){
            $hu->prioridad = $request->prioridad;
        }
        if ($request->tiempo_estimado){
            $hu->tiempo_estimado = $request->tiempo_estimado;
        }
        if ($request->criterios_aceptacion){
            $hu->criterios_aceptacion = $request->criterios_aceptacion;
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
