<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' => 'Yilver',
            'lastname' => 'Quevedo',
            'identification_card' => '28333459',
            'number_phone' => '04160140472',
            'email' => 'yilver@estudiante.com',
            'password' => 'root',
        ]);

        Student::create([
            'name' => 'Vanessa',
            'lastname' => 'Longa',
            'identification_card' => '28000111',
            'number_phone' => '04123938615',
            'email' => 'vanessa@estudiante.com',
            'password' => 'root',
        ]);
    }
}
