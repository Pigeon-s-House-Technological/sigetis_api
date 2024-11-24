<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\AsignacionEvaluacion;
use App\Notifications\AsignacionNotificacion;
use App\Models\Grupo;
use App\Models\Evaluacion;


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

        $id_asignacion = 0;

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

            $asig = AsignacionEvaluacion::create([
                'id_evaluacion' => $id_evaluacion, 
                'id_grupo' => $id_grupo,
                'id_usuario' => $usuario->id,
                'estado_evaluacion' => false, 
                'id_usuario_aux' => $asignadoA->id
            ]);

            $id_asignacion = $asig->id;
        }

        $id_grupo = $id_grupo;
        $evaluacion = Evaluacion::find($id_evaluacion);
        $nombre_evaluacion = $evaluacion->nombre_evaluacion;
        $cadenaUsuarios = $this->cadenaUsuariosGrupo($id_grupo, true);
        $asignar = AsignacionEvaluacion::find($id_asignacion);
        

        $datos = [
            'nombre_evaluacion' => $nombre_evaluacion,
        ];

        User::whereIn('id', $cadenaUsuarios)->each(function($user) use ($asignar, $datos) {
            $user->notify(new AsignacionNotificacion($asignar, 'crear', $datos));
        });

        return response()->json($asignaciones);
    }

    private function cadenaUsuariosGrupo($idGrupo, $bandera)//bandera es false si no se quiere incluir a los estudiantes
    {   
        $idGrupo = intval($idGrupo);
        $usuarios = collect(); // Inicializar la colección de usuarios

        if ($bandera) {
            $usuarios = User::whereHas('grupos', function($query) use ($idGrupo) {
                $query->where('id_grupo', $idGrupo);
            })->get();
        }

        $grupo = Grupo::find($idGrupo);
        if ($grupo && $grupo->id_tutor) {
            $tutor = User::find($grupo->id_tutor);
            if ($tutor) {
                $usuarios->push($tutor);
            }
        }
        

        $cadenaUsuarios = $usuarios->pluck('id')->toArray();
        return $cadenaUsuarios;
    }
}
