<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actividad;

class Actividadseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actividad = new Actividad();
        $actividad->id_hu = 1;
        $actividad->nombre_actividad = "Crear Botón";
        $actividad->estado_actividad = 1;
        $actividad->fecha_inicio = "2024-10-10T02:08:58.000000Z";
        $actividad->fecha_fin = "2024-10-11T02:08:58.000000Z";
        $actividad->encargado = 1;
        $actividad->save();

        $actividad2 = new Actividad();
        $actividad2->id_hu = 1;
        $actividad2->nombre_actividad = "Crear Interfaz home";
        $actividad2->estado_actividad = 1;
        $actividad2->fecha_inicio = "2024-10-11T02:08:58.000000Z";
        $actividad2->fecha_fin = "2024-10-12T02:08:58.000000Z";
        $actividad2->encargado = 1;
        $actividad2->save();

        $actividad3 = new Actividad();
        $actividad3->id_hu = 1;
        $actividad3->nombre_actividad = "Crear base de datos";
        $actividad3->estado_actividad = 2;
        $actividad3->fecha_inicio = "2024-10-13T02:08:58.000000Z";
        $actividad3->fecha_fin = "2024-10-14T02:08:58.000000Z";
        $actividad3->encargado = 2;
        $actividad3->save();

        $actividad4 = new Actividad();
        $actividad4->id_hu = 1;
        $actividad4->nombre_actividad = "Crear las funcionalidades del home";
        $actividad4->estado_actividad = 2;
        $actividad4->fecha_inicio = "2024-10-14T02:08:58.000000Z";
        $actividad4->fecha_fin = "2024-10-15T02:08:58.000000Z";
        $actividad4->encargado = 2;
        $actividad4->save();

        $actividad5 = new Actividad();
        $actividad5->id_hu = 1;
        $actividad5->nombre_actividad = "Crear Mockup";
        $actividad5->estado_actividad = 1;
        $actividad5->fecha_inicio = "2024-10-16T02:08:58.000000Z";
        $actividad5->fecha_fin = "2024-10-17T02:08:58.000000Z";
        $actividad5->encargado = 3;
        $actividad5->save();

        $actividad6 = new Actividad();
        $actividad6->id_hu = 1;
        $actividad6->nombre_actividad = "Crear funcionalidades de mostrar datos";
        $actividad6->estado_actividad = 1;
        $actividad6->fecha_inicio = "2024-10-15T02:08:58.000000Z";
        $actividad6->fecha_fin = "2024-10-16T02:08:58.000000Z";
        $actividad6->encargado = 3;
        $actividad6->save();

        $actividad7 = new Actividad();
        $actividad7->id_hu = 2;
        $actividad7->nombre_actividad = "Crear interfaz de login";
        $actividad7->estado_actividad = 1;
        $actividad7->fecha_inicio = "2024-10-21T02:08:58.000000Z";
        $actividad7->fecha_fin = "2024-10-22T02:08:58.000000Z";
        $actividad7->encargado = 4;
        $actividad7->save();

        $actividad8 = new Actividad();
        $actividad8->id_hu = 2;
        $actividad8->nombre_actividad = "Crear funcion de guardado de usuarios";
        $actividad8->estado_actividad = 1;
        $actividad8->fecha_inicio = "2024-10-22T02:08:58.000000Z";
        $actividad8->fecha_fin = "2024-10-23T02:08:58.000000Z";
        $actividad8->encargado = 5;
        $actividad8->save();

        $actividad9 = new Actividad();
        $actividad9->id_hu = 2;
        $actividad9->nombre_actividad = "Crear interfaz de resgistro";
        $actividad9->estado_actividad = 1;
        $actividad9->fecha_inicio = "2024-10-24T02:08:58.000000Z";
        $actividad9->fecha_fin = "2024-10-25T02:08:58.000000Z";
        $actividad9->encargado = 6;
        $actividad9->save();

        $actividad10 = new Actividad();
        $actividad10->id_hu = 3;
        $actividad10->nombre_actividad = "Crear autentifiacion";
        $actividad10->estado_actividad = 1;
        $actividad10->fecha_inicio = "2024-10-25T02:08:58.000000Z";
        $actividad10->fecha_fin = "2024-10-26T02:08:58.000000Z";
        $actividad10->encargado = 7;
        $actividad10->save();
        
        $actividad11 = new Actividad();
        $actividad11->id_hu = 3;
        $actividad11->nombre_actividad = "Crear funciona para la contraseña";
        $actividad11->estado_actividad = 1;
        $actividad11->fecha_inicio = "2024-10-25T02:08:58.000000Z";
        $actividad11->fecha_fin = "2024-10-26T02:08:58.000000Z";
        $actividad11->encargado = 8;
        $actividad11->save();
    }
}
