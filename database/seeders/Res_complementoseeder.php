<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Respuesta_complemento; 

class Res_complementoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $res_comple = new Respuesta_complemento();
        $res_comple->id_pregunta_complemento = 1;
        $res_comple->respuesta_complemento = "Respuesta complemento 1";
        $res_comple->id_grupo_evaluacion = 1;
        $res_comple->save();

    }
}
