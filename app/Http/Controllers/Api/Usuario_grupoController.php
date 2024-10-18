<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;
use App\Models\Grupo;

class Usuario_grupoController extends Controller
{
    public function index(){

        $usuarios = Usuario::with('grupos')->get();

        if ($usuarios->isEmpty()) {
            $data = [
                'message' => 'No hay usuarios registrados',
                'status' => 200
            ];
            return response()->json($data, 404);
        }

        return response()->json($usuarios, 200);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'id_usuario' => 'required|exists:usuario,id',
            'id_grupo' => 'required|exists:grupo,id',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $usuario = Usuario::find($request->id_usuario);
        $usuario->grupos()->attach($request->id_grupo);

        $data = [
            'usuario' => $usuario,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $usuario = Usuario::with('grupos')->find($id);
        if (!$usuario) {
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'usuario' => $usuario,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id_usuario, $id_grupo)
    {
        $usuario = Usuario::find($id_usuario);
        if (!$usuario) {
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $grupo = Grupo::find($id_grupo);
        if (!$grupo) {
            $data = [
                'message' => 'Grupo no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $usuario->grupos()->detach($id_grupo);

        $data = [
            'message' => 'Relación usuario-grupo eliminada',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

}

