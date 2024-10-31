<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pregunta_puntuacion;
class Pregunta_puntuacionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pre_pun = new Pregunta_puntuacion();
        $pre_pun->id_criterio_evaluacion = 1;
        $pre_pun->puntuacion = 3;
        $pre_pun->pregunta_puntuacion = "Pregunta puntuacion 1";
        $pre_pun->save();

        $pre_pun2 = new Pregunta_puntuacion();
        $pre_pun2->id_criterio_evaluacion = 1;
        $pre_pun2->puntuacion = 2;
        $pre_pun2->pregunta_puntuacion = "Pregunta puntuacion 2";
        $pre_pun2->save();

        $pre_pun3 = new Pregunta_puntuacion();
        $pre_pun3->id_criterio_evaluacion = 1;
        $pre_pun3->puntuacion = 1;
        $pre_pun3->pregunta_puntuacion = "Pregunta puntuacion 3";
        $pre_pun3->save();

        $pre_pun4 = new Pregunta_puntuacion();
        $pre_pun4->id_criterio_evaluacion = 2;
        $pre_pun4->puntuacion = 3;
        $pre_pun4->pregunta_puntuacion = "Pregunta puntuacion 1";
        $pre_pun4->save();

        $pre_pun5 = new Pregunta_puntuacion();
        $pre_pun5->id_criterio_evaluacion = 2;
        $pre_pun5->puntuacion = 2;
        $pre_pun5->pregunta_puntuacion = "Pregunta puntuacion 2";
        $pre_pun5->save();

        $pre_pun6 = new Pregunta_puntuacion();
        $pre_pun6->id_criterio_evaluacion = 2;
        $pre_pun6->puntuacion = 1;
        $pre_pun6->pregunta_puntuacion = "Pregunta puntuacion 3";
        $pre_pun6->save();

        $pre_pun7 = new Pregunta_puntuacion();
        $pre_pun7->id_criterio_evaluacion = 3;
        $pre_pun7->puntuacion = 3;
        $pre_pun7->pregunta_puntuacion = "Pregunta puntuacion 1";
        $pre_pun7->save();

        $pre_pun8 = new Pregunta_puntuacion();
        $pre_pun8->id_criterio_evaluacion = 3;
        $pre_pun8->puntuacion = 2;
        $pre_pun8->pregunta_puntuacion = "Pregunta puntuacion 2";
        $pre_pun8->save();

        $pre_pun9 = new Pregunta_puntuacion();
        $pre_pun9->id_criterio_evaluacion = 3;
        $pre_pun9->puntuacion = 1;
        $pre_pun9->pregunta_puntuacion = "Pregunta puntuacion 3";
        $pre_pun9->save();

        $pre_pun10 = new Pregunta_puntuacion();
        $pre_pun10->id_criterio_evaluacion = 4;
        $pre_pun10->puntuacion = 3;
        $pre_pun10->pregunta_puntuacion = "Pregunta puntuacion 1";
        $pre_pun10->save();

        $pre_pun11 = new Pregunta_puntuacion();
        $pre_pun11->id_criterio_evaluacion = 4;
        $pre_pun11->puntuacion = 2;
        $pre_pun11->pregunta_puntuacion = "Pregunta puntuacion 2";
        $pre_pun11->save();

        $pre_pun12 = new Pregunta_puntuacion();
        $pre_pun12->id_criterio_evaluacion = 4;
        $pre_pun12->puntuacion = 1;
        $pre_pun12->pregunta_puntuacion = "Pregunta puntuacion 3";
        $pre_pun12->save();

        $pre_pun13 = new Pregunta_puntuacion();
        $pre_pun13->id_criterio_evaluacion = 5;
        $pre_pun13->puntuacion = 3;
        $pre_pun13->pregunta_puntuacion = "Pregunta puntuacion 1";
        $pre_pun13->save();

        $pre_pun14 = new Pregunta_puntuacion();
        $pre_pun14->id_criterio_evaluacion = 5;
        $pre_pun14->puntuacion = 2;
        $pre_pun14->pregunta_puntuacion = "Pregunta puntuacion 2";
        $pre_pun14->save();
    }
}
