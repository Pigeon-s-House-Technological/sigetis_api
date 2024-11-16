<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Opcion_pregunta_multiple;

class Opc_preg_multseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $opc_pre_mul = new Opcion_pregunta_multiple();
        $opc_pre_mul->id_pregunta_multiple = 1;
        $opc_pre_mul->opcion_pregunta = "opcion prehgunta multiple 1";
        $opc_pre_mul->save(); 

        $opc_pre_mul2 = new Opcion_pregunta_multiple();
        $opc_pre_mul2->id_pregunta_multiple = 1;
        $opc_pre_mul2->opcion_pregunta = "opcion prehgunta multiple 2";
        $opc_pre_mul2->save(); 

        $opc_pre_mul3 = new Opcion_pregunta_multiple();
        $opc_pre_mul3->id_pregunta_multiple = 1;
        $opc_pre_mul3->opcion_pregunta = "opcion prehgunta multiple 2";
        $opc_pre_mul3->save(); 

        $opc_pre_mul4 = new Opcion_pregunta_multiple();
        $opc_pre_mul4->id_pregunta_multiple = 2;
        $opc_pre_mul4->opcion_pregunta = "opcion prehgunta multiple 1";
        $opc_pre_mul4->save(); 

        $opc_pre_mul5 = new Opcion_pregunta_multiple();
        $opc_pre_mul5->id_pregunta_multiple = 2;
        $opc_pre_mul5->opcion_pregunta = "opcion prehgunta multiple 2";
        $opc_pre_mul5->save(); 

        $opc_pre_mul6 = new Opcion_pregunta_multiple();
        $opc_pre_mul6->id_pregunta_multiple = 2;
        $opc_pre_mul6->opcion_pregunta = "opcion prehgunta multiple 3";
        $opc_pre_mul6->save(); 

        $opc_pre_mul7 = new Opcion_pregunta_multiple();
        $opc_pre_mul7->id_pregunta_multiple = 3;
        $opc_pre_mul7->opcion_pregunta = "opcion prehgunta multiple 1";
        $opc_pre_mul7->save(); 

        $opc_pre_mul8 = new Opcion_pregunta_multiple();
        $opc_pre_mul8->id_pregunta_multiple = 3;
        $opc_pre_mul8->opcion_pregunta = "opcion prehgunta multiple 2";
        $opc_pre_mul8->save(); 

        $opc_pre_mul9 = new Opcion_pregunta_multiple();
        $opc_pre_mul9->id_pregunta_multiple = 3;
        $opc_pre_mul9->opcion_pregunta = "opcion prehgunta multiple 3";
        $opc_pre_mul9->save();
        
        $opc_pre_mul10 = new Opcion_pregunta_multiple();
        $opc_pre_mul10->id_pregunta_multiple = 4;
        $opc_pre_mul10->opcion_pregunta = "opcion prehgunta multiple 1";
        $opc_pre_mul10->save(); 

        $opc_pre_mul11 = new Opcion_pregunta_multiple();
        $opc_pre_mul11->id_pregunta_multiple = 4;
        $opc_pre_mul11->opcion_pregunta = "opcion prehgunta multiple 2";
        $opc_pre_mul11->save(); 

        $opc_pre_mul12 = new Opcion_pregunta_multiple();
        $opc_pre_mul12->id_pregunta_multiple = 4;
        $opc_pre_mul12->opcion_pregunta = "opcion prehgunta multiple 3";
        $opc_pre_mul12->save(); 

    }
}
