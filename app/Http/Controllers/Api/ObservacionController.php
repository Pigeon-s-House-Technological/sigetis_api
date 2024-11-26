<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Observacion;
use App\Models\Elemento;
use App\Models\Grupo;
use App\Models\User;
use App\Notifications\ResultadoNotificacion;

class ObservacionController extends Controller
{
    public function index(){
        $obs = Observacion::all();
        if ($obs->isEmpty()) {
            $data = [
                'message' => 'No se encontraron observaciones',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($obs, 200);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),
        [
            'id_resultado' => 'required',
            'observacion' => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $obs = Observacion::create([
            'id_resultado' => $request->id_resultado,
            'observacion' => $request->observacion,
        ]);
        if (!$obs){
            $data = [
                'message' => 'error al crear el observacion',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'obs' => $obs,
            'status' => 201
        ];

        $id_grupo = $this->obtenerIdGrupo($request->id_resultado);
        \Log::info('ID GRUPO: ' . $id_grupo);
        $resultado = Elemento::find($request->id_resultado);
        $nombre_actividad = $resultado->actividad->nombre; // Asumiendo que tienes una relación con Actividad
        $nombreGrupo = $this->buscarNombreGrupo($id_grupo);
        $cadenaUsuarios = $this->cadenaUsuariosGrupo($id_grupo);



        $datos = [
            'nombre_actividad' => $nombre_actividad,
            'observacion' => $request->observacion,
            'grupo' => $nombreGrupo,
        ];

        User::whereIn('id', $cadenaUsuarios)->each(function($user) use ($resultado, $obs, $datos) {
            $user->notify(new ResultadoNotificacion($resultado, 'crear', $obs, $datos));
        });

        return response()->json($data, 201);
    }

    public function show($id){
        $obs = Observacion::find($id);
        if (!$obs){
            $data = [
                'message' => 'No se encontro el obs',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($obs, 200);
    }

    public function destroy($id){
        $obs = Observacion::find($id);
        if (!$obs){
            $data = [
                'message' => 'No se encontro el obs',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $obs->delete();
        $data = [
            'message' => 'Observacion eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $obs = Observacion::find($id);
        if (!$obs){
            $data = [
                'message' => 'No se encontro el obs',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $validator = Validator::make($request->all(),
        [
            'id_resultado' => '',
            'observacion' => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $id_grupo = $this->obtenerIdGrupo($obs->id_resultado);
        $resultado = Elemento::find($obs->id_resultado);
        $nombre_actividad = $resultado->actividad->nombre; // Asumiendo que tienes una relación con Actividad
        $nombreGrupo = $this->buscarNombreGrupo($id_grupo);
        $cadenaUsuarios = $this->cadenaUsuariosGrupo($id_grupo);



        $datos = [
            'nombre_actividad' => $nombre_actividad,
            'observacion' => $obs->observacion,
            'grupo' => $nombreGrupo,
        ];

        User::whereIn('id', $cadenaUsuarios)->each(function($user) use ($resultado, $obs, $datos) {
            $user->notify(new ResultadoNotificacion($resultado, 'editar', $obs, $datos));
        });

        if ($request->id_resultado){
            $obs->id_resultado = $request->id_resultado;
        }
        if ($request->observacion){
            $obs->observacion = $request->observacion;
        }

        $obs->save();
        $data = [
            'message' => 'Observacion actualizado',
            'obs' => $obs,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    private function buscarNombreUsuario($id)
    {
        $id = intval($id);
        $usuario = User::find($id);
        if (!$usuario) {
            return 'no se encontro nombre';
        }
        return $usuario->nombre;
    }

    private function buscarNombreGrupo($id)
    {
        $id = intval($id);
        $grupo = Grupo::find($id);
        if (!$grupo) {
            return 'no se encontro nombre';
        }
        return $grupo->nombre_grupo;
    }

    private function cadenaUsuariosGrupo($idGrupo)
    {
        $idGrupo = intval($idGrupo);
        $usuarios = User::whereHas('grupos', function($query) use ($idGrupo) {
            $query->where('id_grupo', $idGrupo);
        })->get();

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

    private function obtenerIdGrupo($idResultado)
    {
        // Obtener el resultado relacionado
        $resultado = Elemento::find($idResultado);
        if (!$resultado) {
            return null;
        }

        // Obtener la actividad relacionada
        $actividad = $resultado->actividad;
        if (!$actividad) {
            return null;
        }

        // Obtener la historia de usuario relacionada
        $historia_usuario = $actividad->historia_usuario;
        if (!$historia_usuario) {
            return null;
        }

        // Obtener el sprint relacionado
        $sprint = $historia_usuario->sprint;
        if (!$sprint) {
            return null;
        }

        // Obtener el grupo relacionado
        $grupo = $sprint->grupo;
        if (!$grupo) {
            return null;
        }

        return $grupo->id;
    }
}
