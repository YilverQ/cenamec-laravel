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
            'second_name'   => 'Antonio',
            'lastname'      => 'Longa',
            'second_lastname'   => 'Molinares',
            'gender'        => 'Femenino',
            'birthdate'     => '09/06/2001',
            'identification_card' => '27914751',
            'number_phone'  => '04127603410',
            'email'         => 'vanessa.longa06@gmail.com',
            'password'      => 'root',
            'profileimg_id' => '46',
            'parishe_id'    => '639'
        ]);

        User::create(['firts_name'    => 'Biagni',
            'second_name'   => 'Daitanet',
            'lastname'      => 'Abano',
            'second_lastname'   => 'Acevedo',
            'gender'        => 'Femenino',
            'birthdate'     => '31/08/2001',
            'identification_card' => '31456000',
            'number_phone'  => '04122100312',
            'email'         => 'biagni@gmail.com',
            'password'      => 'root',
            'profileimg_id' => '46',
            'parishe_id'    => '636'
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

        User::create(['firts_name'    => 'Diego',
            'second_name'   => 'Encli',
            'lastname'      => 'Badillo',
            'second_lastname'   => 'Velazques',
            'gender'        => 'Masculino',
            'birthdate'     => '31/08/2001',
            'identification_card' => '20456000',
            'number_phone'  => '04142210312',
            'email'         => 'diego@gmail.com',
            'password'      => 'root',
            'profileimg_id' => '49',
            'parishe_id'    => '669'
        ]);
    }
}
