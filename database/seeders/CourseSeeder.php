<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*YILVER*/
        Course::create([
            'name' => 'Física',
            'teacher_id' => 1,
        ]);

        Course::create([
            'name' => 'Química',
            'teacher_id' => 1,
        ]);

        Course::create([
            'name' => 'Biología',
            'teacher_id' => 1,
        ]);


        /*Vanessa*/
        Course::create([
            'name' => 'Humanidades',
            'teacher_id' => 2,
        ]);

        Course::create([
            'name' => 'Psicología',
            'teacher_id' => 2,
        ]);

        Course::create([
            'name' => 'Ciencias Sociales',
            'teacher_id' => 2,
        ]);
    }
}
