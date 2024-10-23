<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Respuesta_opcion_multiple;

class Res_opc_multipleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $res_opc_mul = new Respuesta_opcion_multiple();
        $res_opc_mul->id_opcion_pregunta_multiple = 1;
        $res_opc_mul->estado_respuesta_opcion_multiple = true;
        $res_opc_mul->id_grupo_evaluacion = 1;
        $res_opc_mul->save();

        $res_opc_mul2 = new Respuesta_opcion_multiple();
        $res_opc_mul2->id_opcion_pregunta_multiple = 2;
        $res_opc_mul2->estado_respuesta_opcion_multiple = false;
        $res_opc_mul2->id_grupo_evaluacion = 1;
        $res_opc_mul2->save();

        $res_opc_mul3 = new Respuesta_opcion_multiple();
        $res_opc_mul3->id_opcion_pregunta_multiple = 3;
        $res_opc_mul3->estado_respuesta_opcion_multiple = true;
        $res_opc_mul3->id_grupo_evaluacion = 2;
        $res_opc_mul3->save();

        $res_opc_mul4 = new Respuesta_opcion_multiple();
        $res_opc_mul4->id_opcion_pregunta_multiple = 4;
        $res_opc_mul4->estado_respuesta_opcion_multiple = true;
        $res_opc_mul4->id_grupo_evaluacion = 1;
        $res_opc_mul4->save();

        $res_opc_mul5= new Respuesta_opcion_multiple();
        $res_opc_mul5->id_opcion_pregunta_multiple = 5;
        $res_opc_mul5->estado_respuesta_opcion_multiple = true;
        $res_opc_mul5->id_grupo_evaluacion = 2;
        $res_opc_mul5->save();

        $res_opc_mul6 = new Respuesta_opcion_multiple();
        $res_opc_mul6->id_opcion_pregunta_multiple = 6;
        $res_opc_mul6->estado_respuesta_opcion_multiple = true;
        $res_opc_mul6->id_grupo_evaluacion = 4;
        $res_opc_mul6->save();

        $res_opc_mul7 = new Respuesta_opcion_multiple();
        $res_opc_mul7->id_opcion_pregunta_multiple = 7;
        $res_opc_mul7->estado_respuesta_opcion_multiple = true;
        $res_opc_mul7->id_grupo_evaluacion = 5;
        $res_opc_mul7->save();

        $res_opc_mul8 = new Respuesta_opcion_multiple();
        $res_opc_mul8->id_opcion_pregunta_multiple = 8;
        $res_opc_mul8->estado_respuesta_opcion_multiple = false;
        $res_opc_mul8->id_grupo_evaluacion = 8;
        $res_opc_mul8->save();
    }
}
