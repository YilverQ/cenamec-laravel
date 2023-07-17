<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Note;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*YILVER*/
        Note::create([
            'title'       => "El Sistema Solar", 
            'img'         => '/storage/imgNotes/solar01.jpeg',
            'description' => "El sistema solar es un conjunto de cuerpos celestes que giran alrededor de una estrella llamada Sol.", 
            'level'       => 1,
            'teacher_id'  => 1,
            'module_id'   => 8,
        ]);
        Note::create([
            'title'       => "Qué elementos tiene el sistema solar", 
            'img'         => '/storage/imgNotes/solar02.jpeg',
            'description' => "Estos cuerpos celestes incluyen planetas, asteroides, cometas y otros objetos más pequeños.", 
            'level'       => 2,
            'teacher_id'  => 1,
            'module_id'   => 8,
        ]);
        Note::create([
            'title'       => "Grupos de planetas del sistema solar", 
            'img'         => '/storage/imgNotes/solar03.jpeg',
            'description' => "Los planetas del sistema solar se dividen en dos grupos: los planetas interiores (Mercurio, Venus, Tierra y Marte) y los planetas exteriores (Júpiter, Saturno, Urano y Neptuno).", 
            'level'       => 3,
            'teacher_id'  => 1,
            'module_id'   => 8,
        ]);

        Note::create([
            'title'       => "Definición del sol", 
            'img'         => '/storage/imgNotes/solar04.jpeg',
            'description' => "El sol es una estrella que se encuentra en el centro del sistema solar. Es una esfera casi perfecta compuesta mayormente de hidrógeno y helio.", 
            'level'       => 1,
            'teacher_id'  => 1,
            'module_id'   => 9,
        ]);
        Note::create([
            'title'       => "Función del sol en el sistema solar", 
            'img'         => '/storage/imgNotes/solar05.jpeg',
            'description' => "El sol es la fuente de luz y calor que mantiene la vida en la Tierra y otros planetas del sistema solar. La atracción gravitacional del sol mantiene a los planetas en sus órbitas y permite que la vida se desarrolle en la Tierra. Además, el sol es responsable de los fenómenos meteorológicos en la Tierra, como el clima y las estaciones.", 
            'level'       => 2,
            'teacher_id'  => 1,
            'module_id'   => 9,
        ]);

        Note::create([
            'title'       => "Definición de los planetas interiores", 
            'img'         => '/storage/imgNotes/solar06.jpeg',
            'description' => "Los planetas interiores son los que se encuentran más cerca del Sol y son los más pequeños del sistema solar. Incluyen a Mercurio, Venus, Tierra y Marte. Se diferencian de los planetas exteriores por su tamaño, composición y ubicación en el sistema solar.", 
            'level'       => 1,
            'teacher_id'  => 1,
            'module_id'   => 10,
        ]);
        Note::create([
            'title'       => "Características generales", 
            'img'         => '/storage/imgNotes/solar07.jpeg',
            'description' => "Los planetas interiores son rocosos y tienen una superficie sólida. Son más pequeños que los planetas exteriores y tienen una masa y densidad más elevadas. Todos los planetas interiores tienen cráteres, montañas y cañones, y están compuestos principalmente de rocas y metales. También tienen atmósferas más delgadas que los planetas exteriores.", 
            'level'       => 2,
            'teacher_id'  => 1,
            'module_id'   => 10,
        ]);
        Note::create([
            'title'       => "Mercurio", 
            'img'         => '/storage/imgNotes/solar08.jpeg',
            'description' => "Mercurio es el planeta más cercano al Sol. Es el planeta más pequeño del sistema solar y no tiene atmósfera significativa. Su superficie está cubierta de cráteres y escarpadas montañas. Debido a su proximidad al Sol, Mercurio tiene temperaturas extremas, que pueden llegar a los 430 grados Celsius durante el día y caer a los -180 grados Celsius durante la noche.", 
            'level'       => 3,
            'teacher_id'  => 1,
            'module_id'   => 10,
        ]);
        Note::create([
            'title'       => "Venus", 
            'img'         => '/storage/imgNotes/solar09.jpeg',
            'description' => "Venus es el segundo planeta desde el Sol y es conocido como el planeta hermano de la Tierra debido a su tamaño y composición similares. Su atmósfera densa y tóxica compuesta principalmente de dióxido de carbono, provoca un efecto invernadero descontrolado que hace que su superficie sea extremadamente caliente, con temperaturas que pueden superar los 470 grados Celsius. Su superficie está cubierta de cráteres, volcanes y llanuras.", 
            'level'       => 4,
            'teacher_id'  => 1,
            'module_id'   => 10,
        ]);
        Note::create([
            'title'       => "Tierra", 
            'img'         => '/storage/imgNotes/solar10.jpeg',
            'description' => "La Tierra es el tercer planeta desde el Sol y es el único planeta conocido que tiene vida. Tiene una atmósfera rica en oxígeno y agua líquida en su superficie, lo que la hace única en el sistema solar. La Tierra tiene una temperatura media de 15 grados Celsius y su superficie está cubierta por océanos y continentes. También tiene una gran cantidad de vida, incluyendo animales, plantas y microorganismos.", 
            'level'       => 5,
            'teacher_id'  => 1,
            'module_id'   => 10,
        ]);
        Note::create([
            'title'       => "Marte", 
            'img'         => '/storage/imgNotes/solar11.jpeg',
            'description' => "Marte es el cuarto planeta desde el Sol y es conocido como el planeta rojo debido a su color rojizo característico. Tiene una atmósfera delgada compuesta principalmente de dióxido de carbono. Marte tiene una superficie árida y rocosa, con cráteres, montañas y valles. También tiene dos montañas gigantes llamadas Olympus Mons y Tharsis Montes, que son las más grandes del sistema solar.", 
            'level'       => 6,
            'teacher_id'  => 1,
            'module_id'   => 10,
        ]);


        Note::create([
            'title'       => "Definición de los planetas exteriores", 
            'img'         => '/storage/imgNotes/solar12.jpeg',
            'description' => "Los planetas exteriores son los que se encuentran más lejos del Sol y son los más grandes del sistema solar. Incluyen a Júpiter, Saturno, Urano y Neptuno. Se diferencian de los planetas interiores por su tamaño, composición y ubicación en el sistema solar.", 
            'level'       => 1,
            'teacher_id'  => 1,
            'module_id'   => 11,
        ]);
        Note::create([
            'title'       => "Características generales", 
            'img'         => '/storage/imgNotes/solar13.jpeg',
            'description' => "Los planetas exteriores son gaseosos y tienen una atmósfera muy densa. Son más grandes que los planetas interiores y tienen una masa y densidad mucho más bajas. Todos los planetas exteriores tienen anillos y muchas lunas. Además, tienen un gran número de tormentas y vientos fuertes.", 
            'level'       => 2,
            'teacher_id'  => 1,
            'module_id'   => 11,
        ]);
        Note::create([
            'title'       => "Júpiter", 
            'img'         => '/storage/imgNotes/solar14.jpeg',
            'description' => "Júpiter es el planeta más grande del sistema solar. Tiene una atmósfera muy densa compuesta principalmente de hidrógeno y helio, con nubes de amoníaco y metano. Júpiter tiene un gran número de lunas, incluyendo las cuatro lunas más grandes llamadas Io, Europa, Ganímedes y Calisto. También tiene una gran mancha roja en su atmósfera, que es una tormenta gigante.", 
            'level'       => 3,
            'teacher_id'  => 1,
            'module_id'   => 11,
        ]);
        Note::create([
            'title'       => "Saturno", 
            'img'         => '/storage/imgNotes/solar15.jpeg',
            'description' => "Saturno es el segundo planeta más grande del sistema solar. Tiene una atmósfera similar a la de Júpiter, compuesta principalmente de hidrógeno y helio. Saturno es famoso por sus espectaculares anillos, que están compuestos principalmente de hielo y roca. Tiene decenas de lunas, incluyendo la luna más grande llamada Titán.", 
            'level'       => 4,
            'teacher_id'  => 1,
            'module_id'   => 11,
        ]);
        Note::create([
            'title'       => "Urano", 
            'img'         => '/storage/imgNotes/solar16.jpeg',
            'description' => "Urano es el tercer planeta más grande del sistema solar. Tiene una atmósfera compuesta principalmente de hidrógeno y helio, con nubes de metano. Urano es único en el sistema solar porque gira sobre su lado, lo que significa que su polo norte y sur apuntan hacia el Sol en lugar de su ecuador. Tiene 27 lunas conocidas.", 
            'level'       => 5,
            'teacher_id'  => 1,
            'module_id'   => 11,
        ]);
        Note::create([
            'title'       => "Neptuno", 
            'img'         => '/storage/imgNotes/solar17.jpeg',
            'description' => "Neptuno es el cuarto planeta más grande del sistema solar y es el último después del sol. Tiene una atmósfera similar a la de Urano, compuesta principalmente de hidrógeno y helio, con nubes de metano. Tiene un gran número de lunas, incluyendo la luna más grande llamada Tritón. Neptuno también tiene una gran mancha oscura en su atmósfera, que es una tormenta gigante similar a la mancha roja de Júpiter.", 
            'level'       => 6,
            'teacher_id'  => 1,
            'module_id'   => 11,
        ]);
    }
}
