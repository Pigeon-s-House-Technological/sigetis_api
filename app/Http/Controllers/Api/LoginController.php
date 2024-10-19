<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function registro(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
           
        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        /*
        //para adaptar con nuestra base de datos
        $nombreUser = $request->input('nombre_user');

        // Comparar con todos los nombres en la tabla usuario
        $usuario = Usuario::where('nombre_user', $nombreUser)->first();

        // Si se encuentra un usuario con ese nombre
        if ($usuario) {
            return response()->json([
                'message' => 'El nombre de usuario existe',
                'nombre_user' => $usuario->nombre_user
            ]);
        } else {
            return response()->json([
                'message' => 'El nombre de usuario no existe'
            ], 404);
        }*/
        
        $respuesta = [];
        // Crear el usuario con los datos validados
        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password) // Encriptar la contraseña
        ]);
        if(!$user){
            $data = [
                'message' => 'Error al crear el usuario',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        
        // Retornar la respuesta con el usuario creado
        return response()->json([
            'message' => 'Usuario registrado exitosamente'
        ]);
    }
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
    public function login(Request $request){
        $credenciales = $request->validate([
            'email'=> ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credenciales)){
            $user = Auth::user(); 
            $token = $user->createToken('token')->plainTextToken;
            $cookie =cookie('cookie_token', 60*24);
            return response(["token"=>$token], Response::HTTP_OK)->withoutCookie($cookie);
        } else {
            return response()->json([
                'message' => 'Credenciales incorrectAS'
            ],Response::HTTP_UNAUTHORIZED);
        }
        
    }
    public function userProfile(Request $request){
        return response()->json([
            "message" => "Authentificado",
            /*"userData" => auth()->user()*/
        ], Response::HTTP_OK);

    }
    public function logout(){
        $cookie =Cookie::forget('cookie_token');
        return response(["message"=>"Cierre de seción Ok"], Response::HTTP_OK)->withCookie($cookie);

    }
    public function alluser(Request $request){

    }
}
