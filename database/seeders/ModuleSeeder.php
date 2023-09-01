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
            'description' => 'En este módulo, los estudiantes se familiarizarán con el concepto y la definición de la fotosíntesis, comprendiendo su importancia en los seres vivos. Aprenderán sobre cómo las plantas y otros organismos transforman la luz solar en energía y los procesos involucrados en este fascinante fenómeno.',
            'level' => 1,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);
        Module::create([
            'name' => 'Los procesos de la fotosíntesis: fase luminosa y fase oscura',
            'description' => 'En este módulo, los estudiantes explorarán las etapas de la fotosíntesis, profundizando en la fase luminosa y la fase oscura. Aprenderán sobre las reacciones químicas y los orgánulos celulares involucrados en cada etapa, comprendiendo cómo se produce y se transforma la energía durante la fotosíntesis.',
            'level' => 2,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);
        Module::create([
            'name' => 'La clorofila y su papel en la fotosíntesis',
            'description' => 'En este módulo, los estudiantes descubrirán el papel fundamental de la clorofila en el proceso de la fotosíntesis. Aprenderán sobre los diferentes pigmentos fotosintéticos presentes en las plantas, comprendiendo cómo la clorofila absorbe la luz solar y la convierte en energía química.',
            'level' => 3,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);
        Module::create([
            'name' => 'La importancia de la luz en la fotosíntesis',
            'description' => 'En este módulo, los estudiantes explorarán el papel crucial de la luz en la fotosíntesis. Aprenderán sobre los diferentes tipos de luz que las plantas utilizan para llevar a cabo este proceso, comprendiendo cómo la intensidad, el espectro y la duración de la luz afectan la eficiencia de la fotosíntesis.',
            'level' => 4,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);
        Module::create([
            'name' => 'El ciclo del carbono y la fotosíntesis',
            'description' => 'En este módulo, los estudiantes analizarán la relación entre la fotosíntesis y el ciclo del carbono. Aprenderán sobre cómo las plantas toman dióxido de carbono del aire y lo convierten en glucosa durante la fotosíntesis, comprendiendo cómo este proceso es esencial para el equilibrio del carbono en la atmósfera.',
            'level' => 5,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);
        Module::create([
            'name' => 'Fotosíntesis en los diferentes tipos de plantas',
            'description' => 'En este módulo, los estudiantes explorarán cómo la fotosíntesis se lleva a cabo en varios tipos de plantas, incluyendo plantas terrestres, acuáticas, epífitas y parasitarias. Aprenderán sobre las adaptaciones y estrategias específicas que cada tipo de planta ha desarrollado para realizar la fotosíntesis en su entorno particular.',
            'level' => 6,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);
        Module::create([
            'name' => 'Fotosíntesis y su impacto en la vida terrestre',
            'description' => 'En este módulo, los estudiantes reflexionarán sobre el impacto de la fotosíntesis en la vida terrestre. Aprenderán sobre cómo la fotosíntesis es fundamental para la producción de alimentos, la regulación del clima y la generación de oxígeno, comprendiendo la importancia de este proceso en la sustentabilidad y la supervivencia de los seres vivos en nuestro planeta.',
            'level' => 7,
            'teacher_id' => 1,
            'course_id'  => 1,
        ]);







        /*El sistema solar*/
        Module::create([
            'name' => 'Introducción al sistema solar: concepto y definición',
            'description' => 'En este módulo introductorio, se explorará el concepto y la definición del sistema solar. Se discutirá la composición y estructura general del sistema solar, así como su importancia en la comprensión del universo. Los estudiantes aprenderán sobre la naturaleza de los cuerpos celestes dentro del sistema solar y las principales características que los distinguen de otras formaciones astronómicas.',
            'level' => 1,
            'teacher_id' => 1,
            'course_id'  => 2,
        ]);
        Module::create([
            'name' => 'El sol: La estrella central del sistema solar',
            'description' => 'En este módulo, se analizará la estrella central del sistema solar: el sol. Los estudiantes explorarán su composición, estructura y características físicas. Se abordará la importancia del sol como fuente de calor y luz para los planetas, así como la influencia que tiene en el clima y las condiciones de vida en la Tierra. También se discutirán los fenómenos solares, como las manchas solares y las erupciones solares, y su impacto en nuestro planeta.',
            'level' => 2,
            'teacher_id' => 1,
            'course_id'  => 2,
        ]);
        Module::create([
            'name' => 'Los planetas interiores: Mercurio, Venus, Tierra y Marte',
            'description' => 'En este módulo, se estudiarán los planetas interiores del sistema solar: Mercurio, Venus, la Tierra y Marte. Los estudiantes aprenderán sobre la composición, estructura y características de cada uno de estos planetas. Se analizarán las condiciones geológicas y atmosféricas, así como la posibilidad de vida en cada uno de ellos. También se abordarán las misiones espaciales que han estudiado estos planetas y los descubrimientos realizados hasta el momento.',
            'level' => 3,
            'teacher_id' => 1,
            'course_id'  => 2,
        ]);
        Module::create([
            'name' => 'Los planetas exteriores: Júpiter, Saturno, Urano y Neptuno',
            'description' => 'En este último módulo, se explorarán los planetas exteriores del sistema solar: Júpiter, Saturno, Urano y Neptuno. Los estudiantes conocerán la composición, estructura y características de estos gigantes gaseosos. Se discutirá la presencia de anillos y lunas a su alrededor, así como los fenómenos atmosféricos más destacados, como las tormentas y los vórtices. También se abordarán las misiones espaciales que han estudiado estos planetas y los datos obtenidos.',
            'level' => 4,
            'teacher_id' => 1,
            'course_id'  => 2,
        ]);








        /*Salvando animales*/
        Module::create([
            'name' => 'Introducción a la conservación de especies',
            'description' => 'En este módulo educativo, los participantes aprenderán los conceptos básicos de la conservación de especies y su importancia para el equilibrio del ecosistema. Se abordarán temas como la biodiversidad, la interdependencia de las especies y el impacto de la acción humana en la pérdida de biodiversidad. Además, se explorarán las diferentes estrategias y métodos utilizados en la conservación de especies.',
            'level' => 1,
            'teacher_id' => 2,
            'course_id'  => 3,
        ]);
        Module::create([
            'name' => 'Especies en peligro de extinción: causas y consecuencias',
            'description' => 'En este módulo, se analizarán en profundidad las causas y consecuencias de la extinción de especies. Se examinarán los factores que amenazan a las especies, como la destrucción del hábitat, el cambio climático y la caza furtiva. Los participantes comprenderán las implicaciones ecológicas y socioeconómicas de la pérdida de especies, así como los esfuerzos necesarios para prevenir su extinción.',
            'level' => 2,
            'teacher_id' => 2,
            'course_id'  => 3,
        ]);
        Module::create([
            'name' => 'El papel de los zoológicos y acuarios en la conservación de especies',
            'description' => 'En este módulo, se explorará cómo los zoológicos y acuarios desempeñan un papel fundamental en la conservación de especies. Los participantes aprenderán sobre los programas de reproducción en cautiverio, la educación ambiental y el apoyo a la investigación científica que realizan estos lugares. También se discutirán los desafíos éticos y las críticas asociadas a la tenencia de animales en cautiverio.',
            'level' => 3,
            'teacher_id' => 2,
            'course_id'  => 3,
        ]);
        Module::create([
            'name' => 'Conservación en la naturaleza: proyectos y estrategias',
            'description' => 'En este último módulo, se examinarán los proyectos y estrategias implementadas para la conservación de especies en su entorno natural. Se analizarán casos de éxito en la reintroducción de especies en peligro de extinción, la restauración y protección de hábitats, así como la gestión de áreas protegidas. Los participantes también aprenderán sobre la importancia de la colaboración entre organizaciones y comunidades para lograr resultados efectivos en la conservación de especies.',
            'level' => 4,
            'teacher_id' => 2,
            'course_id'  => 3,
        ]);








        /*Estados de la Materia*/
        Module::create([
            'name' => 'Introducción a los estados de la materia: concepto y definición',
            'description' => 'En este módulo, aprenderás los fundamentos básicos de los estados de la materia. Comenzarás comprendiendo qué es la materia y su importancia en el estudio de la ciencia. Luego, explorarás los conceptos clave de los estados de la materia, como sólido, líquido y gaseoso, y entenderás cómo se diferencian entre sí. Además, se te brindará una definición clara de cada estado de la materia y se discutirán ejemplos prácticos para facilitar su comprensión.',
            'level' => 1,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);
        Module::create([
            'name' => 'Estado sólido: características y propiedades',
            'description' => 'En este módulo, te adentrarás en el estudio específico del estado sólido. Aprenderás sobre las características distintivas de este estado, como su rigidez y forma definida, así como su capacidad de mantener su volumen constante. También explorarás las propiedades de los sólidos, como su densidad, conductividad térmica y eléctrica, y su resistencia a los cambios de forma y volumen. A través de ejemplos y experimentos, comprenderás mejor cómo se comporta la materia en estado sólido.',
            'level' => 2,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);
        Module::create([
            'name' => 'Estado líquido: características y propiedades',
            'description' => 'En este módulo, explorarás a fondo el estado líquido. Conocerás las características principales de los líquidos, como su capacidad para fluir y adaptarse a la forma del recipiente que los contiene. Además, se analizarán las propiedades específicas de los líquidos, como su viscosidad, tensión superficial y capacidad de difusión. A través de experimentos y situaciones cotidianas, comprenderás cómo los líquidos interactúan con su entorno y cómo estas propiedades afectan su comportamiento.',
            'level' => 3,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);
        Module::create([
            'name' => 'Estado gaseoso: características y propiedades',
            'description' => 'En este módulo, te sumergirás en el estado gaseoso de la materia. Aprenderás sobre las características distintivas de los gases, como su alta capacidad de expansión y compresibilidad, así como su tendencia a ocupar todo el volumen disponible. También explorarás las propiedades de los gases, como su presión, temperatura y volumen, y cómo estas propiedades se relacionan entre sí según la ley de los gases ideales. A través de ejemplos prácticos, comprenderás cómo se comportan los gases en diferentes situaciones y cómo se pueden modificar sus propiedades.',
            'level' => 4,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);
        Module::create([
            'name' => 'Cambios de estado',
            'description' => 'En este último módulo, profundizarás en los cambios de estado de la materia. Analizarás los diferentes procesos de transformación entre los estados sólido, líquido y gaseoso, como la fusión, solidificación, vaporización, condensación y sublimación. Aprenderás cómo se producen estos cambios de estado, las condiciones necesarias para que ocurran y las energías involucradas en cada proceso. Además, comprenderás el papel clave de la temperatura y la presión en los cambios de estado y cómo estos pueden alterar las propiedades de la materia. A través de ejemplos y experimentos, consolidarás tu comprensión de estos procesos de transformación de la materia.',
            'level' => 5,
            'teacher_id' => 2,
            'course_id'  => 4,
        ]);
    }
}
