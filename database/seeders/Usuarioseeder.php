<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Usuarioseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->nombre = "docente";
        $user->apellido = "docente Flores";
        $user->correo = "docente@gmail.com";
        $user->tipo_usuario = 1;
        $user->usuario = "docente";
        $user->password = HASH::make("docente");
        $user->save();

        $user2 = new User();
        $user2->nombre = "estudiante";
        $user2->apellido = "estudiante apellido";
        $user2->correo = "estudiante@gmail.com";
        $user2->tipo_usuario = 3;
        $user2->usuario = "estudiante";
        $user2->password = HASH::make("estudiante");
        $user2->save();

        $user4 = new User();
        $user4->nombre = "Manuelito";
        $user4->apellido = "Manuelito apellido";
        $user4->correo = "manuelito@gmail.com";
        $user4->tipo_usuario = 3;
        $user4->usuario = "manuelito";
        $user4->password = HASH::make("manuelito");
        $user4->save();

        $user3 = new User();
        $user3->nombre = "admin";
        $user3->apellido = "admin apellido";
        $user3->correo = "admin@gmail.com";
        $user3->tipo_usuario = 0;
        $user3->usuario = "admin";
        $user3->password = HASH::make("admin123");
        $user3->save();

    }
}
