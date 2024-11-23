<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grupo;

class Gruposeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grupo = new Grupo();
        $grupo->nombre_grupo = "Dinamita 1";
        $grupo->descripcion_grupo = "Somos una bomba de equipo BUMM!!!";
        $grupo->id_tutor = 1;
        $grupo->id_jefe_grupo = 2;   
        $grupo->save(); 

        $grupo1 = new Grupo();
        $grupo1->nombre_grupo = "Alfa Lobo";
        $grupo1->descripcion_grupo = "Equipo de Fuerzas especiales con integrantes especiales";
        $grupo1->id_tutor = 1;
        $grupo1->id_jefe_grupo = 2;   
        $grupo1->save();

        $grupo2 = new Grupo();
        $grupo2->nombre_grupo = "Fiona";
        $grupo2->descripcion_grupo = "De sia somos unos flojos de noche unas maquinas";
        $grupo2->id_tutor = 1;
        $grupo2->id_jefe_grupo = 2;   
        $grupo2->save();

        $grupo3 = new Grupo();
        $grupo3->nombre_grupo = "Pinocho";
        $grupo3->descripcion_grupo = "Nosotros no mentimos ellas si ";
        $grupo3->id_tutor = 1;
        $grupo3->id_jefe_grupo = 2;   
        $grupo3->save();

        $grupo4 = new Grupo();
        $grupo4->nombre_grupo = "Los Rabanitos";
        $grupo4->descripcion_grupo = "Te quiero mucho rabanito cuidate te quiere tu compa pesito";
        $grupo4->id_tutor = 1;
        $grupo4->id_jefe_grupo = 2;   
        $grupo4->save();

    }   
}
