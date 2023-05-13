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
            'description' => "La física es una rama de la ciencia que estudia la materia y el movimiento (desde las moléculas las estrellas) y cómo estos interactúan con la energía y las fuerzas.",
            'img' => '/storage/imgCourses/fisica.jpeg',
            'teacher_id' => 1,
        ]);

        Course::create([
            'name' => 'Química',
            'description' => "La Historia de la Química que corresponde al curso de CIENCIA preparado especialmente para los niños de Sexto Grado de Primaria.",
            'img' => '/storage/imgCourses/quimica.jpeg',
            'teacher_id' => 1,
        ]);

        Course::create([
            'name' => 'Biología',
            'description' => "La biología es el estudio de la vida. Mantenemos estas lecciones actualizadas, por lo tanto podrás encontrar aquí contenido nuevo o mejorado con el tiempo.",
            'img' => '/storage/imgCourses/biologia.jpeg',
            'teacher_id' => 1,
        ]);


        /*Vanessa*/
        Course::create([
            'name' => 'Humanidades',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque autem et earum, veniam laudantium impedit placeat voluptatum corporis cum, fugit?",
            'img' => '/storage/imgCourses/fisica.jpeg',
            'teacher_id' => 2,
        ]);

        Course::create([
            'name' => 'Psicología',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque autem et earum, veniam laudantium impedit placeat voluptatum corporis cum, fugit?",
            'img' => '/storage/imgCourses/quimica.jpeg',
            'teacher_id' => 2,
        ]);

        Course::create([
            'name' => 'Ciencias Sociales',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque autem et earum, veniam laudantium impedit placeat voluptatum corporis cum, fugit?",
            'img' => '/storage/imgCourses/biologia.jpeg',
            'teacher_id' => 2,
        ]);
    }
}
