<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Historia_usuario;
use App\Models\Sprint;
use App\Models\Actividad;
use App\Models\User;


class Datos_actividadesController extends Controller
{
    /*
    Opción 1
    public function obtenerDatosPorGrupo($id_grupo)
    {
        $sprints = Sprint::where('id_grupo', $id_grupo)->get();

        
        $resultados = [];

        foreach ($sprints as $sprint) {
            
            $historias = Historia_usuario::where('id_sprint', $sprint->id_sprint)->get();

            
            $historiasDetalles = [];
            foreach ($historias as $historia) {
                $actividades = Actividades::where('id_HU', $historia->id_HU)->get();

                
                $historiasDetalles[] = [
                    'id_hu' => $historia->id_HU,
                    'titulo_hu' => $historia->titulo_hu,
                    'actividades' => $actividades->map(function ($actividad) {
                        return [
                            'actividad' => $actividad->actividad,
                            'encargado' => $actividad->encargado,
                            'estado_actividad' => $actividad->estado_actividad,
                        ];
                    }),
                ];
            }

            
            $resultados[] = [
                'id_sprint' => $sprint->id_sprint,
                'numero_sprint' => $sprint->numero_sprint,
                'historias_usuarios' => $historiasDetalles,
            ];
        }

        
        return response()->json($resultados);
    }*/
    public function obtenerDatosPorGrupo($id_grupo)
    {
        // Obtener los sprints del grupo
        $sprints = Sprint::where('id_grupo', $id_grupo)->get();

        if ($sprints->isEmpty()) {
            return response()->json(['error' => 'No se encontraron sprints para este grupo.']);
        }

       $resultados = [];

        foreach ($sprints as $sprint) {
            // Verificar que los sprints tienen datos correctos
            $historias = Historia_usuario::where('id_sprint', $sprint->id)->get();

            $historiasDetalles = [];
            if ($historias->isNotEmpty()) {
                foreach ($historias as $historia) {
                    $actividades = Actividad::where('id_hu', $historia->id)->get();

                    // Verificar que las actividades existen
                    if ($actividades->isNotEmpty()) {
                        
                        $historiasDetalles[] = [
                           'id_hu' => $historia->id,
                           'titulo_hu' => $historia->titulo_hu,
                           'actividades' => $actividades->map(function ($actividad) {
                                $usuario = User::find($actividad->encargado);
                                $nombreUsuario = $usuario ? $usuario->nombre : 'Sin asignar';
                                return [
                                    'id'=> $actividad->id,
                                    'actividad' => $actividad->nombre_actividad,
                                    'encargado' => $nombreUsuario,
                                    'estado_actividad' => $actividad ? $actividad->estado_actividad : 'Sin asignar',
                                    'fecha_inicio' => $actividad->fecha_inicio,
                                    'fecha_fin' => $actividad->fecha_fin,
                                ];
                            }),
                       ];
                    }
                }
            }   

            $resultados[] = [
                'id_sprint' => $sprint->id,
                'numero_sprint' => $sprint->numero_sprint,
                'historias_usuarios' => $historiasDetalles,
            ];
        }

       return response()->json($resultados);
    }

}
