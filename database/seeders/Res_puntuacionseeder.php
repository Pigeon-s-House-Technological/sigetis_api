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

       
    }
}
