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
            'description' => "La física es el estudio de la materia, el movimiento, la energía y la fuerza. Aquí puedes explorar temas, artículos y ejercicios por tema.",
            'img' => '/storage/imgCourses/fisica.jpg',
            'teacher_id' => 1,
        ]);

        Course::create([
            'name' => 'Química',
            'description' => "La química es el estudio de la materia y los cambios que experimenta. Aquí puedes explorar temas, artículos y ejercicios de química por tema.",
            'img' => '/storage/imgCourses/quimica.jpeg',
            'teacher_id' => 1,
        ]);

        Course::create([
            'name' => 'Biología',
            'description' => "La biología es el estudio de la vida. Aquí puedes explorar temas, artículos y ejercicios por tema. Mantenemos estas lecciones actualizadas, por lo tanto podrás encontrar aquí contenido nuevo o mejorado con el tiempo.",
            'img' => '/storage/imgCourses/biologia.jpeg',
            'teacher_id' => 1,
        ]);


        /*Vanessa*/
        Course::create([
            'name' => 'Humanidades',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque autem et earum, veniam laudantium impedit placeat voluptatum corporis cum, fugit?",
            'img' => '/storage/imgCourses/humanidades.jpg',
            'teacher_id' => 2,
        ]);

        Course::create([
            'name' => 'Psicología',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque autem et earum, veniam laudantium impedit placeat voluptatum corporis cum, fugit?",
            'img' => '/storage/imgCourses/psicologia.jpg',
            'teacher_id' => 2,
        ]);

        Course::create([
            'name' => 'Ciencias Sociales',
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque autem et earum, veniam laudantium impedit placeat voluptatum corporis cum, fugit?",
            'img' => '/storage/imgCourses/sociales.jpg',
            'teacher_id' => 2,
        ]);
    }
}
