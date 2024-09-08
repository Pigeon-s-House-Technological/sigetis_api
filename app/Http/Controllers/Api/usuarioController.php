<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Usuario;

class usuarioController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();
        if($usuarios->isEmpty()){
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
            'nombre' => 'required',
            'correo' => 'required|unique:usuario',
            'contrasena' => 'required',
            'tipo_usuario' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'contrasena' => $request->contrasena,
            'tipo_usuario' => $request->tipo_usuario
        ]);

        if(!$usuario){
            $data = [
                'message' => 'Error al crear el usuario',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => $usuario,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($id){
        $usuario = Usuario::find($id);
        if(!$usuario){
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'student' => $usuario,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id){
        $usuario = Usuario::find($id);
        if(!$usuario){
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $usuario->delete();
        $data = [
            'message' => 'Usuario eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id){
        $usuario = Usuario::find($id);
        if(!$usuario){
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $usuario->update([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'contrasena' => $request->contrasena,
            'tipo_usuario' => $request->tipo_usuario
        ]);
        $data = [
            'message' => 'Usuario actualizado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $usuario = Usuario::find($id);
        if(!$usuario){
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => '',
            'correo' => 'unique:usuario',
            'contrasena' => '',
            'tipo_usuario' => ''
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if($request->has('nombre')){
            $usuario->nombre = $request->nombre;
        }
        if($request->has('correo')){
            $usuario->correo = $request->correo;
        }
        if($request->has('contrasena')){
            $usuario->contrasena = $request->contrasena;
        }
        if($request->has('tipo_usuario')){
            $usuario->tipo_usuario = $request->tipo_usuario;
        }

        $usuario->save();

        $data = [
            'message' => 'Usuario actualizado',
            'usuario' => $usuario,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}

