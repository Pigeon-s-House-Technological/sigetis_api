<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evaluacion;

class Evaluacionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $evaluacion = new Evaluacion();
        $evaluacion->nombre_evaluacion = "Evaluacion 1";
        $evaluacion->tipo_evaluacion = 1;
        $evaluacion->tipo_destinatario = true;
        $evaluacion->save();

        $evaluacion2 = new Evaluacion();
        $evaluacion2->nombre_evaluacion = "Evaluacion 2";
        $evaluacion2->tipo_evaluacion = 2;
        $evaluacion2->tipo_destinatario = false;
        $evaluacion2->save();

        $evaluacion3 = new Evaluacion();
        $evaluacion3->nombre_evaluacion = "Evaluacion 3";
        $evaluacion3->tipo_evaluacion = 3;
        $evaluacion3->tipo_destinatario = true;
        $evaluacion3->save();

        $evaluacion4 = new Evaluacion();
        $evaluacion4->nombre_evaluacion = "Evaluacion 4";
        $evaluacion4->tipo_evaluacion = 1;
        $evaluacion4->tipo_destinatario = false;
        $evaluacion4->save();

        $evaluacion5 = new Evaluacion();
        $evaluacion5->nombre_evaluacion = "Evaluacion 5";
        $evaluacion5->tipo_evaluacion = 2;
        $evaluacion5->tipo_destinatario = true;
        $evaluacion5->save();

        $evaluacion6 = new Evaluacion();
        $evaluacion6->nombre_evaluacion = "Evaluacion 6";
        $evaluacion6->tipo_evaluacion = 3;
        $evaluacion6->tipo_destinatario = false;
        $evaluacion6->save();

        $evaluacion7 = new Evaluacion();
        $evaluacion7->nombre_evaluacion = "Evaluacion 7";
        $evaluacion7->tipo_evaluacion = 1;
        $evaluacion7->tipo_destinatario = true;
        $evaluacion7->save();

        $evaluacion8 = new Evaluacion();
        $evaluacion8->nombre_evaluacion = "Evaluacion 8";
        $evaluacion8->tipo_evaluacion = 2;
        $evaluacion8->tipo_destinatario = false;
        $evaluacion8->save();

        $evaluacion9 = new Evaluacion();
        $evaluacion9->nombre_evaluacion = "Evaluacion 9";
        $evaluacion9->tipo_evaluacion = 3;
        $evaluacion9->tipo_destinatario = true;
        $evaluacion9->save();
    }
}
