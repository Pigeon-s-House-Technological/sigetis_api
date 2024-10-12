<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Usuario_Grupo;

class Usuario_grupoController extends Controller
{
    public function index(){
        $usuario_grupo = Usuario_grupo::all();
        if($usuario_grupo->isEmpty()){
            $data = [
                'message' => 'No hay usuarios registrados',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        return response()->json($usuario_grupo, 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id_usuario' => '',
            'id_grupo' => ''
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $usuario_grupo = Usuario_grupo::create([
            'id_usuario' => $request->id_usuario,
            'id_grupo' => $request->id_grupo
        ]);

        if(!$usuario_grupo){
            $data = [
                'message' => 'Error al crear el usuario',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'usuario' => $usuario_grupo,
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
            'usuario' => $usuario,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function destroy($id){
        $usuario_grupo = Usuario_grupo::find($id);
        if(!$usuario_grupo){
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $usuario_grupo->delete();
        $data = [
            'message' => 'Usuario eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id){
        $usuario_grupo = Usuario_grupo::find($id);
        if(!$usuario){
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $usuario->update([
            'id_usuario' => $request->id_usuario,
            'id_grupo' => $request->id_grupo
        ]);
        $data = [
            'message' => 'Usuario actualizado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        // Buscar el usuario por ID
        $usuario_grupo = Usuario_grupo::find($id);
        if (!$usuario_grupo) {
            return response()->json([
                'message' => 'Usuario no encontrado',
                'status' => 404
            ], 404);
        }

        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'id_usuario' => 'nullable|integer',
            'id_grupo' => 'nullable|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        // Asignar los valores de la solicitud al objeto usuario si están presentes
        if ($request->has('id_usuario')) {
            $usuario_grupo->id_usuario = $request->input('id_usuario');
        }
        if ($request->has('id_grupo')) {
            $usuario_grupo->id_grupo = $request->input('id_grupo');
        }

        // Guardar el objeto usuario en la base de datos
        $usuario_grupo->save();

        return response()->json([
            'message' => 'Usuario actualizado correctamente',
            'usuario' => $usuario_grupo,
            'status' => 200
        ], 200);
    }
}
