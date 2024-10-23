<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Elemento;

class Elementoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $elemento = new Elemento();
        $elemento->id_actividad  = 1;
        $elemento->nombre_elemento = "Elemento 1";
        $elemento->descripcion_elemento = "Descripcion del elemento 1";
        $elemento->link_elemento = "link del elemento 1";
        $elemento->archivo_elemento  = "Archivo del elemento 1";
        $elemento->save();

        $elemento = new Elemento();
        $elemento->id_actividad  = 2;
        $elemento->nombre_elemento = "Elemento 2";
        $elemento->descripcion_elemento = "Descripcion del elemento 2";
        $elemento->link_elemento = "link del elemento 2";
        $elemento->archivo_elemento  = "Archivo del elemento 2";
        $elemento->save();

        $elemento = new Elemento();
        $elemento->id_actividad  = 3;
        $elemento->nombre_elemento = "Elemento 3";
        $elemento->descripcion_elemento = "Descripcion del elemento 3";
        $elemento->link_elemento = "link del elemento 3";
        $elemento->archivo_elemento  = "Archivo del elemento 3";
        $elemento->save();

        $elemento = new Elemento();
        $elemento->id_actividad  = 4;
        $elemento->nombre_elemento = "Elemento 4";
        $elemento->descripcion_elemento = "Descripcion del elemento 4";
        $elemento->link_elemento = "link del elemento 4";
        $elemento->archivo_elemento  = "Archivo del elemento 4";
        $elemento->save();

        $elemento = new Elemento();
        $elemento->id_actividad  = 5;
        $elemento->nombre_elemento = "Elemento 5";
        $elemento->descripcion_elemento = "Descripcion del elemento 5";
        $elemento->link_elemento = "link del elemento 5";
        $elemento->archivo_elemento  = "Archivo del elemento 5";
        $elemento->save();

        $elemento = new Elemento();
        $elemento->id_actividad  = 6;
        $elemento->nombre_elemento = "Elemento 6";
        $elemento->descripcion_elemento = "Descripcion del elemento 6";
        $elemento->link_elemento = "link del elemento 6";
        $elemento->archivo_elemento  = "Archivo del elemento 6";
        $elemento->save();

        $elemento = new Elemento();
        $elemento->id_actividad  = 7;
        $elemento->nombre_elemento = "Elemento 7";
        $elemento->descripcion_elemento = "Descripcion del elemento 7";
        $elemento->link_elemento = "link del elemento 7";
        $elemento->archivo_elemento  = "Archivo del elemento 7";
        $elemento->save();
        
        $elemento = new Elemento();
        $elemento->id_actividad  = 8;
        $elemento->nombre_elemento = "Elemento 8";
        $elemento->descripcion_elemento = "Descripcion del elemento 8";
        $elemento->link_elemento = "link del elemento 8";
        $elemento->archivo_elemento  = "Archivo del elemento 8";
        $elemento->save();
    }
}
