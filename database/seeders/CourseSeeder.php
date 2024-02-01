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
        /*La fotosíntesis: La transformación de luz en energía.*/
        Course::create([
            'name'    => 'La fotosíntesis: La transformación de luz en energía.',
            'purpose' => "En este curso, los estudiantes explorarán el proceso de la fotosíntesis, una de las principales formas en las que las plantas y otros organismos transforman la luz solar en energía. Aprenderán sobre los componentes y etapas de la fotosíntesis, así como los factores que influyen en su eficiencia. ¡Únete a nosotros en un apasionante viaje para comprender cómo las plantas obtienen su energía!",
            'general_objetive' => 'Promover la comprensión y el interés por la ciencia en los niños y adolescentes a través del estudio y exploración de la fotosíntesis como un proceso fundamental en los seres vivos.',
            'specific_objetive' => '1. Familiarizar a los estudiantes con los componentes y etapas de la fotosíntesis, así como sus principales reacciones químicas y sus implicaciones en los seres vivos.

2. Desarrollar la comprensión de conceptos científicos relacionados con la fotosíntesis, como la clorofila, los pigmentos fotosintéticos, los orgánulos celulares involucrados y los factores ambientales que afectan su funcionamiento.

3. Promover el pensamiento crítico y la capacidad de análisis al evaluar la importancia de la fotosíntesis en el ciclo de vida de los seres vivos y su relación con otros procesos biológicos.

4. Fomentar la curiosidad científica y la investigación a través de la búsqueda y el análisis de información sobre la fotosíntesis, incluyendo su evolución y su aplicabilidad en diversas áreas científicas.

5. Estimular la creatividad y la imaginación al permitir a los estudiantes desarrollar actividades prácticas relacionadas con la fotosíntesis, como experimentos que demuestren sus conceptos y aplicaciones.

6. Alentar la participación activa y la colaboración en actividades grupales relacionadas con la ciencia y la fotosíntesis, promoviendo el intercambio de ideas y la construcción colectiva de conocimiento.

7. Desarrollar habilidades de comunicación verbal y escrita al presentar información sobre la fotosíntesis de forma clara y precisa, utilizando un lenguaje científico adecuado y estructurando las ideas de manera coherente.

8. Fomentar la conciencia y el respeto por la naturaleza y la importancia de la fotosíntesis en la producción de alimentos, la regulación del clima y la generación de oxígeno, entre otros aspectos clave para la vida en la Tierra.',
            'competence' => '1. Conocimiento científico: Al finalizar el curso, los estudiantes deberán tener un conocimiento sólido sobre el proceso de la fotosíntesis, incluyendo sus componentes, etapas y reacciones químicas involucradas, así como su importancia en los seres vivos.

2. Pensamiento crítico: Los estudiantes deberán ser capaces de analizar y evaluar la información relacionada con la fotosíntesis, comprendiendo su papel en el ecosistema y su relación con otros procesos biológicos.

3. Habilidades de investigación: Los estudiantes deberán ser capaces de llevar a cabo investigaciones sobre la fotosíntesis, utilizando diversas fuentes de información y evaluando la confiabilidad y relevancia de los datos obtenidos.

4. Habilidades de comunicación: Los estudiantes deberán ser capaces de comunicar de manera clara y precisa los conocimientos adquiridos sobre la fotosíntesis, tanto oralmente como por escrito, utilizando un lenguaje científico adecuado y estructurando sus ideas de manera coherente.

5. Creatividad e imaginación: Los estudiantes deberán ser capaces de utilizar su creatividad e imaginación para desarrollar actividades prácticas y representaciones visuales que demuestren y expliquen el proceso de la fotosíntesis de manera efectiva.

6. Conciencia ambiental: Los estudiantes deberán adquirir una conciencia y un respeto por la naturaleza, comprendiendo la importancia de la fotosíntesis en la producción de alimentos, la regulación del clima y la generación de oxígeno, entre otros aspectos cruciales para la vida en la Tierra.',
            'disabled' => true,
            'img'     => '/img/public/imgCourses/fotosintesis.jpeg',
        ]);




        

        /*El sistema solar: un viaje por el espacio*/
        Course::create([
            'name' => 'El sistema solar: un viaje por el espacio',
            'purpose' => "En este curso, los estudiantes explorarán el fascinante mundo de los planetas en nuestro sistema solar. Conocerás los ocho planetas principales: Mercurio, Venus, Tierra, Marte, Júpiter, Saturno, Urano y Neptuno. Aprenderán sobre las características de cada planeta, como su tamaño, su atmósfera, su temperatura y su distancia del sol. ¡Únete a nosotros en un emocionante viaje a través del sistema solar!",
            'general_objetive' => 'Promover el interés y la comprensión de la ciencia en los niños y adolescentes a través del estudio y exploración del sistema solar.',
            'specific_objetive' => '1. Familiarizar a los estudiantes con los ocho planetas principales del sistema solar y sus características individuales.

    2. Desarrollar la comprensión de conceptos científicos relacionados con el sistema solar, como la gravedad, la órbita y la composición de los planetas.

    3. Promover el pensamiento crítico y la capacidad de análisis al explorar las diferencias y similitudes entre los planetas del sistema solar.

    4. Fomentar la curiosidad científica y la investigación a través de la búsqueda y el análisis de información sobre el sistema solar.

    5. Estimular la creatividad y la imaginación al permitir a los estudiantes crear representaciones visuales y modelos del sistema solar.

    6. Alentar la participación activa y la colaboración en actividades grupales relacionadas con la ciencia y el sistema solar.

    7. Desarrollar habilidades de comunicación verbal y escrita al presentar información sobre el sistema solar de forma clara y concisa.

    8. Fomentar la conciencia y el respeto por el medio ambiente y la importancia de la preservación y conservación de nuestro planeta Tierra.
',
            'competence' => '1. Conocimiento científico: Al concluir el curso, el estudiante deberá tener un conocimiento sólido sobre el sistema solar, incluyendo los planetas principales, sus características y conceptos científicos relacionados.

            2. Pensamiento crítico: El estudiante deberá ser capaz de analizar y evaluar información relacionada con el sistema solar, comparando y contrastando diferentes aspectos de los planetas y aplicando conceptos científicos para comprender su funcionamiento.

            3. Habilidades de investigación: El estudiante deberá ser capaz de llevar a cabo investigaciones independientes sobre el sistema solar, utilizando diversas fuentes de información y evaluando la confiabilidad y relevancia de los datos obtenidos.

            4. Habilidades de comunicación: El estudiante deberá ser capaz de comunicar de manera clara y concisa los conocimientos adquiridos sobre el sistema solar, tanto de forma oral como escrita, utilizando un lenguaje científico adecuado y estructurando sus ideas de manera coherente.

            5. Creatividad e imaginación: El estudiante deberá ser capaz de utilizar su creatividad e imaginación para representar visualmente el sistema solar, ya sea a través de dibujos, maquetas u otras representaciones artísticas, mostrando un entendimiento profundo de los elementos que lo conforman.

            6. Conciencia ambiental: El estudiante deberá adquirir una conciencia y un respeto por el medio ambiente, comprendiendo la importancia de la preservación y conservación de nuestro planeta Tierra y su relación con el sistema solar.',
            'disabled' => true,
            'img' => '/img/public/imgCourses/solar.jpeg',
        ]);






        /*Salvando animales: la importancia de la conservación.*/
        Course::create([
            'name' => 'Salvando animales: la importancia de la conservación.',
            'purpose' => "En este curso, los estudiantes explorarán la importancia de la conservación de las especies animales, comprendiendo las causas y consecuencias de la extinción de especies. Aprenderán sobre el papel de los zoológicos y acuarios en la conservación, así como los proyectos y estrategias utilizados para preservar la biodiversidad en la naturaleza. Únete a nosotros para aprender cómo podemos contribuir a salvar animales y proteger nuestro medio ambiente.",
            'general_objetive' => 'Promover la conciencia y el valor de la conservación de especies animales y su importancia para mantener la biodiversidad y el equilibrio ecológico.',
            'specific_objetive' => '1. Familiarizar a los estudiantes con conceptos clave relacionados con la conservación de especies, como la biodiversidad, el hábitat y la cadena alimentaria.

2. Comprender las causas y consecuencias de la extinción de especies, incluyendo la destrucción del hábitat, la caza furtiva y el cambio climático.

3. Analizar el papel de los zoológicos y acuarios en la conservación de especies animales, incluyendo la reproducción en cautiverio y los programas de reintroducción.

4. Fomentar la empatía y la responsabilidad hacia los animales, promoviendo actitudes y acciones que contribuyan a su conservación.',
            'competence' => '1. Conocimiento científico: Al finalizar el curso, los estudiantes deberán tener un conocimiento sólido sobre la importancia de la conservación de especies, incluyendo las causas y consecuencias de la extinción y el papel de los zoológicos y acuarios en la conservación.

2. Pensamiento crítico: Los estudiantes deberán ser capaces de analizar y evaluar la información relacionada con la conservación de especies, comprendiendo su impacto en el ecosistema y la necesidad de tomar medidas para proteger la biodiversidad.

3. Habilidades de investigación: Los estudiantes deberán ser capaces de llevar a cabo investigaciones sobre especies en peligro de extinción y los esfuerzos de conservación, utilizando diversas fuentes de información y evaluando la confiabilidad y relevancia de los datos obtenidos.

4. Habilidades de comunicación: Los estudiantes deberán ser capaces de comunicar de manera clara y precisa los conocimientos adquiridos sobre la conservación de especies, tanto oralmente como por escrito, utilizando un lenguaje adecuado y estructurando sus ideas de manera coherente.

5. Creatividad e imaginación: Los estudiantes deberán ser capaces de utilizar su creatividad e imaginación para desarrollar actividades prácticas y representaciones visuales que demuestren y expliquen la importancia de la conservación de especies de manera efectiva.

6. Conciencia ambiental: Los estudiantes deberán adquirir una conciencia y un respeto por la naturaleza, comprendiendo la importancia de la conservación de especies para la preservación de la biodiversidad y la protección del medio ambiente.',
            'disabled' => true,
            'img' => '/img/public/imgCourses/conservacion.jpeg',
        ]);






        /*Los estados de la materia y sus propiedades*/
        Course::create([
            'name' => 'Los estados de la materia y sus propiedades',
            'purpose' => "En este curso, los estudiantes explorarán los diferentes estados de la materia y sus propiedades, comprendiendo cómo se pueden transformar de un estado a otro. Aprenderán sobre las características y propiedades de los estados sólido, líquido y gaseoso, así como los cambios de estado que pueden ocurrir.",
            'img' => '/img/public/imgCourses/estados.jpeg',
            'general_objetive' => 'Promover el conocimiento y la comprensión de los diferentes estados de la materia y sus propiedades, así como de los cambios de estado, para poder aplicar este conocimiento en diversos contextos.',
            'specific_objetive' => '1. Introducir y definir los conceptos clave relacionados con los estados de la materia, como sólido, líquido y gaseoso.

2. Describir las características y propiedades del estado sólido, incluyendo la forma y la estructura de las moléculas, y cómo afecta a las propiedades físicas.

3. Explorar las características y propiedades del estado líquido, incluyendo la capacidad de fluir y adaptarse a la forma de su recipiente.

4. Investigar las características y propiedades del estado gaseoso, incluyendo la alta capacidad de expansión y la falta de forma y volumen definido.

5. Comprender los cambios de estado que pueden ocurrir entre los diferentes estados de la materia, como la fusión, solidificación, evaporación, condensación y sublimación.',
            'competence' => '1. Conocimiento científico: Al finalizar el curso, los estudiantes deberán tener un conocimiento sólido sobre los diferentes estados de la materia, sus características y propiedades, así como los cambios de estado que pueden ocurrir.

2. Pensamiento crítico: Los estudiantes deberán ser capaces de analizar y evaluar la información relacionada con los estados de la materia, comprendiendo su importancia en distintos contextos científicos y cotidianos.

3. Habilidades de investigación: Los estudiantes deberán ser capaces de llevar a cabo investigaciones sobre los estados de la materia y sus propiedades, utilizando diversas fuentes de información y evaluando la confiabilidad y relevancia de los datos obtenidos.

4. Habilidades de comunicación: Los estudiantes deberán ser capaces de comunicar de manera clara y precisa los conocimientos adquiridos sobre los estados de la materia, tanto oralmente como por escrito, utilizando un lenguaje adecuado y estructurando sus ideas de manera coherente.

5. Creatividad e imaginación: Los estudiantes deberán ser capaces de utilizar su creatividad e imaginación para desarrollar actividades prácticas y ejemplos que demuestren y expliquen las características y propiedades de los diferentes estados de la materia de manera efectiva.

6. Conciencia científica: Los estudiantes deberán adquirir una conciencia y un respeto por la importancia de los estados de la materia en diversos ámbitos científicos y cotidianos, comprendiendo su papel en fenómenos naturales y tecnológicos.',
            'disabled' => true,
        ]);
    }
}
