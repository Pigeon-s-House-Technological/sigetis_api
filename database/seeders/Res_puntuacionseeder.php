<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Respuesta_puntuacion;

class Res_puntuacionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $res_punt = new Respuesta_puntuacion();
        $res_punt->id_pregunta_puntuacion = 1;
        $res_punt->respuesta_puntuacion = 1;
        $res_punt->id_grupo_evaluacion = 1;
        $res_punt->save();

        $res_punt2 = new Respuesta_puntuacion();
        $res_punt2->id_pregunta_puntuacion = 2;
        $res_punt2->respuesta_puntuacion = 2;
        $res_punt2->id_grupo_evaluacion = 2;
        $res_punt2->save();

        $res_punt3 = new Respuesta_puntuacion();
        $res_punt3->id_pregunta_puntuacion = 3;
        $res_punt3->respuesta_puntuacion = 3;
        $res_punt3->id_grupo_evaluacion = 3;
        $res_punt3->save();

        $res_punt4 = new Respuesta_puntuacion();
        $res_punt4->id_pregunta_puntuacion = 4;
        $res_punt4->respuesta_puntuacion = 4;
        $res_punt4->id_grupo_evaluacion = 4;
        $res_punt4->save();

        $res_punt5 = new Respuesta_puntuacion();
        $res_punt5->id_pregunta_puntuacion = 5;
        $res_punt5->respuesta_puntuacion = 5;
        $res_punt5->id_grupo_evaluacion = 5;
        $res_punt5->save();

        $res_punt6 = new Respuesta_puntuacion();
        $res_punt6->id_pregunta_puntuacion = 6;
        $res_punt6->respuesta_puntuacion = 6;
        $res_punt6->id_grupo_evaluacion = 6;
        $res_punt6->save();

        $res_punt7 = new Respuesta_puntuacion();
        $res_punt7->id_pregunta_puntuacion = 7;
        $res_punt7->respuesta_puntuacion = 7;
        $res_punt7->id_grupo_evaluacion = 7;
        $res_punt7->save();
    }
}
