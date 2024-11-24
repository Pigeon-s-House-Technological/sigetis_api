<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Actividad;
use App\Models\User;
use App\Notifications\TareaNotification;
use App\Models\Grupo;

class ActividadController extends Controller
{
    
    public function index(){
        $actividad = Actividad::all();
        if ($actividad->isEmpty()) {
            $data = [
                'message' => 'No se encontraron Actividades',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        
        return response()->json($actividad, 200);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),
        [
            'id_hu' => 'required',
            'nombre_actividad' => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $nombreUsuario = $this->buscarNombreUsuario($request->creador);
        $nombreGrupo = $this->buscarNombreGrupo($request->grupo);
        $cadenaUsuarios = $this->cadenaUsuariosGrupo($request->grupo, 0);

        $actividad = Actividad::create([
            'id_hu' => $request->id_hu,
            'nombre_actividad' => $request->nombre_actividad,
            'estado_actividad' => $request->estado_actividad,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'encargado' => $request-> encargado,
            'grupo' => $nombreGrupo,
            'creador' => $nombreUsuario,
        ]);
        if (!$actividad){
            $data = [
                'message' => 'error al crear la actividad',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'actividad' => $actividad,
            'status' => 201
        ];

        User::whereIn('id', $cadenaUsuarios)->each(function($user) use ($actividad) {
            $user->notify(new TareaNotification($actividad, 'crear'));
        });

        return response()->json($data, 201);
    }

    public function show($id){
        $actividad = Actividad::find($id);
        if (!$actividad){
            $data = [
                'message' => 'Actividad no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($actividad, 200);
    }

    public function update(Request $request, $id){
        $actividad = Actividad::find($id);
        if (!$actividad){
            $data = [
                'message' => 'Actividad no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $actividad->update($request->all());
        $data = [
            'actividad' => $actividad,
            'status' => 200
        ];

        $cadenaUsuarios = $this->cadenaUsuariosGrupo($actividad->grupo, 0);

        User::whereIn('id', $cadenaUsuarios)->each(function($user) use ($actividad) {
            $user->notify(new TareaNotification($actividad, 'actualizar'));
        });


        return response()->json($data, 200);
    }

    public function destroy($id){
        $actividad = Actividad::find($id);
        if (!$actividad){
            $data = [
                'message' => 'Actividad no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $data = [
            'message' => 'Actividad eliminada',
            'status' => 200
        ];
        
        $grupo = Grupo::where('nombre_grupo', $actividad->grupo)->first();
        if (!$grupo) {
            return response()->json([
                'message' => 'Grupo no encontrado',
                'status' => 404
            ], 404);
        }
        
        $cadenaUsuarios = $this->cadenaUsuariosGrupo($grupo->id, 0);
        
        User::whereIn('id', $cadenaUsuarios)->each(function($user) use ($actividad) {
            $user->notify(new TareaNotification($actividad, 'eliminar'));
        });

        $actividad->delete();
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $actividad = Actividad::find($id);
        if(!$actividad){
            $data = [
                'message' => 'actividad no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(), [
            'id_hu' => 'required_without_all:nombre_actividad,estado_actividad,fecha_inicio,fecha_fin,encargado',
            'nombre_actividad' => 'required_without_all:estado_actividad,fecha_inicio,fecha_fin,encargado,id_hu',
            'estado_actividad' => 'required_without_all:fecha_inicio,fecha_fin,encargado,id_hu,nombre_actividad',
            'fecha_inicio' => 'required_without_all:fecha_fin,encargado,id_hu,estado_actividad,nombre_actividad',
            'fecha_fin' => 'required_without_all:encargado,id_hu,fecha_inicio,estado_actividad,nombre_actividad',
            'encargado' => 'required_without_all:fecha_fin,id_hu,fecha_inicio,estado_actividad,nombre_actividad'
        ]);
        

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if($request->has('id_hu')){
            $actividad->id_hu = $request->id_hu;
        }

        if($request->has('nombre_actividad')){
            $actividad->nombre_actividad = $request->nombre_actividad;
        }

        if($request->has('estado_actividad')){
            $actividad->estado_actividad = $request->estado_actividad;
        }

        if($request->has('fecha_inicio')){
            $actividad->fecha_inicio = $request->fecha_inicio;
        }

        if($request->has('fecha_fin')){
            $actividad->fecha_fin = $request->fecha_fin;
        }

        if($request->has('encargado')){
            $actividad->encargado = $request->encargado;
        }
        
        

        $data = [
            'message' => 'Actividad actualizada',
            'actividad' => $actividad,
            'status' => 200
        ];
        
        $grupo = Grupo::where('nombre_grupo', $actividad->grupo)->first();
        if (!$grupo) {
            return response()->json([
                'message' => 'Grupo no encontrado',
                'status' => 404
            ], 404);
        }
        
        $cadenaUsuarios = $this->cadenaUsuariosGrupo($grupo->id, 0);
        
        User::whereIn('id', $cadenaUsuarios)->each(function($user) use ($actividad) {
            $user->notify(new TareaNotification($actividad, 'editar'));
        });

        $actividad->save();
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

    private function cadenaUsuariosGrupo($idGrupo, $idTutor)
    {
        $idGrupo = intval($idGrupo);
        $idTutor = intval($idTutor);
        $usuarios = User::whereHas('grupos', function($query) use ($idGrupo) {
            $query->where('id_grupo', $idGrupo);
        })->get();

        if ($idTutor != 0) {
            $usuarios->push(User::find($idTutor));
        }

        $cadenaUsuarios = $usuarios->pluck('id')->toArray();
        return $cadenaUsuarios;
    }
}
