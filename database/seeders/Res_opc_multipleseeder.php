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

            }
}
