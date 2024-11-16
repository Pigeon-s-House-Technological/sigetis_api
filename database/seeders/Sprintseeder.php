<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sprint;

class Sprintseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sprint = new Sprint();
        $sprint->id_grupo = 1;
        $sprint->numero_sprint = 1;
        $sprint->fecha_inicio = "2024-10-10T02:08:58.000000Z";
        $sprint->fecha_fin = "2024-10-13T02:08:58.000000Z";
        $sprint->save();

        $sprint2 = new Sprint();
        $sprint2->id_grupo = 1;
        $sprint2->numero_sprint = 2;
        $sprint2->fecha_inicio = "2024-10-11T02:08:58.000000Z";
        $sprint2->fecha_fin = "2024-10-13T02:08:58.000000Z";
        $sprint2->save();

        $sprint3 = new Sprint();
        $sprint3->id_grupo = 1;
        $sprint3->numero_sprint = 3;
        $sprint3->fecha_inicio = "2024-10-10T02:08:58.000000Z";
        $sprint3->fecha_fin = "2024-10-13T02:08:58.000000Z";
        $sprint3->save();

        $sprint4 = new Sprint();
        $sprint4->id_grupo = 1;
        $sprint4->numero_sprint = 4;
        $sprint4->fecha_inicio = "2024-10-10T02:08:58.000000Z";
        $sprint4->fecha_fin = "2024-10-13T02:08:58.000000Z";
        $sprint4->save();

        $sprint5 = new Sprint();
        $sprint5->id_grupo = 2;
        $sprint5->numero_sprint = 1;
        $sprint5->fecha_inicio = "2024-10-10T02:08:58.000000Z";
        $sprint5->fecha_fin = "2024-10-13T02:08:58.000000Z";
        $sprint->save();

        $sprint15 = new Sprint();
        $sprint15->id_grupo = 2;
        $sprint15->numero_sprint = 2;
        $sprint15->fecha_inicio = "2024-10-10T02:08:58.000000Z";
        $sprint15->fecha_fin = "2024-10-13T02:08:58.000000Z";
        $sprint15->save();

        $sprint6 = new Sprint();
        $sprint6->id_grupo = 2;
        $sprint6->numero_sprint = 3;
        $sprint6->fecha_inicio = "2024-10-10T02:08:58.000000Z";
        $sprint6->fecha_fin = "2024-10-13T02:08:58.000000Z";
        $sprint6->save();

        $sprint7 = new Sprint();
        $sprint7->id_grupo = 3;
        $sprint7->numero_sprint = 1;
        $sprint7->fecha_inicio = "2024-10-10T02:08:58.000000Z";
        $sprint7->fecha_fin = "2024-10-13T02:08:58.000000Z";
        $sprint7->save();

        $sprint8 = new Sprint();
        $sprint8->id_grupo = 3;
        $sprint8->numero_sprint = 2;
        $sprint8->fecha_inicio = "2024-10-10T02:08:58.000000Z";
        $sprint8->fecha_fin = "2024-10-13T02:08:58.000000Z";
        $sprint8->save();

        $sprint9 = new Sprint();
        $sprint9->id_grupo = 3;
        $sprint9->numero_sprint = 3;
        $sprint9->fecha_inicio = "2024-10-10T02:08:58.000000Z";
        $sprint9->fecha_fin = "2024-10-13T02:08:58.000000Z";
        $sprint9->save();

        $sprint10 = new Sprint();
        $sprint10->id_grupo = 3;
        $sprint10->numero_sprint = 4;
        $sprint10->fecha_inicio = "2024-10-10T02:08:58.000000Z";
        $sprint10->fecha_fin = "2024-10-13T02:08:58.000000Z";
        $sprint10->save();

        $sprint11 = new Sprint();
        $sprint11->id_grupo = 4;
        $sprint11->numero_sprint = 1;
        $sprint11->fecha_inicio = "2024-10-10T02:08:58.000000Z";
        $sprint11->fecha_fin = "2024-10-13T02:08:58.000000Z";
        $sprint11->save();

        $sprint12 = new Sprint();
        $sprint12->id_grupo = 4;
        $sprint12->numero_sprint = 2;
        $sprint12->fecha_inicio = "2024-10-10T02:08:58.000000Z";
        $sprint12->fecha_fin = "2024-10-13T02:08:58.000000Z";
        $sprint12->save();

        $sprint13 = new Sprint();
        $sprint13->id_grupo = 4;
        $sprint13->numero_sprint = 3;
        $sprint13->fecha_inicio = "2024-10-10T02:08:58.000000Z";
        $sprint13->fecha_fin = "2024-10-13T02:08:58.000000Z";
        $sprint13->save();

        $sprint14 = new Sprint();
        $sprint14->id_grupo = 5;
        $sprint14->numero_sprint = 1;
        $sprint14->fecha_inicio = "2024-10-10T02:08:58.000000Z";
        $sprint14->fecha_fin = "2024-10-13T02:08:58.000000Z";
        $sprint14->save();


    }
}
