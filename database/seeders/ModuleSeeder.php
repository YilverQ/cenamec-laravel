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
            'name' => 'Introducción a la física',
            'level' => 1,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);

        Module::create([
            'name' => 'Fundamentos elementales de la física',
            'level' => 2,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);

        Module::create([
            'name' => 'Conceptos avanzados de la física',
            'level' => 3,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);


        /*Química*/
        Module::create([
            'name' => 'Introducción a la Química',
            'level' => 1,
            'teacher_id' => 1,
            'course_id'  => 2,
        ]);

        Module::create([
            'name' => 'Fundamentos elementales de la Química',
            'level' => 2,
            'teacher_id' => 1,
            'course_id'  => 2,
        ]);

        Module::create([
            'name' => 'Conceptos avanzados de la Química',
            'level' => 3,
            'teacher_id' => 1,
            'course_id'  => 2,
        ]);


        /*Biología*/
        Module::create([
            'name' => 'Introducción a la Biología',
            'level' => 1,
            'teacher_id' => 1,
            'course_id'  => 3,
        ]);

        Module::create([
            'name' => 'Fundamentos elementales de la Biología',
            'level' => 2,
            'teacher_id' => 1,
            'course_id'  => 3,
        ]);

        Module::create([
            'name' => 'Conceptos avanzados de la Biología',
            'level' => 3,
            'teacher_id' => 1,
            'course_id'  => 3,
        ]);


        /*Humanidades*/
        Module::create([
            'name' => 'Introducción a la Humanidades',
            'level' => 1,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);

        Module::create([
            'name' => 'Fundamentos elementales de la Humanidades',
            'level' => 2,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);

        Module::create([
            'name' => 'Conceptos avanzados de la Humanidades',
            'level' => 3,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);


        /*Psicología*/
        Module::create([
            'name' => 'Introducción a la Psicología',
            'level' => 1,
            'teacher_id' => 2,
            'course_id'  => 5,
        ]);

        Module::create([
            'name' => 'Fundamentos elementales de la Psicología',
            'level' => 2,
            'teacher_id' => 2,
            'course_id'  => 5,
        ]);

        Module::create([
            'name' => 'Conceptos avanzados de la Psicología',
            'level' => 3,
            'teacher_id' => 2,
            'course_id'  => 5,
        ]);


        /*Ciencias Sociales*/
        Module::create([
            'name' => 'Introducción a la Ciencias Sociales',
            'level' => 1,
            'teacher_id' => 2,
            'course_id'  => 6,
        ]);

        Module::create([
            'name' => 'Fundamentos elementales de la Ciencias Sociales',
            'level' => 2,
            'teacher_id' => 2,
            'course_id'  => 6,
        ]);

        Module::create([
            'name' => 'Conceptos avanzados de la Ciencias Sociales',
            'level' => 3,
            'teacher_id' => 2,
            'course_id'  => 6,
        ]);
    }
}
