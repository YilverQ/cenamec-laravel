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
        /*La fotosíntesis: La transformación de luz en energía.*/
        Note::create([
            'title'       => "El proceso de la fotosíntesis", 
            'img'         => '/storage/imgNotes/foto01.jpeg',
            'description' => "La fotosíntesis es un proceso en el que las plantas utilizan la energía del sol para fabricar su propio alimento. Esto ocurre en las hojas, que contienen clorofila y les da su color verde. Es un proceso inteligente que las plantas realizan para sobrevivir y colaborar con el ecosistema.", 
            'level'       => 1,
            'teacher_id'  => 2,
            'module_id'   => 1,
        ]);
        Note::create([
            'title'       => "Importancia de la fotosíntesis en los seres vivos", 
            'img'         => '/storage/imgNotes/foto02.jpeg',
            'description' => "La fotosíntesis es muy importante para los seres vivos porque es el proceso mediante el cual las plantas y algunas bacterias convierten la luz solar en energía. Esta energía es utilizada por las plantas para crecer, producir alimentos y liberar oxígeno al aire. Sin la fotosíntesis, los seres vivos no podrían obtener los nutrientes y el oxígeno que necesitan para sobrevivir. Por eso, la fotosíntesis es un proceso vital para la vida en la Tierra.", 
            'level'       => 2,
            'teacher_id'  => 2,
            'module_id'   => 1,
        ]);
        Note::create([
            'title'       => "La fase luminosa de la fotosíntesis", 
            'img'         => '/storage/imgNotes/foto03.jpeg',
            'description' => "En la fase luminosa de la fotosíntesis, las plantas utilizan la energía del sol para transformar el agua y el dióxido de carbono en alimento y oxígeno. Este proceso tiene lugar en las hojas de las plantas y es posible gracias a la presencia de un pigmento llamado clorofila. Durante esta fase, la clorofila absorbe la luz y la utiliza para descomponer las moléculas de agua en hidrógeno y oxígeno. El oxígeno se libera al aire, mientras que el hidrógeno se emplea en una etapa posterior de la fotosíntesis.", 
            'level'       => 1,
            'teacher_id'  => 2,
            'module_id'   => 2,
        ]);
        Note::create([
            'title'       => "La fase oscura de la fotosíntesis", 
            'img'         => '/storage/imgNotes/foto04.jpeg',
            'description' => "La fase oscura de la fotosíntesis es esencial para la vida de las plantas. Durante esta etapa, las plantas utilizan dióxido de carbono y la energía de la luz solar para producir su propio alimento. Además, liberan oxígeno, lo cual es vital para todos los seres vivos. Aunque la fase oscura no requiere de la luz solar directamente, depende de los productos energéticos que se generan en la fase luminosa. Las plantas tienen esta capacidad única de crear su propio alimento y proporcionarnos oxígeno, lo que las hace realmente especiales.", 
            'level'       => 2,
            'teacher_id'  => 2,
            'module_id'   => 2,
        ]);
        Note::create([
            'title'       => "Diferencia entre la fase luminosa y oscura de la fotosíntesis", 
            'img'         => '/storage/imgNotes/foto05.jpeg',
            'description' => "La fase luminosa de la fotosíntesis es la primera etapa donde la luz solar se convierte en energía química en forma de ATP y NADPH. Esta energía se utiliza en la fase oscura, la segunda etapa también conocida como ciclo de Calvin. En esta etapa, se utiliza el ATP y NADPH para convertir el dióxido de carbono en glucosa y otros compuestos orgánicos. A diferencia de la fase luminosa, la fase oscura no requiere luz directa, pero depende de la energía almacenada en forma de ATP y NADPH. En resumen, en la fase luminosa se captura la energía de la luz solar y en la fase oscura se utiliza esa energía para producir glucosa y otros compuestos.", 
            'level'       => 3,
            'teacher_id'  => 2,
            'module_id'   => 2,
        ]);
        Note::create([
            'title'       => "La clorofila y sus pigmentos fotosintéticos", 
            'img'         => '/storage/imgNotes/foto06.jpeg',
            'description' => "La clorofila es un pigmento que se encuentra en las plantas y en algunas bacterias y su función es capturar la energía del sol y convertirla en energía química a través de la fotosíntesis. Existen diferentes tipos de clorofila, siendo la más común la clorofila a, que es de color verde y absorbe principalmente luz azul y roja, reflejando la luz verde. También existe la clorofila b, presente en plantas terrestres y algas verdes, que amplía el rango de absorción de luz de la planta. Estos pigmentos son esenciales en la fotosíntesis, ya que absorben la energía luminosa y la transfieren a los centros de reacción fotosintéticos, donde se llevan a cabo las reacciones químicas para producir energía química en forma de ATP y NADPH.", 
            'level'       => 1,
            'teacher_id'  => 2,
            'module_id'   => 3,
        ]);
        Note::create([
            'title'       => "Rol de la clorofila en el proceso de la fotosíntesis", 
            'img'         => '/storage/imgNotes/foto07.jpeg',
            'description' => "La clorofila es un pigmento verde en los cloroplastos de las células vegetales que captura la energía del sol. Absorbe principalmente la luz azul y roja, utilizándola para convertir dióxido de carbono y agua en glucosa y oxígeno. En la fotosíntesis, la clorofila es esencial para capturar la energía lumínica y convertirla en energía química almacenada en forma de glucosa, que la planta utiliza para crecer y desarrollarse.a glucosa se utiliza como fuente de energía para el crecimiento y desarrollo de la planta.", 
            'level'       => 2,
            'teacher_id'  => 2,
            'module_id'   => 3,
        ]);
        Note::create([
            'title'       => "Tipos de luz", 
            'img'         => '/storage/imgNotes/foto08.jpeg',
            'description' => "En la fotosíntesis, la luz es una parte fundamental del proceso mediante el cual las plantas capturan la energía solar y la convierten en energía química. Hay diferentes tipos de luz que son utilizados por las plantas durante este proceso.", 
            'level'       => 1,
            'teacher_id'  => 2,
            'module_id'   => 4,
        ]);
        Note::create([
            'title'       => "Luz visible", 
            'img'         => '/storage/imgNotes/foto09.jpeg',
            'description' => "Es la luz que podemos percibir con nuestros ojos y se compone de diferentes colores, como el rojo, el verde y el azul. Las plantas utilizan principalmente la luz roja y la luz azul para llevar a cabo la fotosíntesis.", 
            'level'       => 2,
            'teacher_id'  => 2,
            'module_id'   => 4,
        ]);
        Note::create([
            'title'       => "Luz ultravioleta", 
            'img'         => '/storage/imgNotes/foto10.jpeg',
            'description' => "La luz ultravioleta es una forma de radiación electromagnética que se encuentra en el espectro de luz entre la luz visible y los rayos X. Aunque la luz ultravioleta puede ser dañina para los seres humanos y otros organismos, las plantas son capaces de utilizarla en pequeñas cantidades para estimular el crecimiento y la producción de flores.", 
            'level'       => 3,
            'teacher_id'  => 2,
            'module_id'   => 4,
        ]);
        Note::create([
            'title'       => "Luz infrarroja", 
            'img'         => '/storage/imgNotes/foto11.jpeg',
            'description' => "La luz infrarroja es una forma de radiación electromagnética que se encuentra en el espectro de luz por debajo de la luz visible. Aunque las plantas no utilizan directamente la luz infrarroja en la fotosíntesis, esta forma de luz puede ayudar a mantener la temperatura adecuada en las hojas y facilitar la transpiración y la absorción de agua.", 
            'level'       => 4,
            'teacher_id'  => 2,
            'module_id'   => 4,
        ]);
        Note::create([
            'title'       => "Ciclo del carbono", 
            'img'         => '/storage/imgNotes/foto12.jpeg',
            'description' => "El ciclo del carbono es el proceso natural en el que el carbono se mueve entre la atmósfera, la tierra, los océanos y los seres vivos, a medida que se incorpora y se libera en diferentes formas químicas.", 
            'level'       => 1,
            'teacher_id'  => 2,
            'module_id'   => 5,
        ]);
        Note::create([
            'title'       => "Relación entre la fotosíntesis y el ciclo del carbono", 
            'img'         => '/storage/imgNotes/foto13.jpeg',
            'description' => "La relación entre la fotosíntesis y el ciclo del carbono se basa en el intercambio continuo de dióxido de carbono (CO2) entre las plantas y la atmósfera. 

A través de la fotosíntesis, las plantas retiran el CO2 de la atmósfera, reduciendo su concentración y, a su vez, liberan oxígeno al entorno. El carbono se almacena en forma de carbohidratos en las plantas y puede ser utilizado posteriormente como fuente de energía en la respiración o transferido a otros organismos cuando son consumidas.", 
            'level'       => 2,
            'teacher_id'  => 2,
            'module_id'   => 5,
        ]);
        Note::create([
            'title'       => "Importancia del equilibrio del carbono en la atmósfera", 
            'img'         => '/storage/imgNotes/foto14.jpeg',
            'description' => "El equilibrio del carbono en la atmósfera es crucial para la estabilidad del clima y el funcionamiento de los ecosistemas. La fotosíntesis es el proceso en el cual las plantas y otros organismos convierten el dióxido de carbono en carbohidratos, liberando oxígeno como un subproducto. Esto reduce la concentración de CO2 en la atmósfera y ayuda a regular el efecto invernadero. Además, el CO2 es utilizado por los organismos para crear compuestos orgánicos, permitiendo que el carbono fluya continuamente a través de la cadena alimentaria. En resumen, el equilibrio del carbono en la atmósfera es esencial para mantener un clima adecuado y asegurar la supervivencia de los seres vivos.", 
            'level'       => 3,
            'teacher_id'  => 2,
            'module_id'   => 5,
        ]);
        Note::create([
            'title'       => "Fotosíntesis en plantas terrestres", 
            'img'         => '/storage/imgNotes/foto15.jpeg',
            'description' => "La fotosíntesis en plantas terrestres ocurre en las células de las hojas, donde se encuentran los cloroplastos. Estos contienen clorofila, que captura la energía de la luz solar. Durante la fotosíntesis, las plantas toman dióxido de carbono del aire y liberan oxígeno. La energía solar se convierte en energía química, que se almacena en forma de glucosa y otros carbohidratos. Estos carbohidratos son esenciales para el crecimiento y desarrollo de la planta, así como para otros procesos vitales.", 
            'level'       => 1,
            'teacher_id'  => 2,
            'module_id'   => 6,
        ]);
        Note::create([
            'title'       => "Fotosíntesis en plantas acuáticas", 
            'img'         => '/storage/imgNotes/foto16.jpeg',
            'description' => "Las plantas acuáticas realizan la fotosíntesis en un entorno acuático y cuentan con células especializadas llamadas 'células acuáticas' para adaptarse a este medio. Estas células tienen una capa externa delgada y permeable que permite el intercambio de gases y nutrientes con el agua. También tienen cloroplastos que contienen clorofila y realizan la fotosíntesis. Las plantas acuáticas pueden ser más eficientes en la captura de dióxido de carbono disuelto en el agua debido a su disponibilidad constante. Algunas plantas pueden absorber dióxido de carbono directamente del agua a través de sus raíces o de la atmósfera a través de sus hojas sumergidas. Para capturar la luz solar, las plantas acuáticas tienen estructuras adaptadas como hojas flotantes o estrechas para maximizar la exposición a la luz.", 
            'level'       => 2,
            'teacher_id'  => 2,
            'module_id'   => 6,
        ]);
        Note::create([
            'title'       => "Importancia de la fotosíntesis en la producción de alimentos", 
            'img'         => '/storage/imgNotes/foto17.jpeg',
            'description' => "La fotosíntesis es un proceso fundamental para la producción de alimentos ya que permite obtener los nutrientes necesarios para el crecimiento y desarrollo de las plantas. Además, la fotosíntesis es la base de la cadena alimentaria. Las plantas, como primer eslabón de esta cadena, son consumidas por herbívoros, quienes a su vez son consumidos por carnívoros u omnívoros, y así sucesivamente. Sin la fotosíntesis, no habría alimentos disponibles para los seres vivos, por lo tanto, este proceso es crucial para asegurar la existencia de alimentos para la supervivencia de todos los seres vivos.", 
            'level'       => 1,
            'teacher_id'  => 2,
            'module_id'   => 7,
        ]);
        Note::create([
            'title'       => "Fotosíntesis y su influencia en el clima y la generación de oxígeno", 
            'img'         => '/storage/imgNotes/foto18.jpeg',
            'description' => "La fotosíntesis es un proceso crucial para el clima y la generación de oxígeno en la Tierra. Las plantas absorben dióxido de carbono durante la fotosíntesis, lo que ayuda a regular el nivel de este gas de efecto invernadero en la atmósfera, ralentizando el calentamiento global. Además, la fotosíntesis es la principal fuente de oxígeno en nuestro planeta, ya que las plantas liberan oxígeno al ambiente. El oxígeno es esencial para la vida, ya que permite a los seres vivos respirar y desempeña un papel clave en la obtención de energía a través de la respiración celular.", 
            'level'       => 2,
            'teacher_id'  => 2,
            'module_id'   => 7,
        ]);








        /*El sistema solar: un viaje por el espacio*/
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




        





        /*Salvando animales: la importancia de la conservación.*/
        Note::create([
            'title'       => "Conservación de las especies", 
            'img'         => '/storage/imgNotes/animal01.jpeg',
            'description' => "La conservación de especies trata de proteger a diferentes tipos de animales y plantas para que no desaparezcan de la Tierra. Esto es muy importante porque cada especie tiene un papel especial en el equilibrio de la naturaleza.

Hay muchas razones por las que algunas especies están en peligro de extinción. Algunas pueden ser por la destrucción de su hábitat natural, como la tala de árboles o la contaminación del agua. Otras pueden ser por la caza y pesca excesiva, o la introducción de especies invasoras que compiten con ellos por recursos.

Cuando una especie está en peligro de extinción, los científicos y conservacionistas trabajan para protegerla. Esto puede incluir la creación de reservas naturales y parques nacionales donde los animales y las plantas estén seguros. También se llevan a cabo programas para reproducir y criar especies en peligro en lugares seguros, como zoológicos y centros de conservación.", 
            'level'       => 1,
            'teacher_id'  => 2,
            'module_id'   => 12,
        ]);
        Note::create([
            'title'       => "La importancia de la conservación de especies", 
            'img'         => '/storage/imgNotes/animal02.jpeg',
            'description' => "Si no conservamos las especies, diferentes animales y plantas podrían desaparecer para siempre. Esto sería algo triste porque cada especie tiene un papel importante en el equilibrio de la naturaleza. Por ejemplo, los árboles producen oxígeno que necesitamos para respirar, y los insectos ayudan a polinizar las flores para que podamos tener frutas y verduras. Además, algunas especies nos brindan medicinas y materiales útiles. Por eso es crucial cuidar de todas las especies y su hábitat, para que sigan existiendo y viviendo en armonía con nosotros.", 
            'level'       => 2,
            'teacher_id'  => 2,
            'module_id'   => 12,
        ]);
        Note::create([
            'title'       => "Biodiversidad y su relación con la conservación", 
            'img'         => '/storage/imgNotes/animal03.jpeg',
            'description' => "La biodiversidad se refiere a la variedad de seres vivos que existen en nuestro planeta, como plantas, animales, insectos y microorganismos. Cada especie tiene un papel importante en el ecosistema y su conservación es fundamental para mantener el equilibrio de la naturaleza. Si cuidamos y protegemos la biodiversidad, garantizamos la supervivencia de muchas especies y preservamos los recursos naturales que necesitamos para vivir.", 
            'level'       => 3,
            'teacher_id'  => 2,
            'module_id'   => 12,
        ]);
        Note::create([
            'title'       => "La interdependencia de las especies en los ecosistemas", 
            'img'         => '/storage/imgNotes/animal04.jpeg',
            'description' => "Las especies en los ecosistemas dependen unas de otras para sobrevivir. Por ejemplo, las plantas producen oxígeno que necesitan los animales para respirar, y los animales esparcen las semillas de las plantas al moverse. También hay animales que se comen a otros animales para obtener alimento, formando una cadena alimentaria. Si desaparece una especie, puede afectar a otras especies y desequilibrar todo el ecosistema. Por eso es importante cuidar y respetar a todas las especies para mantener el equilibrio y la biodiversidad en nuestros ecosistemas.", 
            'level'       => 4,
            'teacher_id'  => 2,
            'module_id'   => 12,
        ]);

        Note::create([
            'title'       => "Especies en peligro de extinción", 
            'img'         => '/storage/imgNotes/animal05.jpeg',
            'description' => "Las especies en los ecosistemas dependen unas de otras para sobrevivir. Por ejemplo, las plantas producen oxígeno que necesitan los animales para respirar, y los animales esparcen las semillas de las plantas al moverse. También hay animales que se comen a otros animales para obtener alimento, formando una cadena alimentaria. Si desaparece una especie, puede afectar a otras especies y desequilibrar todo el ecosistema. Por eso es importante cuidar y respetar a todas las especies para mantener el equilibrio y la biodiversidad en nuestros ecosistemas.", 
            'level'       => 1,
            'teacher_id'  => 2,
            'module_id'   => 13,
        ]);
        Note::create([
            'title'       => "Especies en peligro de extinción en Venezuela", 
            'img'         => '/storage/imgNotes/animal06.jpeg',
            'description' => "En Venezuela, algunas especies se encuentran en peligro de extinción debido a la destrucción de su hábitat, la caza ilegal y el tráfico de animales. Algunas de estas especies son:", 
            'level'       => 2,
            'teacher_id'  => 1,
            'module_id'   => 13,
        ]);
        Note::create([
            'title'       => "El jaguar", 
            'img'         => '/storage/imgNotes/animal07.jpeg',
            'description' => "Este felino es el mayor depredador de América Latina y se encuentra en peligro crítico de extinción en Venezuela debido a la caza ilegal y la destrucción de su hábitat.", 
            'level'       => 3,
            'teacher_id'  => 2,
            'module_id'   => 13,
        ]);
        Note::create([
            'title'       => "El oso frontino", 
            'img'         => '/storage/imgNotes/animal08.jpeg',
            'description' => "Esta especie de oso habita en las montañas de los Andes venezolanos y se encuentra en peligro crítico de extinción debido a la reducción de su hábitat y la caza ilegal.", 
            'level'       => 4,
            'teacher_id'  => 2,
            'module_id'   => 13,
        ]);
        Note::create([
            'title'       => "El cóndor andino", 
            'img'         => '/storage/imgNotes/animal09.jpeg',
            'description' => "Esta imponente ave rapaz es uno de los símbolos de la fauna venezolana y se encuentra en peligro crítico de extinción debido a la caza y la contaminación..", 
            'level'       => 5,
            'teacher_id'  => 2,
            'module_id'   => 13,
        ]);
        Note::create([
            'title'       => "La tortuga arrau", 
            'img'         => '/storage/imgNotes/animal10.jpeg',
            'description' => "Esta especie de tortuga acuática es una de las más grandes del mundo y se encuentra en peligro crítico de extinción debido a la caza ilegal de sus huevos y la destrucción de su hábitat.", 
            'level'       => 6,
            'teacher_id'  => 2,
            'module_id'   => 13,
        ]);
        Note::create([
            'title'       => "El delfín rosado", 
            'img'         => '/storage/imgNotes/animal11.jpeg',
            'description' => "Este delfín de agua dulce habita en los ríos de Venezuela y se encuentra en peligro de extinción debido a la contaminación de los cuerpos de agua y la captura accidental en redes de pesca.", 
            'level'       => 7,
            'teacher_id'  => 2,
            'module_id'   => 13,
        ]);
        Note::create([
            'title'       => "La importancia de los zoológicos y acuarios en la conservación de especies en peligro de extinción", 
            'img'         => '/storage/imgNotes/animal12.jpeg',
            'description' => "Los zoológicos y acuarios son lugares muy importantes para ayudar a proteger y conservar a los animales en peligro de extinción. Estos lugares les brindan un hogar seguro y cuidados especiales que muchas veces no pueden encontrar en su entorno natural. Además, los expertos en los zoológicos y acuarios investigan sobre estas especies y trabajan para reproducirlas y aumentar su población. De esta manera, los zoológicos y acuarios nos permiten conocer a estos animales de cerca y aprender sobre la importancia de preservar a todas las especies en nuestro planeta.", 
            'level'       => 1,
            'teacher_id'  => 2,
            'module_id'   => 14,
        ]);
        Note::create([
            'title'       => "Los programas de cría en cautividad y reintroducción de especies en los zoológicos y acuarios como estrategias de conservación.", 
            'img'         => '/storage/imgNotes/animal13.jpeg',
            'description' => "Los programas de cría en cautividad y reintroducción de especies en zoológicos y acuarios son estrategias que buscan salvar a especies en peligro de extinción. Esto se hace al criar a estos animales en lugares seguros, como un zoológico o acuario, donde se les brinda cuidados especiales y se les protege de los peligros que enfrentan en su hábitat natural. Luego, cuando estos animales están lo suficientemente fuertes y preparados, se les devuelve a su hábitat original para que puedan vivir libres y ayudar a aumentar la población de su especie. De esta manera, los zoológicos y acuarios contribuyen a conservar la diversidad biológica del planeta.", 
            'level'       => 2,
            'teacher_id'  => 2,
            'module_id'   => 14,
        ]);
        Note::create([
            'title'       => "El papel de los programas de educación para la promoción de la conservación de especies.", 
            'img'         => '/storage/imgNotes/animal14.jpeg',
            'description' => "Los programas de educación ambiental en zoológicos y acuarios son muy importantes para promover la conservación de especies. A través de estas actividades, los niños pueden aprender sobre la importancia de proteger a los animales y su hábitat. Además, pueden conocer de cerca a diferentes especies y entender cómo pueden ayudar a conservarlas. Mediante la educación y la concienciación, estos programas procuran que las especies no desaparezcan y que los animales puedan vivir en un entorno seguro y saludable.", 
            'level'       => 3,
            'teacher_id'  => 2,
            'module_id'   => 14,
        ]);
        Note::create([
            'title'       => "La importancia de la participación comunitaria y el compromiso ciudadano en la conservación de especies a través de zoológicos y acuarios.", 
            'img'         => '/storage/imgNotes/animal15.jpeg',
            'description' => "En los zoológicos y acuarios podemos ver diferentes especies de animales y plantas de todo el mundo. Es importante que como ciudadanos nos comprometamos a cuidar de ellos porque así podemos ayudar a conservar estas especies. Participar en actividades en los zoológicos y acuarios nos permite aprender sobre la importancia de proteger a los animales y su hábitat, y nos hace más responsables con el medio ambiente. Al estar comprometidos podemos colaborar en la conservación de estas especies, para que puedan seguir viviendo y para que las futuras generaciones también puedan disfrutar de ellos.", 
            'level'       => 4,
            'teacher_id'  => 2,
            'module_id'   => 14,
        ]);
        Note::create([
            'title'       => "Protección de especies en peligro de extinción", 
            'img'         => '/storage/imgNotes/animal16.jpeg',
            'description' => "Se pueden abordar proyectos y estrategias para conservar y proteger especies en peligro de extinción, como la creación de reservas naturales, programas de reproducción en cautiverio, educación ambiental, entre otros.", 
            'level'       => 1,
            'teacher_id'  => 2,
            'module_id'   => 15,
        ]);
        Note::create([
            'title'       => "Restauración de ecosistemas degradados.", 
            'img'         => '/storage/imgNotes/animal17.jpeg',
            'description' => "Se pueden desarrollar proyectos y estrategias para restaurar ecosistemas degradados, como la reforestación, rehabilitación de áreas contaminadas, recuperación de humedales, entre otros.", 
            'level'       => 2,
            'teacher_id'  => 2,
            'module_id'   => 15,
        ]);
        Note::create([
            'title'       => "Educación ambiental.", 
            'img'         => '/storage/imgNotes/animal18.jpeg',
            'description' => "Se pueden desarrollar proyectos y estrategias para concienciar y educar a la población sobre la importancia de la conservación en la naturaleza, promoviendo actividades como talleres, charlas, campañas de sensibilización y programas educativos.", 
            'level'       => 3,
            'teacher_id'  => 2,
            'module_id'   => 15,
        ]);
        Note::create([
            'title'       => "Promoción de la conservación en comunidades locales.", 
            'img'         => '/storage/imgNotes/animal19.jpeg',
            'description' => "Se pueden desarrollar proyectos y estrategias para involucrar a las comunidades locales en la conservación en la naturaleza, como la capacitación en prácticas sostenibles, apoyo a proyectos de turismo comunitario, promoción de prácticas de pesca sostenible, entre otros.", 
            'level'       => 4,
            'teacher_id'  => 2,
            'module_id'   => 15,
        ]);








        /*Estados de la Materia*/
        Note::create([
            'title'       => "Los estados de la materia.", 
            'img'         => '/storage/imgNotes/materia01.jpeg',
            'description' => "Los estados de la materia son las formas en las que podemos encontrar las cosas en el mundo. Pueden ser sólidas, como un libro o una mesa; líquidas, como el agua o el jugo; o gaseosas, como el aire o el vapor. Cada estado tiene diferentes características, como su forma y cómo se comporta.", 
            'level'       => 1,
            'teacher_id'  => 1,
            'module_id'   => 16,
        ]);
        Note::create([
            'title'       => "Aplicaciones de los estados de la materia.", 
            'img'         => '/storage/imgNotes/materia02.jpeg',
            'description' => "Los estados de la materia son formas en las que se puede encontrar la materia, como el agua, el hielo o el vapor. Podemos observarlos en nuestra vida cotidiana. Por ejemplo, cuando ponemos un hielo en un vaso de agua caliente, vemos cómo el hielo se derrite y se convierte en agua. También podemos ver cómo el agua hierve y se convierte en vapor cuando la calentamos en una olla. Estas formas de la materia son muy importantes porque nos permiten entender cómo se comporta y cómo podemos utilizarla en diferentes situaciones.", 
            'level'       => 2,
            'teacher_id'  => 1,
            'module_id'   => 16,
        ]);
        Note::create([
            'title'       => "La importancia de estudiar los estados de la materia.", 
            'img'         => '/storage/imgNotes/materia03.jpeg',
            'description' => "Estudiar los estados de la materia es importante para entender cómo se comportan las cosas a nuestro alrededor. Esto nos ayuda a entender el mundo en el que vivimos y cómo interactuamos con él.", 
            'level'       => 3,
            'teacher_id'  => 1,
            'module_id'   => 16,
        ]);
        Note::create([
            'title'       => "El estado sólido: ¿qué es y cuáles son sus características?", 
            'img'         => '/storage/imgNotes/materia04.jpeg',
            'description' => "El estado sólido es uno de los estados en los que podemos encontrar la materia. Un objeto o sustancia en estado sólido tiene sus partículas muy juntas y no se pueden mover fácilmente. Esto hace que el objeto mantenga su forma y no se deforme. Algunos ejemplos de sustancias en estado sólido son la roca, el hielo y los juguetes hechos de plástico.", 
            'level'       => 1,
            'teacher_id'  => 1,
            'module_id'   => 17,
        ]);
        Note::create([
            'title'       => "Ejemplos comunes de sustancias en estado sólido.", 
            'img'         => '/storage/imgNotes/materia05.jpeg',
            'description' => "1. Hielo, 2. Sal de mesa, 3. Hierro, 4. Azúcar, 5. Diamante, 6. Oro, 7. Plomo, 8. Aluminio.", 
            'level'       => 2,
            'teacher_id'  => 1,
            'module_id'   => 17,
        ]);
        Note::create([
            'title'       => "Propiedades físicas del estado sólido: forma, volumen, densidad.", 
            'img'         => '/storage/imgNotes/materia06.jpeg',
            'description' => "Forma: Los sólidos tienen una forma definida y mantienen su forma cuando se someten a fuerzas externas. Esto se debe a que las partículas en un sólido están muy cerca unas de otras y tienen una estructura ordenada.

Volumen: Los sólidos tienen un volumen definido y ocupan una cantidad específica de espacio. Esto se debe a que las partículas en un sólido están fuertemente unidas y no pueden comprimirse fácilmente.

Densidad: La densidad de un sólido es la relación entre su masa y su volumen. Los sólidos tienden a tener una densidad más alta que los líquidos y los gases debido a la proximidad de las partículas. La densidad de un sólido puede variar según el material del que esté hecho.", 
            'level'       => 3,
            'teacher_id'  => 1,
            'module_id'   => 17,
        ]);
        Note::create([
            'title'       => "Propiedades térmicas del estado sólido: conducción, expansión térmica.", 
            'img'         => '/storage/imgNotes/materia07.jpeg',
            'description' => "La conducción térmica es un proceso que ocurre en los materiales sólidos donde el calor se transfiere de una parte a otra debido a la vibración de las partículas. Cuando se calienta un extremo de un sólido, las partículas cercanas comienzan a moverse más rápido y transmiten esta energía térmica a las partículas adyacentes. Este movimiento de partículas causa la transferencia de calor a lo largo del material sólido.

La expansión térmica ocurre cuando un sólido se calienta y su tamaño o volumen aumenta debido a que las partículas se mueven más rápido y ocupan más espacio. Por el contrario, cuando se enfría, las partículas se mueven más lentamente y el material se contrae, disminuyendo su tamaño.", 
            'level'       => 4,
            'teacher_id'  => 1,
            'module_id'   => 17,
        ]);
        Note::create([
            'title'       => "Propiedades mecánicas del estado sólido: dureza, elasticidad, fragilidad.", 
            'img'         => '/storage/imgNotes/materia08.jpeg',
            'description' => "Dureza: se refiere a la resistencia de un material a ser rayado, deformado o penetrado. La dureza está relacionada con la resistencia de los enlaces entre los átomos o moléculas de un material. Los materiales más duros son aquellos que tienen enlaces fuertes y alta densidad de átomos, como el diamante.

Elasticidad: es la capacidad de un material para deformarse cuando se le aplica una fuerza externa y luego recuperar su forma original una vez que se elimina esa fuerza. Los materiales elásticos tienen enlaces débiles y se caracterizan por su alta flexibilidad y capacidad para sufrir deformaciones reversibles.

Fragilidad: es la propiedad de un material de romperse o fracturarse con facilidad cuando se le aplica una fuerza. Los materiales frágiles tienen enlaces fuertes pero poco flexibles, lo que los hace propensos a romperse en lugar de deformarse plásticamente cuando se les aplica una carga. El vidrio y la cerámica son ejemplos de materiales frágiles.", 
            'level'       => 5,
            'teacher_id'  => 1,
            'module_id'   => 17,
        ]);
        Note::create([
            'title'       => "Usos y aplicaciones de los sólidos en la vida cotidiana.", 
            'img'         => '/storage/imgNotes/materia09.jpeg',
            'description' => "Construcción y arquitectura
Mobiliario
Electrodomésticos y dispositivos electrónicos
Envases y embalajes
Joyería y accesorios
Transporte
Ropa y textiles

En resumen, los sólidos están presentes en numerosos ámbitos de nuestra vida cotidiana, desde la construcción hasta la joyería, y desempeñan un papel crucial en la sociedad moderna.", 
            'level'       => 6,
            'teacher_id'  => 1,
            'module_id'   => 17,
        ]);

        Note::create([
            'title'       => "¿Qué es el estado líquido?", 
            'img'         => '/storage/imgNotes/materia10.jpeg',
            'description' => "El estado líquido es uno de los tres estados en los que se pueden encontrar las cosas, junto con el sólido y el gaseoso. En el estado líquido, las sustancias tienen forma y volumen, como por ejemplo el agua. Pueden fluir fácilmente y tomar la forma del recipiente en el que se encuentran. Es decir, pueden moverse de un lugar a otro. Además, las partículas que forman el líquido están juntas pero no tan cerca como en el estado sólido, lo que significa que los líquidos pueden adaptarse a diferentes espacios y mezclarse entre sí.", 
            'level'       => 1,
            'teacher_id'  => 1,
            'module_id'   => 18,
        ]);
        Note::create([
            'title'       => "Características principales del estado líquido: forma, volumen y fluidez.", 
            'img'         => '/storage/imgNotes/materia11.jpeg',
            'description' => "Forma: Los líquidos no tienen una forma definida, adoptando la forma del recipiente en el que se encuentran. Esto se debe a que las moléculas que componen los líquidos tienen la capacidad de moverse libremente una respecto a otra, permitiendo que se adapten al espacio en el que se encuentran.

Volumen: Los líquidos tienen un volumen definido y constante. Esto significa que ocupan un espacio determinado, el cual no se ve afectado por cambios en la forma del recipiente en el que se encuentran. A diferencia de los gases, que se expanden para llenar todo el volumen disponible, los líquidos mantienen su volumen original.

Fluidez: Los líquidos tienen la propiedad de fluir, es decir, de desplazarse y moverse fácilmente. Esto se debe a que las moléculas que los componen tienen la capacidad de deslizarse unas sobre otras sin mucha resistencia, lo que les permite fluir y adaptarse a cualquier forma del recipiente.

Es importante destacar que estas características son generales y pueden variar según el tipo de líquido y las condiciones en las que se encuentre. Por ejemplo, algunos líquidos tienen mayor viscosidad, lo que dificulta su fluidez, y otros pueden cambiar de forma y volumen bajo ciertas condiciones de temperatura y presión.", 
            'level'       => 2,
            'teacher_id'  => 1,
            'module_id'   => 18,
        ]);
        Note::create([
            'title'       => "Propiedades físicas del estado líquido: densidad, viscosidad y capilaridad.", 
            'img'         => '/storage/imgNotes/materia12.jpeg',
            'description' => "Densidad: Es la relación entre la masa de una sustancia y el volumen que ocupa. En el estado líquido, la densidad tiende a ser mayor que en el estado gaseoso, pero menor que en el estado sólido. Esto se debe a que las moléculas en el estado líquido se encuentran más cerca unas de otras, pero aún tienen la capacidad de moverse y fluir.

Viscosidad: Es la resistencia interna de un líquido a fluir. Depende de la cohesión entre las moléculas del líquido y de su temperatura. Un líquido viscoso tiene mayor resistencia al flujo, mientras que un líquido menos viscoso fluye más fácilmente. La viscosidad disminuye a medida que la temperatura aumenta, ya que las moléculas se mueven más rápidamente.

Capilaridad: Es la capacidad de un líquido para ascender o descender en un tubo capilar. Esto se debe a la interacción entre las moléculas del líquido y las del material del tubo capilar. La capilaridad es causada por la tensión superficial y la adhesión entre las moléculas. Por ejemplo, el agua puede ascender en un tubo capilar delgado debido a su alta adhesión a las paredes del tubo. La altura de ascenso o descenso depende de la viscosidad y la tensión superficial del líquido, así como de las dimensiones del tubo capilar.", 
            'level'       => 3,
            'teacher_id'  => 1,
            'module_id'   => 18,
        ]);
        Note::create([
            'title'       => "Propiedades termodinámicas del estado líquido: puntos de fusión y ebullición, calor específico.", 
            'img'         => '/storage/imgNotes/materia13.jpeg',
            'description' => "Punto de fusión: es la temperatura en la que una sustancia sólida se convierte en líquida. Esto ocurre cuando las fuerzas que mantienen las moléculas juntas se debilitan y pueden moverse libremente.

Punto de ebullición: es la temperatura en la que una sustancia líquida cambia a estado gaseoso. Durante este proceso, las fuerzas que mantenían las moléculas unidas se rompen y las moléculas se dispersan en el aire.

Calor específico: es la cantidad de calor necesaria para aumentar la temperatura de una cantidad determinada de una sustancia en un grado. Algunas sustancias necesitan más calor para calentarse, mientras que otras necesitan menos. El agua tiene un calor específico alto, lo que significa que requiere más calor para calentarla en comparación con otras sustancias.", 
            'level'       => 4,
            'teacher_id'  => 1,
            'module_id'   => 18,
        ]);
        Note::create([
            'title'       => "Aplicaciones y usos de los líquidos en diferentes industrias.", 
            'img'         => '/storage/imgNotes/materia14.jpeg',
            'description' => "Industria alimentaria: Los líquidos se utilizan para la fabricación de bebidas como jugos, refrescos, vino, cerveza y bebidas alcohólicas. También se emplean en la preparación de alimentos como salsas, aderezos, sopas y cremas.

Industria farmacéutica: Los líquidos son fundamentales en la fabricación de medicamentos ya que permiten la disolución y mezcla de los compuestos activos. Además, se utilizan para la elaboración de soluciones intravenosas, jarabes y suspensiones.

Industria petrolera: Los líquidos desempeñan un papel fundamental en la extracción, transporte y procesamiento del petróleo. Se utilizan para la perforación de pozos, la producción de petróleo y la refinación de derivados como gasolina, diesel y lubricantes.

Industria automotriz: Los líquidos tienen una variedad de usos en la industria automotriz. El aceite lubricante se utiliza para mantener el motor en buen estado, los líquidos de frenos permiten el correcto funcionamiento del sistema de frenado y los líquidos refrigerantes mantienen la temperatura del motor.

Estos son solo algunos ejemplos de cómo se utilizan los líquidos en diferentes industrias. Su versatilidad y capacidad de fluir y mezclarse los convierten en un recurso esencial en numerosos procesos industriales.", 
            'level'       => 5,
            'teacher_id'  => 1,
            'module_id'   => 18,
        ]);
        Note::create([
            'title'       => "¿Qué es el estado gaseoso?", 
            'img'         => '/storage/imgNotes/materia15.jpeg',
            'description' => "El estado gaseoso es una de las tres formas básicas de la materia, junto con los estados sólido y líquido. En este estado, las partículas que componen la sustancia se encuentran en constante movimiento y separadas entre sí, ocupando todo el espacio disponible. No tienen una forma ni un volumen definidos, ya que pueden expandirse y comprimirse fácilmente. Además, no tienen una fuerza de atracción fuerte entre ellas, lo que les permite moverse libremente y colisionar unas con otras. Algunos ejemplos comunes de sustancias en estado gaseoso son el oxígeno, el dióxido de carbono y el vapor de agua.", 
            'level'       => 1,
            'teacher_id'  => 1,
            'module_id'   => 19,
        ]);
        Note::create([
            'title'       => "Propiedades físicas del estado gaseoso: forma, volumen, densidad.", 
            'img'         => '/storage/imgNotes/materia16.jpeg',
            'description' => "La forma: Los gases no tienen una forma fija y pueden expandirse y contraerse para llenar completamente el contenedor en el que se encuentran. Esto se debe a que las partículas de los gases están muy separadas y se mueven en todas las direcciones.

El volumen: Los gases no tienen un volumen fijo y se adaptan al volumen del contenedor en el que se encuentran. Por lo tanto, pueden ocupar cualquier espacio disponible sin tener una forma o volumen específico.

La densidad: Los gases tienen una densidad mucho más baja en comparación con los líquidos y sólidos. Esto se debe a que las partículas de los gases están muy separadas y no están tan unidas como en los líquidos o sólidos. Como resultado, la masa de un gas se distribuye sobre un volumen mucho mayor, lo que da como resultado una baja densidad.", 
            'level'       => 2,
            'teacher_id'  => 1,
            'module_id'   => 19,
        ]);
        Note::create([
            'title'       => "Propiedades térmicas del estado gaseoso: dilatación, compresibilidad.", 
            'img'         => '/storage/imgNotes/materia17.jpeg',
            'description' => "La dilatación de los gases se refiere a su capacidad de aumentar de volumen cuando se calientan. Esto ocurre porque al aumentar la temperatura, las moléculas de gas se mueven más rápidamente y colisionan entre sí con mayor energía. Estas colisiones más enérgicas hacen que las moléculas se separen entre sí, lo que resulta en una expansión del volumen del gas.

Por otro lado, la compresibilidad de los gases se refiere a la capacidad de los gases para disminuir su volumen cuando se someten a altas presiones. Esto ocurre porque cuando se aumenta la presión sobre un gas, las moléculas se ven forzadas a acercarse entre sí, disminuyendo así el volumen ocupado por el gas.", 
            'level'       => 3,
            'teacher_id'  => 1,
            'module_id'   => 19,
        ]);
        Note::create([
            'title'       => "Propiedades mecánicas del estado gaseoso: presión, elasticidad.", 
            'img'         => '/storage/imgNotes/materia18.jpeg',
            'description' => "La presión es la fuerza que ejerce un gas por unidad de área. Se debe al constante movimiento de las moléculas de gas, que chocan contra las paredes del recipiente que lo contiene. Cuanto mayor es la velocidad y frecuencia de estos choques, mayor será la presión ejercida por el gas.

La elasticidad se refiere a la capacidad que tiene un gas para deformarse y luego retornar a su forma original cuando se le aplica una fuerza externa. Esto se debe a que las moléculas de gas están en constante movimiento y pueden moverse libremente en cualquier dirección.", 
            'level'       => 4,
            'teacher_id'  => 1,
            'module_id'   => 19,
        ]);
        Note::create([
            'title'       => "¿Qué son los gases ideales y gases reales?", 
            'img'         => '/storage/imgNotes/materia19.jpeg',
            'description' => "Los gases ideales son aquellos que siguen las leyes de los gases ideales, las cuales asumen que las partículas de gas no tienen volumen y no ejercen fuerzas de atracción o repulsión entre sí. Además, se considera que las colisiones entre partículas son perfectamente elásticas. Por otro lado, los gases reales son aquellos que no cumplen completamente con estas leyes, ya que las partículas de gas tienen volumen y experimentan fuerzas de atracción o repulsión entre sí. Además, las colisiones entre partículas no son perfectamente elásticas, lo que puede afectar las propiedades y comportamiento del gas.", 
            'level'       => 5,
            'teacher_id'  => 1,
            'module_id'   => 19,
        ]);
        Note::create([
            'title'       => "Usos y aplicaciones de los gases en la vida cotidiana.", 
            'img'         => '/storage/imgNotes/materia20.jpeg',
            'description' => "Calefacción y refrigeración: Los gases como el gas natural se utilizan para calentar el hogar y el agua, mientras que los refrigerantes gaseosos se utilizan en sistemas de aire acondicionado y refrigeración.

Cocina: El gas natural y el propano se utilizan para cocinar alimentos en estufas y hornos. Estos gases proporcionan una fuente de calor controlable y rápida.

Producción de energía: Los gases como el gas natural y el propano se utilizan en plantas de energía para generar electricidad.


Envasado y almacenamiento: Los gases comprimidos se utilizan para envasar y almacenar productos, como los aerosoles en latas de spray.

Medicina: Los gases como el oxígeno y el anestésico se utilizan en entornos médicos para tratar o mantener la vida de los pacientes, para la anestesia y para el uso de respiradores.

Soldadura y corte: Los gases combustibles como el acetileno y el propano se utilizan en procesos de soldadura y corte, proporcionando una llama de alta temperatura para fusionar metales y cortar superficies.

Estos son solo algunos ejemplos de cómo los gases se utilizan en nuestra vida cotidiana. Los gases desempeñan un papel importante en numerosos aspectos de nuestra vida y son esenciales en muchos procesos industriales y aplicaciones tecnológicas.", 
            'level'       => 6,
            'teacher_id'  => 1,
            'module_id'   => 19,
        ]);

        Note::create([
            'title'       => "¿Qué son los cambios de estado y cómo se producen en la materia?", 
            'img'         => '/storage/imgNotes/materia21.jpeg',
            'description' => "Los cambios de estado son procesos en los que la materia cambia de una forma a otra, como de sólido a líquido, líquido a gas, o viceversa. Estos cambios ocurren cuando se agregan o se quitan energía térmica a la materia. Por ejemplo, cuando calentamos un trozo de hielo, la energía térmica hace que las partículas del hielo se muevan más rápidamente, rompiendo las fuerzas de atracción entre ellas y convirtiendo el hielo en agua líquida. De manera similar, si seguimos calentando el agua, las partículas se mueven aún más rápido y se convierten en vapor, cambiando de estado de líquido a gas.", 
            'level'       => 1,
            'teacher_id'  => 1,
            'module_id'   => 20,
        ]);
        Note::create([
            'title'       => "Los tres cambios de estado básicos: la fusión, la condensación y la sublimación.", 
            'img'         => '/storage/imgNotes/materia22.jpeg',
            'description' => "La fusión es el cambio de estado de sólido a líquido. Esto sucede cuando se calienta un sólido y sus moléculas comienzan a moverse más rápidamente, rompiendo las fuerzas de atracción entre sí. Un ejemplo común de fusión es cuando un cubo de hielo se derrite y se convierte en agua.

La condensación es el cambio de estado de gas a líquido. Esto ocurre cuando se enfría un gas y sus moléculas se vuelven más lentas, lo que permite que las fuerzas de atracción entre ellas los mantengan cerca. Un ejemplo típico de condensación es cuando el vapor de agua en el aire se enfría y se convierte en líquido, formando gotas en la superficie de un vaso frío.

La sublimación es el cambio de estado directo de sólido a gas. Esto sucede cuando un sólido se calienta y sus moléculas se mueven tan rápidamente que se convierten directamente en gas sin pasar por el estado líquido. Un ejemplo común de sublimación es cuando el hielo seco (dióxido de carbono sólido) se calienta y se convierte en gas sin dejar rastro de líquido.", 
            'level'       => 2,
            'teacher_id'  => 1,
            'module_id'   => 20,
        ]);
    }
}
