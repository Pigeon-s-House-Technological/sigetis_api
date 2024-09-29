<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Sprint;

class SprintController extends Controller
{
    public function index(){
        $sprints = Sprint::all();
        if($sprints->isEmpty()){
            $data = [
                'message' => 'No hay sprints registrados',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        return response()->json($sprints, 200);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),
        [
            'id_grupo' => 'required',
            'numero_sprint' => 'required',
            'fecha_inicio' => 'nullable',
            'fecha_fin' => 'nullable'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $sprint = Sprint::create([
            'id_grupo' => $request->id_grupo,
            'numero_sprint' => $request->numero_sprint,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin
        ]);
        if (!$sprint){
            $data = [
                'message' => 'error al crear el sprint',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'sprint' => $sprint,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function show($id){
        $sprint = Sprint::find($id);
        if (!$sprint){
            $data = [
                'message' => 'No se encontro el sprint',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($sprint, 200);
    }

    public function destroy($id){
        $sprint = Sprint::find($id);
        if (!$sprint){
            $data = [
                'message' => 'No se encontro el sprint',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $sprint->delete();
        $data = [
            'message' => 'Sprint eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $sprint = Sprint::find($id);
        if (!$sprint){
            $data = [
                'message' => 'No se encontro el sprint',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $validator = Validator::make($request->all(),
        [
            'id_grupo' => 'required_without_all:numero_sprint,fecha_inicio,fecha_fin',
            'numero_sprint' => 'required_without_all:id_grupo,fecha_inicio,fecha_fin',
            'fecha_inicio' => 'nullable_without_all:id_grupo,numero_sprint,fecha_fin',
            'fecha_fin' => 'nullable_without_all:id_grupo,numero_sprint,fecha_inicio'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->id_grupo){
            $sprint->id_grupo = $request->id_grupo;
        }
        if ($request->numero_sprint){
            $sprint->numero_sprint = $request->numero_sprint;
        }
        if ($request->fecha_inicio){
            $sprint->fecha_inicio = $request->fecha_inicio;
        }
        if ($request->fecha_fin){
            $sprint->fecha_fin = $request->fecha_fin;
        }

        $sprint->save();
        $data = [
            'message' => 'Sprint actualizado',
            'sprint' => $sprint,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
