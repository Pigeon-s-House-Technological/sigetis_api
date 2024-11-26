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
        $asignar->id_usuario = 2;
        $asignar->estado_evaluacion = true;
        $asignar->id_grupo_aux = 1;
        $asignar->id_usuario_aux = 1;
        $asignar->save();

    }
}
