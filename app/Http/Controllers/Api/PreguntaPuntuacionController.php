<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Pregunta_puntuacion;

class PreguntaPuntuacionController extends Controller
{
    public function index(){
        $preguntasPuntuacion = Pregunta_puntuacion::all();
        if($preguntasPuntuacion->isEmpty()){
            $data = [
                'message' => 'No hay preguntas de puntuación registradas',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        return response()->json($preguntasPuntuacion, 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id_criterio_evaluacion' => 'required',
            'puntuacion' => 'required',
            'pregunta_puntuacion' => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $preguntaPuntuacion = Pregunta_puntuacion::create([
            'id_criterio_evaluacion' => $request->id_criterio_evaluacion,
            'puntuacion' => $request->puntuacion,
            'pregunta_puntuacion' => $request->pregunta_puntuacion,
        ]);

        if(!$preguntaPuntuacion){
            $data = [
                'message' => 'Error al crear la pregunta de puntuación',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => $preguntaPuntuacion,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($criterioId)
{
    // Buscar preguntas de puntuación asociadas al criterio
    $preguntasPuntuacion = Pregunta_puntuacion::where('id_criterio_evaluacion', $criterioId)->get();

    if ($preguntasPuntuacion->isEmpty()) {
        return response()->json([
            'message' => 'No hay preguntas de puntuación registradas para este criterio.',
            'status' => 404
        ], 404);
    }

    return response()->json($preguntasPuntuacion, 200);
}

    public function updatePartial(Request $request, $id){
        $preguntaPuntuacion = Pregunta_puntuacion::find($id);
            if (!$preguntaPuntuacion) {
                return response()->json([
                    'message' => 'Pregunta de puntuación no encontrada',
                    'status' => 404
                ], 404);
            }

        // Validar los datos de entrada
        $validatedData = $request->validate([
            'id_criterio_evaluacion' => 'nullable|integer',
            'puntuacion' => 'nullable|integer',
            'pregunta_puntuacion' => 'nullable|string'
        ]);

        // Actualizar los campos si están presentes en la solicitud
        if (isset($validatedData['id_criterio_evaluacion'])) {
            $preguntaPuntuacion->id_criterio_evaluacion = $validatedData['id_criterio_evaluacion'];
        }

        if (isset($validatedData['puntuacion'])) {
            $preguntaPuntuacion->puntuacion = $validatedData['puntuacion'];
        }

        if (isset($validatedData['pregunta_puntuacion'])) {
            $preguntaPuntuacion->pregunta_puntuacion = $validatedData['pregunta_puntuacion'];
        }

        // Guardar los cambios
        if (!$preguntaPuntuacion->save()) {
            return response()->json([
                'message' => 'Error al actualizar la pregunta de puntuación',
                'status' => 500
            ], 500);
        }

        return response()->json([
            'message' => 'Pregunta de puntuación actualizada correctamente',
            'data' => $preguntaPuntuacion,
            'status' => 200
        ], 200);
    }

    public function destroy($id){
        $preguntaPuntuacion = Pregunta_puntuacion::find($id);
        if(!$preguntaPuntuacion){
            $data = [
                'message' => 'Pregunta de puntuación no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $preguntaPuntuacion->delete();
        $data = [
            'message' => 'Pregunta de puntuación eliminada',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
