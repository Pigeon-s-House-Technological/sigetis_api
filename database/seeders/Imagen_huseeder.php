<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Imagen_hu;

class Imagen_huseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imagen = new Imagen_hu();
        $imagen->id_hu = 1;
        $imagen->nombre_imagen = "imagen hu 1";
        $imagen->save();

        $imagen2 = new Imagen_hu();
        $imagen2->id_hu = 2;
        $imagen2->nombre_imagen = "imagen hu 1";
        $imagen2->save();

        $imagen3 = new Imagen_hu();
        $imagen3->id_hu = 2;
        $imagen3->nombre_imagen = "imagen hu 2";
        $imagen3->save();

        $imagen4 = new Imagen_hu();
        $imagen4->id_hu = 3;
        $imagen4->nombre_imagen = "imagen hu 1";
        $imagen4->save();

        $imagen5 = new Imagen_hu();
        $imagen5->id_hu = 4;
        $imagen5->nombre_imagen = "imagen hu 1";
        $imagen5->save();

        $imagen6 = new Imagen_hu();
        $imagen6->id_hu = 5;
        $imagen6->nombre_imagen = "imagen hu 1";
        $imagen6->save();

        $imagen7 = new Imagen_hu();
        $imagen7->id_hu = 6;
        $imagen7->nombre_imagen = "imagen hu 1";
        $imagen7->save();

        $imagen8 = new Imagen_hu();
        $imagen8->id_hu = 7;
        $imagen8->nombre_imagen = "imagen hu 1";
        $imagen8->save();

        $imagen9 = new Imagen_hu();
        $imagen9->id_hu = 8;
        $imagen9->nombre_imagen = "imagen hu 1";
        $imagen9->save();
    }
}
