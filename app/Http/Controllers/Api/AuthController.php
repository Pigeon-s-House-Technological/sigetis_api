<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:users',
            'tipo_usuario' => 'required|integer',
            'usuario' => 'required|string|max:255|unique:users',
            'password' => 'required|confirmed|string|min:7'
        ]);

        If($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $contrasena = $request->password;
        $user = new User();
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->correo = $request->correo;
        $user->tipo_usuario = $request->tipo_usuario;
        $user->password = HASH::make($request->password);
        $user->usuario = $request->usuario;
        $user->save();

        $data = [
            'user' => $user,
            'password' => $contrasena,
            'message' => 'Usuario creado exitosamente',
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function login(Request $request){
            
        $credentials = $request->validate([
            'usuario' => 'required|string',
            'password' => 'required'
        ]);
    
        if (Auth::attempt(['usuario' => $credentials['usuario'], 'password' => $credentials['password']])) {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            $cookie = cookie('cookie_token', $token, 60*24);
            $data = [
                'token' => $token,
                'tipo_usuario' => $user->tipo_usuario,
                'message' => 'Usuario Logeado',
                'success' => true,
                'status' => 200
            ];
            return response()->json($data, 200)->withCookie($cookie);
        }else{
            $data = [
                'message' => 'Credenciales no validas',
                'success' => false,
                'status' => 401
            ];
            return response()->json($data, 401);
        }
    }

    public function userProfile(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'message' => 'No autenticado',
            ], 401);
        }
        $grupos = $user->grupos; // Asumiendo que la relación 'grupos' está definida en el modelo User

        // Determinar el ID del grupo o -1 si pertenece a más de un grupo
        $grupoId = $grupos->count() > 1 ? -1 : ($grupos->first() ? $grupos->first()->id : null);

        return response()->json([
            'message' => 'Usuario autenticado',
            'userData' => $user,
            'grupoId' => $grupoId,
        ], 200);
    }

    public function logout(Request $request){
        $cookie = Cookie::forget('cookie_token');
        return response([
            'message' => 'Usuario deslogeado',
            'status' => 200
        ], 200)->withCookie($cookie);
    }


}