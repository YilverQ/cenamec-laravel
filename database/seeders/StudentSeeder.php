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
            'email' => 'yilver0906@gmail.com',
            'password' => 'root',
        ]);

        Student::create([
            'name' => 'Vanessa',
            'lastname' => 'Longa',
            'identification_card' => '27914751',
            'number_phone' => '04127603410',
            'email' => 'vanessa.longa06@gmail.com',
            'password' => 'root',
        ]);
    }
}
