<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*Física*/
        Module::create([
            'name' => 'Movimiento en una dimensión',
            'description' => 'Así que abróchate el cinturón y prepárate para un paseo suave por los fundamentos de la física.',
            'level' => 1,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);

        Module::create([
            'name' => 'Movimiento en dos dimensiones',
            'description' => 'Así que abróchate el cinturón y prepárate para un paseo suave por los fundamentos de la física.',
            'level' => 2,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);

        Module::create([
            'name' => 'Fuerzas y leyes del movimiento de Newton',
            'description' => 'Así que abróchate el cinturón y prepárate para un paseo suave por los fundamentos de la física.',
            'level' => 3,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);
        Module::create([
            'name' => 'Fuerza centrípeta y gravitación',
            'description' => 'Así que abróchate el cinturón y prepárate para un paseo suave por los fundamentos de la física.',
            'level' => 4,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);

        Module::create([
            'name' => 'Trabajo y energía',
            'description' => 'Así que abróchate el cinturón y prepárate para un paseo suave por los fundamentos de la física.',
            'level' => 5,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);

        Module::create([
            'name' => 'Impacto y momento lineal',
            'description' => 'Así que abróchate el cinturón y prepárate para un paseo suave por los fundamentos de la física.',
            'level' => 6,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);


        /*Química*/
        Module::create([
            'name' => 'Introducción a la Química',
            'description' => '',
            'level' => 1,
            'teacher_id' => 1,
            'course_id'  => 2,
        ]);

        Module::create([
            'name' => 'Fundamentos elementales de la Química',
            'description' => '',
            'level' => 2,
            'teacher_id' => 1,
            'course_id'  => 2,
        ]);

        Module::create([
            'name' => 'Conceptos avanzados de la Química',
            'description' => '',
            'level' => 3,
            'teacher_id' => 1,
            'course_id'  => 2,
        ]);


        /*Biología*/
        Module::create([
            'name' => 'Introducción a la Biología',
            'description' => '',
            'level' => 1,
            'teacher_id' => 1,
            'course_id'  => 3,
        ]);

        Module::create([
            'name' => 'Fundamentos elementales de la Biología',
            'description' => '',
            'level' => 2,
            'teacher_id' => 1,
            'course_id'  => 3,
        ]);

        Module::create([
            'name' => 'Conceptos avanzados de la Biología',
            'description' => '',
            'level' => 3,
            'teacher_id' => 1,
            'course_id'  => 3,
        ]);


        /*Humanidades*/
        Module::create([
            'name' => 'Introducción a la Humanidades',
            'description' => '',
            'level' => 1,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);

        Module::create([
            'name' => 'Fundamentos elementales de la Humanidades',
            'description' => '',
            'level' => 2,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);

        Module::create([
            'name' => 'Conceptos avanzados de la Humanidades',
            'description' => '',
            'level' => 3,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);


        /*Psicología*/
        Module::create([
            'name' => 'Introducción a la Psicología',
            'description' => '',
            'level' => 1,
            'teacher_id' => 2,
            'course_id'  => 5,
        ]);

        Module::create([
            'name' => 'Fundamentos elementales de la Psicología',
            'description' => '',
            'level' => 2,
            'teacher_id' => 2,
            'course_id'  => 5,
        ]);

        Module::create([
            'name' => 'Conceptos avanzados de la Psicología',
            'description' => '',
            'level' => 3,
            'teacher_id' => 2,
            'course_id'  => 5,
        ]);


        /*Ciencias Sociales*/
        Module::create([
            'name' => 'Introducción a la Ciencias Sociales',
            'description' => '',
            'level' => 1,
            'teacher_id' => 2,
            'course_id'  => 6,
        ]);

        Module::create([
            'name' => 'Fundamentos elementales de la Ciencias Sociales',
            'description' => '',
            'level' => 2,
            'teacher_id' => 2,
            'course_id'  => 6,
        ]);

        Module::create([
            'name' => 'Conceptos avanzados de la Ciencias Sociales',
            'description' => '',
            'level' => 3,
            'teacher_id' => 2,
            'course_id'  => 6,
        ]);
    }
}
