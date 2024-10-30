<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(Usuarioseeder::class);
        $this->call(Gruposeeder::class);
        $this->call(Sprintseeder::class);
        $this->call(Historia_usuarioseeder::class);
        $this->call(Actividadseeder::class);
        $this->call(Evaluacionseeder::class);
        $this->call(Criterio_Evaluacionseeder::class);
        $this->call(Elementoseeder::class);
        $this->call(Grupo_evaluacionseeder::class);
        $this->call(Imagen_huseeder::class);
        $this->call(Pregunta_opción_multipleseeder::class);
        $this->call(Opc_preg_multseeder::class);
        $this->call(Pregunta_complementoseeder::class);
        $this->call(Pregunta_puntuacionseeder::class);
        $this->call(Res_complementoseeder::class);
        $this->call(Res_opc_multipleseeder::class);
        $this->call(Res_puntuacionseeder::class);
        
    }
}
