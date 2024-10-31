<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pregunta_complemento;
class Pregunta_complementoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pre_comp = new Pregunta_complemento();
        $pre_comp->id_criterio_evaluacion = 1;
        $pre_comp->pregunta_complemento = "Pregunta complemento 1";
        $pre_comp->save();

        $pre_comp2 = new Pregunta_complemento();
        $pre_comp2->id_criterio_evaluacion = 1;
        $pre_comp2->pregunta_complemento = "Pregunta complemento 2";
        $pre_comp2->save();

        $pre_comp3 = new Pregunta_complemento();
        $pre_comp3->id_criterio_evaluacion = 1;
        $pre_comp3->pregunta_complemento = "Pregunta complemento 3";
        $pre_comp3->save();

        $pre_comp4 = new Pregunta_complemento();
        $pre_comp4->id_criterio_evaluacion = 2;
        $pre_comp4->pregunta_complemento = "Pregunta complemento 1";
        $pre_comp4->save();

        $pre_comp5 = new Pregunta_complemento();
        $pre_comp5->id_criterio_evaluacion = 2;
        $pre_comp5->pregunta_complemento = "Pregunta complemento 2";
        $pre_comp5->save();

        $pre_comp6 = new Pregunta_complemento();
        $pre_comp6->id_criterio_evaluacion = 2;
        $pre_comp6->pregunta_complemento = "Pregunta complemento 3";
        $pre_comp6->save();

        $pre_comp7 = new Pregunta_complemento();
        $pre_comp7->id_criterio_evaluacion = 3;
        $pre_comp7->pregunta_complemento = "Pregunta complemento 1";
        $pre_comp7->save();

        $pre_comp8 = new Pregunta_complemento();
        $pre_comp8->id_criterio_evaluacion = 3;
        $pre_comp8->pregunta_complemento = "Pregunta complemento 2";
        $pre_comp8->save();

        $pre_comp9 = new Pregunta_complemento();
        $pre_comp9->id_criterio_evaluacion = 3;
        $pre_comp9->pregunta_complemento = "Pregunta complemento 3";
        $pre_comp9->save();

        $pre_comp10 = new Pregunta_complemento();
        $pre_comp10->id_criterio_evaluacion = 4;
        $pre_comp10->pregunta_complemento = "Pregunta complemento 1";
        $pre_comp10->save();
    }
}
