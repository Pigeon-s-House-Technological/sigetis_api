<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Grupo;

class Usuario_grupoController extends Controller
{
    public function index(){

        $usuarios = User::with('grupos')->get();

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
            'id_usuario' => 'required|exists:users,id',
            'id_grupo' => 'required|exists:grupo,id',
        ]);
    
        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'user' => $request->all(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
    
        $usuario = User::find($request->id_usuario);
        if (!$usuario) {
            $data = [
                'message' => 'Usuario no encontrado',
                'user'=> $request->id_usuario,
                'status' => 404
            ];
            return response()->json($data, 404);
        }
    
        $grupo = Grupo::find($request->id_grupo);
        if (!$grupo) {
            $data = [
                'message' => 'Grupo no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
    
        $usuario->grupos()->attach($request->id_grupo);
    
        $data = [
            'usuario' => $usuario,
            'status' => 201
        ];
    
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $usuario = User::with('grupos')->find($id);
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

    public function eliminarIntegrante($id_usuario, $id_grupo)
    {
        $usuario = User::find($id_usuario);
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

    public function integrantes($id_grupo)
    {
        $grupo = Grupo::with('usuarios')->find($id_grupo);
        if (!$grupo) {
            $data = [
                'message' => 'Grupo no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        // Extraer solo los nombres, los IDs de los usuarios y si son jefes de grupo
        $integrantes = $grupo->usuarios->filter(function($usuario) {
            return $usuario->tipo_usuario != 1;
        })->map(function($usuario) use ($grupo) {
            return [
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'jefe' => $usuario->id == $grupo->id_jefe_grupo
            ];
        });

        $id_jefe = $grupo->id_jefe_grupo;
        $jefe_grupo = User::find($id_jefe);
        $nombre_jefe = $jefe_grupo ? $jefe_grupo->nombre : 'N/A';

        $id_tutor = $grupo->id_tutor;
        $tutor_grupo = User::find($id_tutor);
        $nombre_tutor = $tutor_grupo ? $tutor_grupo->nombre : 'N/A';

        $data = [
            'integrantes' => $integrantes,
            'jefe_grupo' => $nombre_jefe,
            'tutor_grupo' => $nombre_tutor,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function asignarUsuariosGrupo($cantidad, $id_grupo)
    {
        $grupo = Grupo::find($id_grupo);
        if (!$grupo) {
            return response()->json([
                'message' => 'Grupo no encontrado',
                'status' => 404
            ], 404);
        }

        $usuariosCreados = [];

        for ($i = 0; $i < $cantidad; $i++) {
            $username = 'user_' . Str::random(10);
            $password = Str::random(15);
            $tipo_usuario = 3;

            if($i==0){
                $usuario = User::create([
                    'nombre' => $username,
                    'apellido' => 'Apellido Jefe',
                    'usuario' => $username,
                    'correo' => $username . '@gmail.com', // Asegúrate de que el email sea único
                    'password' => Hash::make($password),
                    'password_confirmation' => Hash::make($password),
                    'tipo_usuario' => 2 // Asumiendo que tipo_usuario 2 es el tipo deseado
                ]);
                $tipo_usuario = 2;
                $grupo->id_jefe_grupo = $usuario->id;
                $grupo->save();
            }else{
                $usuario = User::create([
                    'nombre' => $username,
                    'apellido' => 'Apellido',
                    'usuario' => $username,
                    'correo' => $username . '@gmail.com', // Asegúrate de que el email sea único
                    'password' => Hash::make($password),
                    'password_confirmation' => Hash::make($password),
                    'tipo_usuario' => 3 // Asumiendo que tipo_usuario 2 es el tipo deseado
                ]);
            }

            // Asignar el usuario al grupo
            $grupo->usuarios()->attach($usuario->id);

            // Agregar el usuario creado al array de respuesta
            $usuariosCreados[] = [
                'usuario' => $username,
                'contraseña' => $password,
                'tipo_usuario' => $tipo_usuario
            ];
        }

        return response()->json([
            'message' => 'Usuarios creados y asignados al grupo',
            'usuarios' => $usuariosCreados,
            'status' => 201
        ], 201);
    }

    public function asignarJefeGrupo($id_usuario, $id_grupo)
    {
        $usuario = User::find($id_usuario);
        if (!$usuario) {
            return response()->json([
                'message' => 'Usuario no encontrado',
                'status' => 404
            ], 404);
        }

        $grupo = Grupo::find($id_grupo);
        if (!$grupo) {
            return response()->json([
                'message' => 'Grupo no encontrado',
                'status' => 404
            ], 404);
        }

        if ($grupo->id_jefe_grupo) {
            $usuarioAnterior = User::find($grupo->id_jefe_grupo);
            if ($usuarioAnterior) {
                // Cambiar el tipo de usuario del jefe de grupo anterior a 3
                $usuarioAnterior->tipo_usuario = 3;
                $usuarioAnterior->save();
            }
        }

        $grupo->id_jefe_grupo = $usuario->id;
        $grupo->save();

        $usuario->tipo_usuario = 2;
        $usuario->save();

        return response()->json([
            'message' => 'Jefe de grupo asignado',
            'status' => 200
        ], 200);
    }

    public function asignarTutorGrupo($id_usuario, $id_grupo)
    {
        $usuario = User::find($id_usuario);
        if (!$usuario) {
            return response()->json([
                'message' => 'Usuario no encontrado',
                'status' => 404
            ], 404);
        }

        $grupo = Grupo::find($id_grupo);
        if (!$grupo) {
            return response()->json([
                'message' => 'Grupo no encontrado',
                'status' => 404
            ], 404);
        }

        $grupo->id_tutor = $usuario->id;
        $grupo->save();

        return response()->json([
            'message' => 'Jefe de grupo asignado',
            'status' => 200
        ], 200);
    }

    public function usuariosSinGrupo(){
        // Obtener todos los usuarios que no tienen grupo
        $usuariosSinGrupo = User::doesntHave('grupos')
                            ->whereNotIn('tipo_usuario', [0, 1])
                            ->get();

        if ($usuariosSinGrupo->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron usuarios sin grupo',
                'status' => 200
            ], 200);
        }

        return response()->json([
            'message' => 'Usuarios sin grupo encontrados',
            'usuarios' => $usuariosSinGrupo,
            'status' => 200
        ], 200);

    }
}