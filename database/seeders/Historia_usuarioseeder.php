<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Historia_usuario;

class Historia_usuarioseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hu = new Historia_usuario();
        $hu->id_sprint = 1;
        $hu->identificador_hu = "HU 001";
        $hu->prerrequisitos = "Prerequisitos del HU 1";
        $hu->descripcion_hu = "descripcion del hu 1";
        $hu->prioridad = 1;
        $hu->tiempo_estimado = 2;
        $hu->titulo_hu = "Historia de usuario 1";
        $hu->criterios_aceptacion = "Criterios de aceptacion de la HU 1";
        $hu->save();

        $hu2 = new Historia_usuario();
        $hu2->id_sprint = 1;
        $hu2->identificador_hu = "HU 002";
        $hu2->prerrequisitos = "Prerequisitos del HU 2";
        $hu2->descripcion_hu = "descripcion del hu 2";
        $hu2->prioridad = 3;
        $hu2->tiempo_estimado = 5;
        $hu2->titulo_hu = "Historia de usuario 2";
        $hu2->criterios_aceptacion = "Criterios de aceptacion de la HU 2";
        $hu2->save();

        $hu3 = new Historia_usuario();
        $hu3->id_sprint = 1;
        $hu3->identificador_hu = "HU 003";
        $hu3->prerrequisitos = "Prerequisitos del HU 3";
        $hu3->descripcion_hu = "descripcion del hu 3";
        $hu3->prioridad = 6;
        $hu3->tiempo_estimado = 8;
        $hu3->titulo_hu = "Historia de usuario 3";
        $hu3->criterios_aceptacion = "Criterios de aceptacion de la HU 3";
        $hu3->save();

        $hu4 = new Historia_usuario();
        $hu4->id_sprint = 1;
        $hu4->identificador_hu = "HU 004";
        $hu4->prerrequisitos = "Prerequisitos del HU 4";
        $hu4->descripcion_hu = "descripcion del hu 4";
        $hu4->prioridad = 1;
        $hu4->tiempo_estimado = 2;
        $hu4->titulo_hu = "Historia de usuario 4";
        $hu4->criterios_aceptacion = "Criterios de aceptacion de la HU 4";
        $hu4->save();

        $hu5 = new Historia_usuario();
        $hu5->id_sprint = 1;
        $hu5->identificador_hu = "HU 005";
        $hu5->prerrequisitos = "Prerequisitos del HU 5";
        $hu5->descripcion_hu = "descripcion del hu 5";
        $hu5->prioridad = 2;
        $hu5->tiempo_estimado = 4;
        $hu5->titulo_hu = "Historia de usuario 5";
        $hu5->criterios_aceptacion = "Criterios de aceptacion de la HU 5";
        $hu5->save();

        $hu6 = new Historia_usuario();
        $hu6->id_sprint = 1;
        $hu6->identificador_hu = "HU 006";
        $hu6->prerrequisitos = "Prerequisitos del HU 6";
        $hu6->descripcion_hu = "descripcion del hu 6";
        $hu6->prioridad = 5;
        $hu6->tiempo_estimado = 8;
        $hu6->titulo_hu = "Historia de usuario 6";
        $hu6->criterios_aceptacion = "Criterios de aceptacion de la HU 6";
        $hu6->save();

        $hu7 = new Historia_usuario();
        $hu7->id_sprint = 1;
        $hu7->identificador_hu = "HU 007";
        $hu7->prerrequisitos = "Prerequisitos del HU 7";
        $hu7->descripcion_hu = "descripcion del hu 7";
        $hu7->prioridad = 2;
        $hu7->tiempo_estimado = 4;
        $hu7->titulo_hu = "Historia de usuario 7";
        $hu7->criterios_aceptacion = "Criterios de aceptacion de la HU 7";
        $hu7->save();

        $hu8 = new Historia_usuario();
        $hu8->id_sprint = 1;
        $hu8->identificador_hu = "HU 008";
        $hu8->prerrequisitos = "Prerequisitos del HU 8";
        $hu8->descripcion_hu = "descripcion del hu 8";
        $hu8->prioridad = 5;
        $hu8->tiempo_estimado = 8;
        $hu8->titulo_hu = "Historia de usuario 8";
        $hu8->criterios_aceptacion = "Criterios de aceptacion de la HU 8";
        $hu8->save();

        $hu9 = new Historia_usuario();
        $hu9->id_sprint = 2;
        $hu9->identificador_hu = "HU 001";
        $hu9->prerrequisitos = "Prerequisitos del HU 1";
        $hu9->descripcion_hu = "descripcion del hu 1";
        $hu9->prioridad = 1;
        $hu9->tiempo_estimado = 2;
        $hu9->titulo_hu = "Historia de usuario 1";
        $hu9->criterios_aceptacion = "Criterios de aceptacion de la HU 1";
        $hu9->save();

        $hu10 = new Historia_usuario();
        $hu10->id_sprint = 2;
        $hu10->identificador_hu = "HU 002";
        $hu10->prerrequisitos = "Prerequisitos del HU 2";
        $hu10->descripcion_hu = "descripcion del hu 2";
        $hu10->prioridad = 2;
        $hu10->tiempo_estimado = 4;
        $hu10->titulo_hu = "Historia de usuario 2";
        $hu10->criterios_aceptacion = "Criterios de aceptacion de la HU 2";
        $hu10->save();

        $hu11 = new Historia_usuario();
        $hu11->id_sprint = 2;
        $hu11->identificador_hu = "HU 003";
        $hu11->prerrequisitos = "Prerequisitos del HU 3";
        $hu11->descripcion_hu = "descripcion del hu 3";
        $hu11->prioridad = 3;
        $hu11->tiempo_estimado = 4;
        $hu11->titulo_hu = "Historia de usuario 3";
        $hu11->criterios_aceptacion = "Criterios de aceptacion de la HU 3";
        $hu11->save();

        $hu12 = new Historia_usuario();
        $hu12->id_sprint = 2;
        $hu12->identificador_hu = "HU 004";
        $hu12->prerrequisitos = "Prerequisitos del HU 4";
        $hu12->descripcion_hu = "descripcion del hu 4";
        $hu12->prioridad = 4;
        $hu12->tiempo_estimado = 5;
        $hu12->titulo_hu = "Historia de usuario 4";
        $hu12->criterios_aceptacion = "Criterios de aceptacion de la HU 4";
        $hu12->save();

        $hu14 = new Historia_usuario();
        $hu14->id_sprint = 2;
        $hu14->identificador_hu = "HU 005";
        $hu14->prerrequisitos = "Prerequisitos del HU 5";
        $hu14->descripcion_hu = "descripcion del hu 5";
        $hu14->prioridad = 5;
        $hu14->tiempo_estimado = 8;
        $hu14->titulo_hu = "Historia de usuario 5";
        $hu14->criterios_aceptacion = "Criterios de aceptacion de la HU 5";
        $hu14->save();

        $hu15 = new Historia_usuario();
        $hu15->id_sprint = 3;
        $hu15->identificador_hu = "HU 001";
        $hu15->prerrequisitos = "Prerequisitos del HU 1";
        $hu15->descripcion_hu = "descripcion del hu 1";
        $hu15->prioridad = 1;
        $hu15->tiempo_estimado = 2;
        $hu15->titulo_hu = "Historia de usuario 1";
        $hu15->criterios_aceptacion = "Criterios de aceptacion de la HU 1";
        $hu15->save();

        $hu16 = new Historia_usuario();
        $hu16->id_sprint = 3;
        $hu16->identificador_hu = "HU 002";
        $hu16->prerrequisitos = "Prerequisitos del HU 2";
        $hu16->descripcion_hu = "descripcion del hu 2";
        $hu16->prioridad = 2;
        $hu16->tiempo_estimado = 3;
        $hu16->titulo_hu = "Historia de usuario 2";
        $hu16->criterios_aceptacion = "Criterios de aceptacion de la HU 2";
        $hu16->save();
    }
}
