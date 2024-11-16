<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CreargruposController extends Controller
{

    public function mostrarUsuariosAlAzar($cantidad)
    {
        // Asegura que no se solicite más de los usuarios disponibles
        $cantidad = min($cantidad, Usuario::count());

        // Obtiene el número de usuarios al azar sin repeticiones
        $usuarios = Usuario::inRandomOrder()
            ->distinct('usuario') // Asegura que los usuarios sean únicos
            ->take($cantidad)
            ->get(['usuario', 'password']);

        // Retorna los usuarios como respuesta JSON
        return response()->json($usuarios);
    }
}
