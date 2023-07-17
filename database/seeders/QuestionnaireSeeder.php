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
            'ask'    => '¿El sistema solar es un conjunto de?',
            'answer' => "Cuerpos celestes",
            'bad1'   => "Cometas",
            'bad2'   => "Estrellas",
            'bad3'   => "Exoplanetas",
            'level'  => 1,
            'teacher_id'  => 1,
            'module_id'   => 8,
        ]);
        Questionnaire::create([
            'ask'    => '¿El sistema solar se llama así porque tiene un?',
            'answer' => "Sol",
            'bad1'   => "Planeta pequeño",
            'bad2'   => "Planeta enorme",
            'bad3'   => "Cometas",
            'level'  => 2,
            'teacher_id'  => 1,
            'module_id'   => 8,
        ]);
        Questionnaire::create([
            'ask'    => 'En el sistema solar podemos encontrar:',
            'answer' => "Asteroires y cometas",
            'bad1'   => "Agujeros negros",
            'bad2'   => "Muchas estrellas",
            'bad3'   => "Un solo planeta",
            'level'  => 3,
            'teacher_id'  => 1,
            'module_id'   => 8,
        ]);
        Questionnaire::create([
            'ask'    => 'A los grupos de planetas del sistema solar se conocen como:',
            'answer' => "Interiores y exteriores",
            'bad1'   => "Inferiores y superiores",
            'bad2'   => "Profundo y superficial",
            'bad3'   => "Abierto y cerrado",
            'level'  => 4,
            'teacher_id'  => 1,
            'module_id'   => 8,
        ]);

        Questionnaire::create([
            'ask'    => '¿De qué elementos químicos está compuesto el sol?',
            'answer' => "Hidrógeno y Helio",
            'bad1'   => "Oxígeno e Hidrógeno",
            'bad2'   => "Nitrógeno y oxígeno",
            'bad3'   => "Helio y Oxígeno",
            'level'  => 1,
            'teacher_id'  => 1,
            'module_id'   => 9,
        ]);
        Questionnaire::create([
            'ask'    => 'El sol es responsable de: ',
            'answer' => "Mantener la vida en la tierra",
            'bad1'   => "Desastres naturales",
            'bad2'   => "La contaminación",
            'bad3'   => "Erupciones volcánicas",
            'level'  => 2,
            'teacher_id'  => 1,
            'module_id'   => 9,
        ]);
        Questionnaire::create([
            'ask'    => 'Los fenómenos meteorológicos son generados por:',
            'answer' => "El sol",
            'bad1'   => "Marte",
            'bad2'   => "Venus",
            'bad3'   => "Jupiter",
            'level'  => 3,
            'teacher_id'  => 1,
            'module_id'   => 9,
        ]);

        Questionnaire::create([
            'ask'    => '¿Cuáles planetas conforman los Planetas Inferiores?',
            'answer' => "Mercurio, Venus, Tierra y Marte",
            'bad1'   => "Mercurio, Venus, Jupiter y Saturno",
            'bad2'   => "Tierra, Venus, Mercurio y Saturno",
            'bad3'   => "Venus, Marte, Jupiter y Saturno",
            'level'  => 1,
            'teacher_id'  => 1,
            'module_id'   => 10,
        ]);
        Questionnaire::create([
            'ask'    => '¿Qué características tienen los Planetas Inferiores?',
            'answer' => "Son rocosos y superficie sólida",
            'bad1'   => "Son rocosos y superficie gaseosa",
            'bad2'   => "Son de densidad baja",
            'bad3'   => "Son grandes",
            'level'  => 2,
            'teacher_id'  => 1,
            'module_id'   => 10,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál de estos planetas es el más pequeño?',
            'answer' => "Mercurio",
            'bad1'   => "Tierra",
            'bad2'   => "Marte",
            'bad3'   => "Venus",
            'level'  => 3,
            'teacher_id'  => 1,
            'module_id'   => 10,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál de estos planetas tiene una atmósfera densa y tóxica?',
            'answer' => "Venus",
            'bad1'   => "Tierra",
            'bad2'   => "Marte",
            'bad3'   => "Mercurio",
            'level'  => 3,
            'teacher_id'  => 1,
            'module_id'   => 10,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál de los siguientes planeta tiene vida?',
            'answer' => "Tierra",
            'bad1'   => "Venus",
            'bad2'   => "Jupiter",
            'bad3'   => "Urano",
            'level'  => 4,
            'teacher_id'  => 1,
            'module_id'   => 10,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál de los siguientes es el cuarto planeta después del sol?',
            'answer' => "Marte",
            'bad1'   => "Mercurio",
            'bad2'   => "Saturno",
            'bad3'   => "Urano",
            'level'  => 5,
            'teacher_id'  => 1,
            'module_id'   => 10,
        ]);

        Questionnaire::create([
            'ask'    => '¿Cuáles planetas conforman los Planetas Inferiores?',
            'answer' => "Júpiter, Saturno, Urano y Neptuno",
            'bad1'   => "Júpiter, Saturno, Tierra y Neptuno",
            'bad2'   => "Tierra, Venus, Jupiter y Saturno",
            'bad3'   => "Mercurio, Venus, Tierra y Marte",
            'level'  => 1,
            'teacher_id'  => 1,
            'module_id'   => 11,
        ]);
        Questionnaire::create([
            'ask'    => '¿Qué características tienen los Planetas Inferiores?',
            'answer' => "Son gaseosos y una superficie densa",
            'bad1'   => "Son rocosos y superficie sólida",
            'bad2'   => "Son de densidad y masa alta",
            'bad3'   => "Son pequeños",
            'level'  => 2,
            'teacher_id'  => 1,
            'module_id'   => 11,
        ]);
        Questionnaire::create([
            'ask'    => 'Jupiter se caracteriza por ser:',
            'answer' => "Gigante y gaseoso",
            'bad1'   => "Ser rocosos y de superficie sólida",
            'bad2'   => "Por tener un anillo",
            'bad3'   => "Por ser pequeño",
            'level'  => 3,
            'teacher_id'  => 1,
            'module_id'   => 11,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál de los siguientes planetas tiene un hermoso anillo?',
            'answer' => "Saturno",
            'bad1'   => "Jupiter",
            'bad2'   => "Marte",
            'bad3'   => "Neptuno",
            'level'  => 4,
            'teacher_id'  => 1,
            'module_id'   => 11,
        ]);
        Questionnaire::create([
            'ask'    => 'Este planeta tiene un anillo y no es Saturno:',
            'answer' => "Urano",
            'bad1'   => "Neptuno",
            'bad2'   => "Mercurio",
            'bad3'   => "Jupiter",
            'level'  => 5,
            'teacher_id'  => 1,
            'module_id'   => 11,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál es el último planeta después del sol?',
            'answer' => "Neptuno",
            'bad1'   => "Urano",
            'bad2'   => "Mercurio",
            'bad3'   => "Saturno",
            'level'  => 6,
            'teacher_id'  => 1,
            'module_id'   => 11,
        ]);
    }
}
