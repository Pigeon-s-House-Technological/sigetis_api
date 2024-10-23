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

        $res_comple2 = new Respuesta_complemento();
        $res_comple2->id_pregunta_complemento = 1;
        $res_comple2->respuesta_complemento = "Respuesta complemento 2";
        $res_comple2->id_grupo_evaluacion = 2;
        $res_comple2->save();

        $res_comple3 = new Respuesta_complemento();
        $res_comple3->id_pregunta_complemento = 1;
        $res_comple3->respuesta_complemento = "Respuesta complemento 3";
        $res_comple3->id_grupo_evaluacion = 3;
        $res_comple3->save();

        $res_comple4 = new Respuesta_complemento();
        $res_comple4->id_pregunta_complemento = 2;
        $res_comple4->respuesta_complemento = "Respuesta complemento 1";
        $res_comple4->id_grupo_evaluacion = 1;
        $res_comple4->save();

        $res_comple5 = new Respuesta_complemento();
        $res_comple5->id_pregunta_complemento = 2;
        $res_comple5->respuesta_complemento = "Respuesta complemento 2";
        $res_comple5->id_grupo_evaluacion = 2;
        $res_comple5->save();

        $res_comple6 = new Respuesta_complemento();
        $res_comple6->id_pregunta_complemento = 2;
        $res_comple6->respuesta_complemento = "Respuesta complemento 2";
        $res_comple6->id_grupo_evaluacion = 3;
        $res_comple6->save();

        $res_comple7 = new Respuesta_complemento();
        $res_comple7->id_pregunta_complemento = 3;
        $res_comple7->respuesta_complemento = "Respuesta complemento 1";
        $res_comple7->id_grupo_evaluacion = 1;
        $res_comple7->save();

        $res_comple8 = new Respuesta_complemento();
        $res_comple8->id_pregunta_complemento = 3;
        $res_comple8->respuesta_complemento = "Respuesta complemento 2";
        $res_comple8->id_grupo_evaluacion = 2;
        $res_comple8->save();
    }
}
