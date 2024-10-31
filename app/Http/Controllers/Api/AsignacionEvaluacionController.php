<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\AsignacionEvaluacion;

class AsignacionEvaluacionController extends Controller
{
    public function index(){
        $asignar = AsignacionEvaluacion::all();
        if ($asignar->isEmpty()) {
            $data = [
                'message' => 'No se encontraron asignaciones',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($asignar, 200);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),
        [
            'id_evaluacion' => 'required',
            'id_grupo' => '',
            'id_usuario' => '',
            'estado_evaluacion' => 'required',
            'id_grupo_aux' => '',
            'id_usuario_aux' => ''
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $asignar = AsignacionEvaluacion::create([
            'id_evaluacion' => $request->id_evaluacion,
            'id_grupo' => $request->id_grupo,
            'id_usuario' => $request->id_usuario,
            'estado_evaluacion' => $request->estado_evaluacion,
            'id_grupo_aux' => $request->id_grupo_aux,
            'id_usuario_aux' => $request->id_usuario_aux
        ]);
        if (!$asignar){
            $data = [
                'message' => 'error al crear la asignacion',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'asignacion' => $asignar,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id){
        $asignar = AsignacionEvaluacion::find($id);
        if (!$asignar){
            $data = [
                'message' => 'No se encontro la asignar',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($asignar, 200);
    }

    public function destroy($id){
        $asignar = AsignacionEvaluacion::find($id);
        if (!$asignar){
            $data = [
                'message' => 'No se encontro el asignar',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $asignar->delete();
        $data = [
            'message' => 'AsignacionEvaluacion eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $asignar = AsignacionEvaluacion::find($id);
        if (!$asignar){
            $data = [
                'message' => 'No se encontro el asignar',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $validator = Validator::make($request->all(),
        [
            'id_evaluacion' => '',
            'id_grupo' => '',
            'id_usuario' => '',
            'estado_evaluacion' => '',
            'id_grupo_aux' => '',
            'id_usuario_aux' => ''
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->id_evaluacion != null) {
            $asignar->id_evaluacion = $request->id_evaluacion;
        }
        if ($request->id_grupo != null) {
            $asignar->id_grupo = $request->id_grupo;
        }
        if ($request->id_usuario != null) {
            $asignar->id_usuario = $request->id_usuario;
        }
        if ($request->estado_evaluacion != null) {
            $asignar->estado_evaluacion = $request->estado_evaluacion;
        }
        if ($request->id_grupo_aux != null) {
            $asignar->id_grupo_aux = $request->id_grupo_aux;
        }
        if ($request->id_usuario_aux != null) {
            $asignar->id_usuario_aux = $request->id_usuario_aux;
        }

        $asignar->save();
        $data = [
            'message' => 'AsignacionEvaluacion actualizado',
            'asignar' => $asignar,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function mostrarDatos($idGrupo){
        $asignar = AsignacionEvaluacion::where('id_grupo', $idGrupo)->get();
        if ($asignar->isEmpty()) {
            $data = [
                'message' => 'No se encontraron asignaciones',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        

        $asignacionesConDatos = $asignar->map(function($asignacion) {
            $destinatario = "Individual";
            if($asignacion->evaluacion->tipo_destinatario == true){
                $destinatario = "Grupal";
            }

            $tipo = "Autoevaluación";
            if($asignacion->evaluacion->tipo_evaluacion == 2){
                $tipo = "Evaluación cruzada";
            }else if($asignacion->evaluacion->tipo_evaluacion == 3){
                $tipo = "Evaluación por pares";
            }

            $nombreEstudiante = $asignacion->usuario ? $asignacion->usuario->nombre : 'N/A';
            $nombreGrupo = $asignacion->grupo ? $asignacion->grupo->nombre_grupo : 'N/A';
            $nombreEstudianteAux = $asignacion->usuarioAux ? $asignacion->usuarioAux->nombre : 'N/A';
            $nombreGrupoAux = $asignacion->grupoAux ? $asignacion->grupoAux->nombre_grupo : 'N/A';
            $estado = $asignacion->estado_evaluacion == true ? 'Realizada' : 'Pendiente';

            return [
                'id' => $asignacion->id,
                'id_evaluacion' => $asignacion->id_evaluacion,
                'estado_evaluacion' => $estado,
                'nombre_evaluacion' => $asignacion->evaluacion->nombre_evaluacion,
                'nombre_estudiante' => $nombreEstudiante,
                'nombre_grupo' => $nombreGrupo,
                'nombre_estudiante_aux' => $nombreEstudianteAux,
                'nombre_grupo_aux' => $nombreGrupoAux,
                'tipo_evaluacion' => $tipo,
                'tipo_destinatario' => $destinatario,
            ];
        });
    
        $data = [
            'message' => 'Asignaciones encontradas',
            'asignaciones' => $asignacionesConDatos,
            'status' => 200
        ];
        return response()->json($data, 200);
        
    }
}
