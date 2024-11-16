<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\User;

class Informacion_grupo extends Controller
{
    public function mostrarIntegrantes($idGrupo)
    {
        // Busca el grupo con los datos del tutor, jefe de grupo e integrantes
        $grupo = Grupo::with([
            'tutor' => function ($query) {
                $query->select('id', 'nombre', 'apellido');
            },
            'jefeGrupo' => function ($query) {
                $query->select('id', 'nombre', 'apellido');
            },
            'usuarios' => function ($query) {
                $query->select('users.id', 'users.nombre', 'users.apellido');
            }
        ])->find($idGrupo);

        // Verifica si el grupo existe
        if (!$grupo) {
            return response()->json(['message' => 'Grupo no encontrado'], 404);
        }

        // Resultados
        $resultado = [
            'nombre_grupo' => $grupo->nombre_grupo,
            'descripcion_grupo' => $grupo->descripcion_grupo,
            'tutor' => $grupo->tutor ? "{$grupo->tutor->nombre} {$grupo->tutor->apellido}" : null,
            'jefe_grupo' => $grupo->jefeGrupo ? "{$grupo->jefeGrupo->nombre} {$grupo->jefeGrupo->apellido}" : null,
            'integrantes' => $grupo->usuarios->map(function ($usuario) {
                return [
                    'nombre' => $usuario->nombre,
                    'apellido' => $usuario->apellido,
                ];
            }),
        ];

        return response()->json($resultado);
    }
}
