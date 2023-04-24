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
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque autem et earum, veniam laudantium impedit placeat voluptatum corporis cum, fugit?",
            'img' => 'fisica.jpeg',
            'teacher_id' => 1,
        ]);

        Course::create([
            'name' => 'Química',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque autem et earum, veniam laudantium impedit placeat voluptatum corporis cum, fugit?",
            'img' => 'quimica.jpeg',
            'teacher_id' => 1,
        ]);

        Course::create([
            'name' => 'Biología',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque autem et earum, veniam laudantium impedit placeat voluptatum corporis cum, fugit?",
            'img' => 'biologia.jpeg',
            'teacher_id' => 1,
        ]);


        /*Vanessa*/
        Course::create([
            'name' => 'Humanidades',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque autem et earum, veniam laudantium impedit placeat voluptatum corporis cum, fugit?",
            'img' => 'fisica.jpeg',
            'teacher_id' => 2,
        ]);

        Course::create([
            'name' => 'Psicología',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque autem et earum, veniam laudantium impedit placeat voluptatum corporis cum, fugit?",
            'img' => 'quimica.jpeg',
            'teacher_id' => 2,
        ]);

        Course::create([
            'name' => 'Ciencias Sociales',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque autem et earum, veniam laudantium impedit placeat voluptatum corporis cum, fugit?",
            'img' => 'biologia.jpeg',
            'teacher_id' => 2,
        ]);
    }
}
