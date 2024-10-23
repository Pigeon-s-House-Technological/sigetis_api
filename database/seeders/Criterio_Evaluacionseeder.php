<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criterio_evaluacion;

class Criterio_Evaluacionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criterio = new Criterio_evaluacion();
        $criterio->id_evaluacion = 1;
        $criterio->titulo_criterio = "Responsabilidad";
        $criterio->save();

        $criterio2 = new Criterio_evaluacion();
        $criterio2->id_evaluacion = 1;
        $criterio2->titulo_criterio = "Puntualidad";
        $criterio2->save();

        $criterio3 = new Criterio_evaluacion();
        $criterio3->id_evaluacion = 1;
        $criterio3->titulo_criterio = "Respeto";
        $criterio3->save();

        $criterio4 = new Criterio_evaluacion();
        $criterio4->id_evaluacion = 1;
        $criterio4->titulo_criterio = "Equidad";
        $criterio4->save();

        $criterio5 = new Criterio_evaluacion();
        $criterio5->id_evaluacion = 1;
        $criterio5->titulo_criterio = "Compañerismo";
        $criterio5->save();

        $criterio6 = new Criterio_evaluacion();
        $criterio6->id_evaluacion = 2;
        $criterio6->titulo_criterio = "Responsabilidad";
        $criterio6->save();

        $criterio7 = new Criterio_evaluacion();
        $criterio7->id_evaluacion = 2;
        $criterio7->titulo_criterio = "Puntualidad";
        $criterio7->save();

        $criterio7 = new Criterio_evaluacion();
        $criterio7->id_evaluacion = 1;
        $criterio7->titulo_criterio = "Compromiso";
        $criterio7->save();

        $criterio8 = new Criterio_evaluacion();
        $criterio8->id_evaluacion = 1;
        $criterio8->titulo_criterio = "Respeto";
        $criterio8->save();


    }
}
