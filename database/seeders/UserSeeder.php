<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['firts_name'    => 'Yilver',
            'second_name'   => 'Antonio',
            'lastname'      => 'Quevedo',
            'second_lastname'   => 'Molinares',
            'gender'        => 'Masculino',
            'birthdate'     => '09/06/2001',
            'identification_card' => '28333459',
            'number_phone'  => '04160140472',
            'email'         => 'yilver0906@gmail.com',
            'password'      => 'root',
            'profileimg_id' => '49',
            'parishe_id'    => '670'
        ]);

        User::create(['firts_name'    => 'Vanessa',
            'second_name'   => 'Alexandra',
            'lastname'      => 'Longa',
            'second_lastname'   => 'Otero',
            'gender'        => 'Femenino',
            'birthdate'     => '09/06/2001',
            'identification_card' => '27914751',
            'number_phone'  => '04127603410',
            'email'         => 'vanessa.longa06@gmail.com',
            'password'      => 'root',
            'profileimg_id' => '46',
            'parishe_id'    => '639'
        ]);

        User::create(['firts_name'    => 'Mayra',
            'second_name'   => 'Barbara',
            'lastname'      => 'Silva',
            'second_lastname'   => 'Sanz',
            'gender'        => 'Femenino',
            'birthdate'     => '31/08/2001',
            'identification_card' => '30456000',
            'number_phone'  => '04142100312',
            'email'         => 'mayra@gmail.com',
            'password'      => 'root',
            'profileimg_id' => '46',
            'parishe_id'    => '667'
        ]);

        User::create(['firts_name'    => 'Biagni',
            'second_name'   => 'Daitanet',
            'lastname'      => 'Abano',
            'second_lastname'   => 'Acevedo',
            'gender'        => 'Femenino',
            'birthdate'     => '31/08/2001',
            'identification_card' => '30496800',
            'number_phone'  => '04123744425',
            'email'         => 'biagniabano1@gmail.com',
            'password'      => '1234',
            'profileimg_id' => '46',
            'parishe_id'    => '667'
        ]);

        User::create(['firts_name'    => 'Melanie',
            'second_name'   => 'Alexandra',
            'lastname'      => 'Rodríguez',
            'second_lastname'   => 'Paraco',
            'gender'        => 'Femenino',
            'birthdate'     => '19/10/2000',
            'identification_card' => '29743133',
            'number_phone'  => '04127008380',
            'email'         => 'alexandrapetra2000@gmail.com',
            'password'      => '1234',
            'profileimg_id' => '46',
            'parishe_id'    => '349'
        ]);

        User::create(['firts_name'    => 'Juan',
            'second_name'   => 'Daniel',
            'lastname'      => 'Castillo',
            'second_lastname'   => 'Medina',
            'gender'        => 'Masculino',
            'birthdate'     => '27/10/1997',
            'identification_card' => '26268311',
            'number_phone'  => '04147111664',
            'email'         => 'juan.daniel2661@gmail.com',
            'password'      => '1234',
            'profileimg_id' => '49',
            'parishe_id'    => '670'
        ]);


        User::create(['firts_name'    => 'Yefferson',
            'second_name'   => 'Javier',
            'lastname'      => 'Quevedo',
            'second_lastname'   => 'Molinares',
            'gender'        => 'Masculino',
            'birthdate'     => '23/12/1997',
            'identification_card' => '26334043',
            'number_phone'  => '04123083565',
            'email'         => 'yeffersonq5@gmail.com',
            'password'      => '1234',
            'profileimg_id' => '49',
            'parishe_id'    => '669'
        ]);

        User::create(['firts_name'    => 'Victoria',
            'second_name'   => 'Valentina',
            'lastname'      => 'Rodríguez',
            'second_lastname'   => 'Colmenares',
            'gender'        => 'Femenino',
            'birthdate'     => '07/09/2001',
            'identification_card' => '29611002',
            'number_phone'  => '04265200250',
            'email'         => 'victoriavalentinarodriguez08@gmail.com',
            'password'      => '1234',
            'profileimg_id' => '49',
            'parishe_id'    => '337'
        ]);
    }
}
