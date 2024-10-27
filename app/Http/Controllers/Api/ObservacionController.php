<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Observacion;
use App\Models\Elemento;

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
}
