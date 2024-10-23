<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
        $user->nombre = "Alan";
        $user->apellido = "Meneces Flores";
        $user->correo = "Alanf2441@gmail.com";
        $user->tipo_usuario = 2;
        $user->usuario = "Alanbrito";
        $user->password = "12345a";
        $user->save();

        $user2 = new User();
        $user2->nombre = "Boris";
        $user2->apellido = "Angulo Urquieta";
        $user2->correo = "Borisf2441@gmail.com";
        $user2->tipo_usuario = 1;
        $user2->usuario = "Borisito";
        $user2->password = "12345b";
        $user2->save();

        $user3 = new User();
        $user3->nombre = "Ever";
        $user3->apellido = "Blanco Vela";
        $user3->correo = "Everf2441@gmail.com";
        $user3->tipo_usuario = 1;
        $user3->usuario = "Evercito";
        $user3->password = "12345e";
        $user3->save();

        $user4 = new User();
        $user4->nombre = "David";
        $user4->apellido = "Montenegro";
        $user4->correo = "Davidf2441@gmail.com";
        $user4->tipo_usuario = 1;
        $user4->usuario = "Davidcito";
        $user4->password = "12345d";
        $user4->save();

        $user5 = new User();
        $user5->nombre = "Andres";
        $user5->apellido = "Choquecahuana";
        $user5->correo = "Andresf2441@gmail.com";
        $user5->tipo_usuario = 1;
        $user5->usuario = "Andrecito";
        $user5->password = "12345a";
        $user5->save();

        $user6 = new User();
        $user6->nombre = "Brenda";
        $user6->apellido = "Calizaya Antezana";
        $user6->correo = "Brendaf2441@gmail.com";
        $user6->tipo_usuario = 2;
        $user6->usuario = "Brendita";
        $user6->password = "12345b";
        $user6->save();

        $user7 = new User();
        $user7->nombre = "Limber";
        $user7->apellido = "Coaquira";
        $user7->correo = "Limberf2441@gmail.com";
        $user7->tipo_usuario = 2;
        $user7->usuario = "Limbercito";
        $user7->password = "12345l";
        $user7->save();
        
        $user8 = new User();
        $user8->nombre = "Elena";
        $user8->apellido = "Bernabe";
        $user8->correo = "Elenaf2441@gmail.com";
        $user8->tipo_usuario = 2;
        $user8->usuario = "Elenitae";
        $user8->password = "12345";
        $user8->save();

        $user9 = new User();
        $user9->nombre = "Paola";
        $user9->apellido = "Galindo";
        $user9->correo = "Paolaf2441@gmail.com";
        $user9->tipo_usuario = 2;
        $user9->usuario = "Paolita";
        $user9->password = "12345p";
        $user9->save();
        
        $user10 = new User();
        $user10->nombre = "Rodrigo";
        $user10->apellido = "Vera vera";
        $user10->correo = "Rodrif2441@gmail.com";
        $user10->tipo_usuario = 2;
        $user10->usuario = "Rodriguito";
        $user10->password = "12345r";
        $user10->save();

        $user11 = new User();
        $user11->nombre = "Aracely";
        $user11->apellido = "Rachy Flores";
        $user11->correo = "Rachyf2441@gmail.com";
        $user11->tipo_usuario = 2;
        $user11->usuario = "Aracelita";
        $user11->password = "12345a";
        $user11->save();

        $user12 = new User();
        $user12->nombre = "Bernardo";
        $user12->apellido = "Cespedse Flores";
        $user12->correo = "Bernardof2441@gmail.com";
        $user12->tipo_usuario = 2;
        $user12->usuario = "Bernardo";
        $user12->password = "12345b";
        $user12->save();

        $user13 = new User();
        $user13->nombre = "Carlos";
        $user13->apellido = "Basualdo Flores";
        $user13->correo = "Carlosf2441@gmail.com";
        $user13->tipo_usuario = 2;
        $user13->usuario = "Carlitos";
        $user13->password = "12345c";
        $user13->save();

        $user14 = new User();
        $user14->nombre = "Eduardo";
        $user14->apellido = "Caberos Flores";
        $user14->correo = "Eduardof2441@gmail.com";
        $user14->tipo_usuario = 2;
        $user14->usuario = "Eduardito";
        $user14->password = "12345e";
        $user14->save();

        $user15 = new User();
        $user15->nombre = "Edson";
        $user15->apellido = "Fernardez Flores";
        $user15->correo = "Edsonf2441@gmail.com";
        $user15->tipo_usuario = 2;
        $user15->usuario = "Edcito";
        $user15->password = "12345e";
        $user15->save();

        $user16 = new User();
        $user16->nombre = "Fernando";
        $user16->apellido = "Alvarez";
        $user16->correo = "Fernandof2441@gmail.com";
        $user16->tipo_usuario = 2;
        $user16->usuario = "Fernandito";
        $user16->password = "12345f";
        $user16->save();

        $user17 = new User();
        $user17->nombre = "Gabriel";
        $user17->apellido = "Montenegro Flores";
        $user17->correo = "Gabrielf2441@gmail.com";
        $user17->tipo_usuario = 2;
        $user17->usuario = "Gabrielito";
        $user17->password = "12345g";
        $user17->save();

        $user18 = new User();
        $user18->nombre = "Jorge";
        $user18->apellido = "Mendoza Flores";
        $user18->correo = "Jorgef2441@gmail.com";
        $user18->tipo_usuario = 2;
        $user18->usuario = "Jorguito";
        $user18->password = "12345j";
        $user18->save();


    }
}
