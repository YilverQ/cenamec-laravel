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
        /*La fotosíntesis*/
        Module::create([
            'name' => 'Introducción a la fotosíntesis: concepto y definición',
            'description' => 'Curso de Fotosíntesis.',
            'level' => 1,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);
        Module::create([
            'name' => 'Los procesos de la fotosíntesis: fase luminosa y fase oscura',
            'description' => 'Curso de Fotosíntesis.',
            'level' => 2,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);
        Module::create([
            'name' => 'La clorofila y su papel en la fotosíntesis',
            'description' => 'Curso de Fotosíntesis.',
            'level' => 3,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);
        Module::create([
            'name' => 'La importancia de la luz en la fotosíntesis',
            'description' => 'Curso de Fotosíntesis.',
            'level' => 4,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);
        Module::create([
            'name' => 'El ciclo del carbono y la fotosíntesis',
            'description' => 'Curso de Fotosíntesis.',
            'level' => 5,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);
        Module::create([
            'name' => 'Fotosíntesis en los diferentes tipos de plantas',
            'description' => 'Curso de Fotosíntesis.',
            'level' => 6,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);
        Module::create([
            'name' => 'Fotosíntesis y su impacto en la vida terrestre',
            'description' => 'Curso de Fotosíntesis.',
            'level' => 7,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);



        /*El sistema solar*/
        Module::create([
            'name' => 'Introducción al sistema solar: concepto y definición',
            'description' => 'Curso de El Sistema Solar.',
            'level' => 1,
            'teacher_id' => 1,
            'course_id'  => 2,
        ]);
        Module::create([
            'name' => 'El sol: La estrella central del sistema solar',
            'description' => 'Curso de El Sistema Solar.',
            'level' => 2,
            'teacher_id' => 1,
            'course_id'  => 2,
        ]);
        Module::create([
            'name' => 'Los planetas interiores: Mercurio, Venus, Tierra y Marte',
            'description' => 'Curso de El Sistema Solar.',
            'level' => 3,
            'teacher_id' => 1,
            'course_id'  => 2,
        ]);
        Module::create([
            'name' => 'Los planetas exteriores: Júpiter, Saturno, Urano y Neptuno',
            'description' => 'Curso de El Sistema Solar.',
            'level' => 4,
            'teacher_id' => 1,
            'course_id'  => 2,
        ]);



        /*Salvando animales*/
        Module::create([
            'name' => 'Introducción a la conservación de especies',
            'description' => 'Curso de Salvando animales.',
            'level' => 1,
            'teacher_id' => 2,
            'course_id'  => 3,
        ]);
        Module::create([
            'name' => 'Especies en peligro de extinción: causas y consecuencias',
            'description' => 'Curso de Salvando animales.',
            'level' => 2,
            'teacher_id' => 2,
            'course_id'  => 3,
        ]);
        Module::create([
            'name' => 'El papel de los zoológicos y acuarios en la conservación de especies',
            'description' => 'Curso de Salvando animales.',
            'level' => 3,
            'teacher_id' => 2,
            'course_id'  => 3,
        ]);
        Module::create([
            'name' => 'Conservación en la naturaleza: proyectos y estrategias ',
            'description' => 'Curso de Salvando animales.',
            'level' => 4,
            'teacher_id' => 2,
            'course_id'  => 3,
        ]);




        /*Estados de la Materia*/
        Module::create([
            'name' => 'Introducción a los estados de la materia: concepto y definición',
            'description' => 'Estados de la Materia.',
            'level' => 1,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);
        Module::create([
            'name' => 'Estado sólido: características y propiedades',
            'description' => 'Estados de la Materia.',
            'level' => 2,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);
        Module::create([
            'name' => 'Estado líquido: características y propiedades',
            'description' => 'Estados de la Materia.',
            'level' => 3,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);
        Module::create([
            'name' => 'Estado gaseoso: características y propiedades',
            'description' => 'Estados de la Materia.',
            'level' => 4,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);
        Module::create([
            'name' => 'Cambios de estado',
            'description' => 'Estados de la Materia.',
            'level' => 5,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);
    }
}
