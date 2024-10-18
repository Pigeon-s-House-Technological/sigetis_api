<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Elemento;

class ElementoController extends Controller
{
    public function index(){
        $elemento = Elemento::all();
        if($elemento->isEmpty()){
            $data = [
                'message' => 'No hay elementos registrados',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        return response()->json($elemento, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_actividad' => 'required|exists:actividad,id',
            'nombre_elemento' => 'required|string|max:255',
            'descripcion_elemento' => 'nullable|string',
            'link_elemento' => 'nullable|url',
            'archivo_elemento' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $data = $request->all();

        if ($request->hasFile('archivo_elemento')) {
            $imageName = time().'.'.$request->archivo_elemento->extension();
            $request->archivo_elemento->move(public_path('images'), $imageName);
            $data['archivo_elemento'] = $imageName;
        }

        $elemento = Elemento::create($data);

        return response()->json($elemento, 201);
    }

    public function show($id){
        $elemento = Elemento::find($id);
        if(!$elemento){
            $data = [
                'message' => 'Elemento no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'elemento' => $elemento,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $elemento = Elemento::find($id);

        if(!$elemento){
            $data = [
                'message' => 'Elemento no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'id_actividad' => 'required|exists:actividad,id',
            'nombre_elemento' => 'required|string|max:255',
            'descripcion_elemento' => 'nullable|string',
            'link_elemento' => 'nullable|url',
            'archivo_elemento' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $data = $request->all();

        if ($request->hasFile('archivo_elemento')) {
            $imageName = time().'.'.$request->archivo_elemento->extension();
            $request->archivo_elemento->move(public_path('images'), $imageName);
            $data['archivo_elemento'] = $imageName;
        }

        $elemento->update($data);

        return response()->json($elemento);
    }

    

    public function destroy($id)
    {
        $elemento = Elemento::find($id);

        if(!$elemento){
            $data = [
                'message' => 'Elemento no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $elemento->delete();

        $data = [
            'message' => 'Actividad eliminado',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        $elemento = Elemento::find($id);
        if(!$elemento){
            $data = [
                'message' => 'Elemento no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'id_actividad' => '',
            'nombre_elemento' => '',
            'descripcion_elemento' => '',
            'link_elemento' => '',
            'archivo_elemento' => ''
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        
        if($request->hasFile('archivo_elemento')){
            $imageName = time().'.'.$request->archivo_elemento->extension();
            $request->archivo_elemento->move(public_path('images'), $imageName);
            $elemento->archivo_elemento = $imageName;
        }

        if($request->id_actividad){
            $elemento->id_actividad = $request->id_actividad;
        }

        if($request->nombre_elemento){
            $elemento->nombre_elemento = $request->nombre_elemento;
        }

        if($request->descripcion_elemento){
            $elemento->descripcion_elemento = $request->descripcion_elemento;
        }

        if($request->link_elemento){
            $elemento->link_elemento = $request->link_elemento;
        }


        $elemento->save();

        $data = [
            'message' => 'Elemento actualizado',
            'elemento' => $elemento,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
