<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AsignacionEvaluacion;

class Grupo_evaluacionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asignar = new AsignacionEvaluacion();
        $asignar->id_evaluacion = 1;
        $asignar->id_grupo = 1;
        $asignar->id_usuario = 1;
        $asignar->estado_evaluacion = true;
        $asignar->id_grupo_aux = 1;
        $asignar->id_usuario_aux = 1;
        $asignar->save();

        $asignar2 = new AsignacionEvaluacion();
        $asignar2->id_evaluacion = 1;
        $asignar2->id_grupo = 1;
        $asignar2->id_usuario = 2;
        $asignar2->estado_evaluacion = false;
        $asignar2->id_grupo_aux = 1;
        $asignar2->id_usuario_aux = 2;
        $asignar2->save();

        $asignar3 = new AsignacionEvaluacion();
        $asignar3->id_evaluacion = 2;
        $asignar3->id_grupo = 2;
        $asignar3->id_usuario = 6;
        $asignar3->estado_evaluacion = true;
        $asignar3->id_grupo_aux = 2;
        $asignar3->id_usuario_aux = 6;
        $asignar3->save();

        $asignar4 = new AsignacionEvaluacion();
        $asignar4->id_evaluacion = 1;
        $asignar4->id_grupo = 1;
        $asignar4->id_usuario = 3;
        $asignar4->estado_evaluacion = false;
        $asignar4->id_grupo_aux = 1;
        $asignar4->id_usuario_aux = 3;
        $asignar4->save();

        $asignar5 = new AsignacionEvaluacion();
        $asignar5->id_evaluacion = 2;
        $asignar5->id_grupo = 2;
        $asignar5->id_usuario = 7;
        $asignar5->estado_evaluacion = true;
        $asignar5->id_grupo_aux = 2;
        $asignar5->id_usuario_aux = 7;
        $asignar5->save();

        $asignar6 = new AsignacionEvaluacion();
        $asignar6->id_evaluacion = 3;
        $asignar6->id_grupo = 3;
        $asignar6->id_usuario = 11;
        $asignar6->estado_evaluacion = true;
        $asignar6->id_grupo_aux = 3;
        $asignar6->id_usuario_aux = 11;
        $asignar6->save();

        $asignar7 = new AsignacionEvaluacion();
        $asignar7->id_evaluacion = 3;
        $asignar7->id_grupo = 3;
        $asignar7->id_usuario = 12;
        $asignar7->estado_evaluacion = false;
        $asignar7->id_grupo_aux = 3;
        $asignar7->id_usuario_aux = 12;
        $asignar7->save();

        $asignar8 = new AsignacionEvaluacion();
        $asignar8->id_evaluacion = 3;
        $asignar8->id_grupo = 3;
        $asignar8->id_usuario = 13;
        $asignar8->estado_evaluacion = true;
        $asignar8->id_grupo_aux = 3;
        $asignar8->id_usuario_aux = 13;
        $asignar8->save();
    }
}
