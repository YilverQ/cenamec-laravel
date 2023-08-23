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
            'name'    => 'La fotosíntesis: La transformación de luz en energía.',
            'purpose' => "En este curso, los estudiantes aprenderán sobre uno de los procesos más importantes de la naturaleza: la fotosíntesis. Este curso es ideal para personas que quieran entender mejor cómo funciona la vida en nuestro planeta y cómo las plantas son fundamentales para mantener el equilibrio ecológico.",
            'general_objetive' => 'Proposito General del Curso en cuestión',
            'specific_objetive' => 'Objetivos especifícos del curso en cuestión',
            'competence' => 'Competencias que debería adquirir el estudiante',
            'disabled' => true,
            'img'     => '/storage/imgCourses/fotosintesis.jpeg',
        ]);

        Course::create([
            'name' => 'El sistema solar: un viaje por el espacio',
            'purpose' => "En este curso, los estudiantes explorarán el fascinante mundo de los planetas en nuestro sistema solar. Conocerás los ocho planetas principales: Mercurio, Venus, Tierra, Marte, Júpiter, Saturno, Urano y Neptuno. Aprenderán sobre las características de cada planeta, como su tamaño, su atmósfera, su temperatura y su distancia del sol. ¡Únete a nosotros en un emocionante viaje a través del sistema solar!",
            'general_objetive' => 'Proposito General del Curso en cuestión',
            'specific_objetive' => 'Objetivos especifícos del curso en cuestión',
            'competence' => 'Competencias que debería adquirir el estudiante',
            'disabled' => true,
            'img' => '/storage/imgCourses/solar.jpeg',
        ]);


        /*Vanessa*/
        Course::create([
            'name' => 'Salvando animales: la importancia de la conservación.',
            'purpose' => "En este curso, los estudiantes explorarán el fascinante mundo de los animales en peligro de extinción y la importancia de la conservación de especies. Aquí conocerás sobre el papel de los zoológicos y acuarios en la conservación de especies y cómo pueden ayudar ellos mismos.",
            'general_objetive' => 'Proposito General del Curso en cuestión',
            'specific_objetive' => 'Objetivos especifícos del curso en cuestión',
            'competence' => 'Competencias que debería adquirir el estudiante',
            'disabled' => true,
            'img' => '/storage/imgCourses/conservacion.jpeg',
        ]);

        Course::create([
            'name' => 'Los estados de la materia y sus propiedades',
            'purpose' => "En este curso, los estudiantes explorarán los diferentes estados de la materia y las propiedades que los definen. Los estudiantes conocerán los tres estados principales de la materia: sólido, líquido y gas. Aprenderán sobre las características de cada estado y también descubrirán cómo pueden cambiar de un estado a otro.",
            'img' => '/storage/imgCourses/estados.jpeg',
            'general_objetive' => 'Proposito General del Curso en cuestión',
            'specific_objetive' => 'Objetivos especifícos del curso en cuestión',
            'competence' => 'Competencias que debería adquirir el estudiante',
            'disabled' => true,
        ]);
    }
}
