<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AsignacionEvaluacion;

class AsignacionPorParesController extends Controller
{
    public function asignarUsuarios($id_grupo, $id_evaluacion)
    {
        // Obtén todos los usuarios asignados al grupo
        $usuarios = User::whereHas('grupos', function($query) use ($id_grupo) {
            $query->where('id_grupo', $id_grupo);
        })->get();

        $asignaciones = [];
        $totalUsuarios = $usuarios->count();

        if ($totalUsuarios < 2) {
            return response()->json(['error' => 'No hay suficientes usuarios en el grupo para asignar.'], 400);
        }

        // Realiza las asignaciones evitando repeticiones
        for ($i = 0; $i < $totalUsuarios; $i++) {
            $usuario = $usuarios[$i];
            // Asigna el usuario a otro usuario
            $asignadoA = $usuarios[($i + 1) % $totalUsuarios]; // Evita asignar a sí mismo
            $asignaciones[] = [
                'usuario_asignador' => $usuario->nombre,
                'usuario_asignado' => $asignadoA->nombre,
            ];

            AsignacionEvaluacion::create([
                'id_evaluacion' => $id_evaluacion, 
                'id_grupo' => $id_grupo,
                'id_usuario' => $usuario->id,
                'estado_evaluacion' => false, 
                'id_usuario_aux' => $asignadoA->id
            ]);
        }

        return response()->json($asignaciones);
    }
}
