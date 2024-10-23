<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pregunta_opcion_multiple;

class Pregunta_opción_multipleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pre_opc_mult = new Pregunta_opcion_multiple();
        $pre_opc_mult->pregunta_opcion_multiple = "Pregunta opcion multiple 1";
        $pre_opc_mult->tipo_opcion_multiple = 0;
        $pre_opc_mult->id_criterio_evaluacion = 1;
        $pre_opc_mult->save();

        $pre_opc_mult2 = new Pregunta_opcion_multiple();
        $pre_opc_mult2->pregunta_opcion_multiple = "Pregunta opcion multiple 2";
        $pre_opc_mult2->tipo_opcion_multiple = 1;
        $pre_opc_mult2->id_criterio_evaluacion = 1;
        $pre_opc_mult2->save();

        $pre_opc_mult3 = new Pregunta_opcion_multiple();
        $pre_opc_mult3->pregunta_opcion_multiple = "Pregunta opcion multiple 3";
        $pre_opc_mult3->tipo_opcion_multiple = 0;
        $pre_opc_mult3->id_criterio_evaluacion = 1;
        $pre_opc_mult3->save();

        $pre_opc_mult4 = new Pregunta_opcion_multiple();
        $pre_opc_mult4->pregunta_opcion_multiple = "Pregunta opcion multiple 1";
        $pre_opc_mult4->tipo_opcion_multiple = 1;
        $pre_opc_mult4->id_criterio_evaluacion = 2;
        $pre_opc_mult4->save();

        $pre_opc_mult5 = new Pregunta_opcion_multiple();
        $pre_opc_mult5->pregunta_opcion_multiple = "Pregunta opcion multiple 2";
        $pre_opc_mult5->tipo_opcion_multiple = 0;
        $pre_opc_mult5->id_criterio_evaluacion = 2;
        $pre_opc_mult5->save();

        $pre_opc_mult6 = new Pregunta_opcion_multiple();
        $pre_opc_mult6->pregunta_opcion_multiple = "Pregunta opcion multiple 3";
        $pre_opc_mult6->tipo_opcion_multiple = 1;
        $pre_opc_mult6->id_criterio_evaluacion = 2;
        $pre_opc_mult6->save();

        $pre_opc_mult7 = new Pregunta_opcion_multiple();
        $pre_opc_mult7->pregunta_opcion_multiple = "Pregunta opcion multiple 1";
        $pre_opc_mult7->tipo_opcion_multiple = 0;
        $pre_opc_mult7->id_criterio_evaluacion = 3;
        $pre_opc_mult7->save();
        
        $pre_opc_mult8 = new Pregunta_opcion_multiple();
        $pre_opc_mult8->pregunta_opcion_multiple = "Pregunta opcion multiple 2";
        $pre_opc_mult8->tipo_opcion_multiple = 1;
        $pre_opc_mult8->id_criterio_evaluacion = 3;
        $pre_opc_mult8->save();

        $pre_opc_mult9 = new Pregunta_opcion_multiple();
        $pre_opc_mult9->pregunta_opcion_multiple = "Pregunta opcion multiple 3";
        $pre_opc_mult9->tipo_opcion_multiple = 0;
        $pre_opc_mult9->id_criterio_evaluacion = 3;
        $pre_opc_mult9->save();

        $pre_opc_mult10 = new Pregunta_opcion_multiple();
        $pre_opc_mult10->pregunta_opcion_multiple = "Pregunta opcion multiple 1";
        $pre_opc_mult10->tipo_opcion_multiple = 1;
        $pre_opc_mult10->id_criterio_evaluacion = 4;
        $pre_opc_mult10->save();

        $pre_opc_mult11 = new Pregunta_opcion_multiple();
        $pre_opc_mult11->pregunta_opcion_multiple = "Pregunta opcion multiple 2";
        $pre_opc_mult11->tipo_opcion_multiple = 0;
        $pre_opc_mult11->id_criterio_evaluacion = 4;
        $pre_opc_mult11->save();

        $pre_opc_mult12 = new Pregunta_opcion_multiple();
        $pre_opc_mult12->pregunta_opcion_multiple = "Pregunta opcion multiple 3";
        $pre_opc_mult12->tipo_opcion_multiple = 1;
        $pre_opc_mult12->id_criterio_evaluacion = 4;
        $pre_opc_mult12->save();

    }
}
