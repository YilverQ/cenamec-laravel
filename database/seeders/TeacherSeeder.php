<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::create([
            'name' => 'Yilver',
            'lastname' => 'Quevedo',
            'identification_card' => '28333459',
            'number_phone' => '04160140472',
            'email' => 'yilver@profesor.com',
            'password' => 'root',
        ]);

        Teacher::create([
            'name' => 'Vanessa',
            'lastname' => 'Longa',
            'identification_card' => '28000111',
            'number_phone' => '04123938615',
            'email' => 'vanessa@profesor.com',
            'password' => 'root',
        ]);
    }
}
