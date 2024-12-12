<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class usuarioController extends Controller
{
    public function index(){
        $usuarios = User::all();
        if($usuarios->isEmpty()){
            $data = [
                'message' => 'No hay usuarios registrados',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        return response()->json($usuarios, 200);
    }

    public function show($id){
        $usuario = User::find($id);
        if(!$usuario){
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

    public function listarPorTipo($tipo){
        $usuarios = User::where('tipo_usuario', $tipo)->get();
        if($usuarios->isEmpty()){
            $data = [
                'message' => 'No hay usuarios registrados con ese tipo',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        return response()->json($usuarios, 200);
    }

    /*
    

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
            'nombre_user' => $request->nombre_user,
            'apellido_user' => $request->apellido_user,
            'correo' => $request->correo,
            'tipo_usuario' => $request->tipo_usuario
        ]);
        $data = [
            'message' => 'Usuario actualizado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        // Buscar el usuario por ID
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json([
                'message' => 'Usuario no encontrado',
                'status' => 404
            ], 404);
        }

        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'nombre_user' => 'nullable|string|max:255',
            'apellido_user' => 'nullable|string|max:255',
            'correo' => 'nullable|email|max:255',
            'tipo_usuario' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        // Asignar los valores de la solicitud al objeto usuario si están presentes
        if ($request->has('nombre_user')) {
            $usuario->nombre_user = $request->input('nombre_user');
        }
        if ($request->has('apellido_user')) {
            $usuario->apellido_user = $request->input('apellido_user');
        }
        if ($request->has('correo')) {
            $usuario->correo = $request->input('correo');
        }
        if ($request->has('tipo_usuario')) {
            $usuario->tipo_usuario = $request->input('tipo_usuario');
        }

        // Guardar el objeto usuario en la base de datos
        $usuario->save();

        return response()->json([
            'message' => 'Usuario actualizado correctamente',
            'usuario' => $usuario,
            'status' => 200
        ], 200);
    }*/

    
}

