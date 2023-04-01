<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Questionnaire;

class QuestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*YILVER*/
        Questionnaire::create([
            'ask'    => '¿De que color es el cielo?',
            'answer' => "Azul",
            'bad1'   => "Rojo",
            'bad2'   => "Verde",
            'bad3'   => "Violeta",
            'teacher_id'  => 1,
            'module_id'   => 1,
        ]);

        Questionnaire::create([
            'ask'    => '¿De que color es el agua?',
            'answer' => "Azul",
            'bad1'   => "Rojo",
            'bad2'   => "Verde",
            'bad3'   => "Violeta",
            'teacher_id'  => 1,
            'module_id'   => 1,
        ]);


        Questionnaire::create([
            'ask'    => 'Las plantas son...',
            'answer' => "Seres vivos",
            'bad1'   => "Plasticas",
            'bad2'   => "Juguetes",
            'bad3'   => "Falsas",
            'teacher_id'  => 1,
            'module_id'   => 2,
        ]);

        Questionnaire::create([
            'ask'    => 'La química es una...',
            'answer' => "Ciencia",
            'bad1'   => "Arte plástica",
            'bad2'   => "Condición",
            'bad3'   => "Canción",
            'teacher_id'  => 1,
            'module_id'   => 2,
        ]);

        Questionnaire::create([
            'ask'    => '¿Qué nos aporta los avances de la química?',
            'answer' => "Medicina",
            'bad1'   => "Videojuegos",
            'bad2'   => "Enfermedades",
            'bad3'   => "Gravedad",
            'teacher_id'  => 1,
            'module_id'   => 2,
        ]);


        Questionnaire::create([
            'ask'    => '¿La gravedad fue descubierta por?',
            'answer' => "Isac Newtom",
            'bad1'   => "Steve Jobs",
            'bad2'   => "Albert Ainsten",
            'bad3'   => "Cristiano Ronaldo",
            'teacher_id'  => 1,
            'module_id'   => 3,
        ]);



        /*Vanessa*/
        Questionnaire::create([
            'ask'    => '¿De que color es el cielo?',
            'answer' => "Azul",
            'bad1'   => "Rojo",
            'bad2'   => "Verde",
            'bad3'   => "Violeta",
            'teacher_id'  => 2,
            'module_id'   => 1,
        ]);

        Questionnaire::create([
            'ask'    => '¿De que color es el agua?',
            'answer' => "Azul",
            'bad1'   => "Rojo",
            'bad2'   => "Verde",
            'bad3'   => "Violeta",
            'teacher_id'  => 2,
            'module_id'   => 1,
        ]);


        Questionnaire::create([
            'ask'    => 'Las plantas son...',
            'answer' => "Seres vivos",
            'bad1'   => "Plasticas",
            'bad2'   => "Juguetes",
            'bad3'   => "Falsas",
            'teacher_id'  => 2,
            'module_id'   => 2,
        ]);

        Questionnaire::create([
            'ask'    => 'La química es una...',
            'answer' => "Ciencia",
            'bad1'   => "Arte plástica",
            'bad2'   => "Condición",
            'bad3'   => "Canción",
            'teacher_id'  => 2,
            'module_id'   => 2,
        ]);

        Questionnaire::create([
            'ask'    => '¿Qué nos aporta los avances de la química?',
            'answer' => "Medicina",
            'bad1'   => "Videojuegos",
            'bad2'   => "Enfermedades",
            'bad3'   => "Gravedad",
            'teacher_id'  => 2,
            'module_id'   => 2,
        ]);


        Questionnaire::create([
            'ask'    => '¿La gravedad fue descubierta por?',
            'answer' => "Isac Newtom",
            'bad1'   => "Steve Jobs",
            'bad2'   => "Albert Ainsten",
            'bad3'   => "Cristiano Ronaldo",
            'teacher_id'  => 2,
            'module_id'   => 3,
        ]);
    }
}
