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
        /*La fotosíntesis: La transformación de luz en energía.*/
        Questionnaire::create([
            'ask'    => '¿Qué proceso utilizan las plantas para poder crecer y obtener alimentos?',
            'answer' => "Fotosíntesis",
            'bad1'   => "Germinación",
            'bad2'   => "Respiración celular",
            'bad3'   => "Absorción de nutrientes",
            'level'  => 1,
            'teacher_id'  => 2,
            'module_id'   => 1,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál es el pigmento responsable de darle el color verde a las hojas de las plantas?',
            'answer' => "Clorofila",
            'bad1'   => "Antocianina",
            'bad2'   => "Melanina",
            'bad3'   => "Melatonina",
            'level'  => 2,
            'teacher_id'  => 2,
            'module_id'   => 1,
        ]);
        Questionnaire::create([
            'ask'    => '¿Qué elemento es liberado al aire como producto de la fotosíntesis?',
            'answer' => "Oxígeno",
            'bad1'   => "Dióxido de carbono",
            'bad2'   => "Nitrógeno",
            'bad3'   => "Hidrógeno",
            'level'  => 3,
            'teacher_id'  => 2,
            'module_id'   => 1,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál es el pigmento responsable de la capturar la luz en la fase luminosa de la fotosíntesis?',
            'answer' => "Clorofila",
            'bad1'   => "Caroteno",
            'bad2'   => "Antocianina",
            'bad3'   => "Ficobilina",
            'level'  => 1,
            'teacher_id'  => 2,
            'module_id'   => 2,
        ]);
        Questionnaire::create([
            'ask'    => '¿Qué reacción química ocurre en la fase luminosa de la fotosíntesis?',
            'answer' => "La molécula de agua se rompe en hidrógeno y oxígeno",
            'bad1'   => "La molécula de dióxido de carbono se convierte en glucosa",
            'bad2'   => "La molécula de glucosa se descompone en dióxido de carbono y agua",
            'bad3'   => "La molécula de oxígeno se convierte en dióxido de carbono",
            'level'  => 2,
            'teacher_id'  => 2,
            'module_id'   => 2,
        ]);
        Questionnaire::create([
            'ask'    => '¿En qué fase de la fotosíntesis se produce el ATP y NADPH?',
            'answer' => "Fase luminosa",
            'bad1'   => "Fase oscura",
            'bad2'   => "Fase de fijación de carbono",
            'bad3'   => "Fase de transporte de electrones",
            'level'  => 3,
            'teacher_id'  => 2,
            'module_id'   => 2,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál es el papel de la clorofila en la fotosíntesis?',
            'answer' => "Capturar la energía luminosa del sol y convertirla en energía química",
            'bad1'   => "Transformar la glucosa en dióxido de carbono",
            'bad2'   => "Descomponer el agua en oxígeno y dióxido de carbono",
            'bad3'   => "Absorber la energía química y convertirla en energía luminosa",
            'level'  => 1,
            'teacher_id'  => 2,
            'module_id'   => 3,
        ]);
        Questionnaire::create([
            'ask'    => 'Qué tipo de luz es absorbida por la clorofila a?',
            'answer' => "Azul y roja",
            'bad1'   => "Verde y amarilla",
            'bad2'   => "Naranja y púrpura",
            'bad3'   => "Todos los colores del espectro visible",
            'level'  => 2,
            'teacher_id'  => 2,
            'module_id'   => 3,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál es la función principal de la clorofila b?',
            'answer' => "Ampliar el rango de absorción de luz de la planta",
            'bad1'   => "Convertir la energía luminosa en energía química",
            'bad2'   => "Reflejar la luz verde",
            'bad3'   => "Capturar la energía luminosa del sol",
            'level'  => 3,
            'teacher_id'  => 2,
            'module_id'   => 3,
        ]);
        Questionnaire::create([
            'ask'    => '¿Dónde se encuentra la clorofila?',
            'answer' => "En los cloroplastos de las células vegetales",
            'bad1'   => "En los núcleos de las células vegetales",
            'bad2'   => "En las mitocondrias de las células vegetales",
            'bad3'   => "En la pared celular de las células vegetales",
            'level'  => 4,
            'teacher_id'  => 2,
            'module_id'   => 3,
        ]);
        Questionnaire::create([
            'ask'    => 'Hay diferentes tipos de luz que son utilizados por las plantas una de ellas es:',
            'answer' => "Luz ultravioleta",
            'bad1'   => "Luz marina",
            'bad2'   => "Luz vegetal",
            'bad3'   => "Energía nuclear",
            'level'  => 1,
            'teacher_id'  => 2,
            'module_id'   => 4,
        ]);
        Questionnaire::create([
            'ask'    => 'Existe una luz que podemos percibir con nuestro ojo este es:',
            'answer' => "Luz visible",
            'bad1'   => "Luz ultravioleta",
            'bad2'   => "Luz infraroja",
            'bad3'   => "Luz marina",
            'level'  => 2,
            'teacher_id'  => 2,
            'module_id'   => 4,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cómo utilizan las plantas la luz ultravioleta?',
            'answer' => "Para estimular su crecimiento y producción de flores",
            'bad1'   => "No utilizan la luz ultravioleta",
            'bad2'   => "Para obtener energía",
            'bad3'   => "Para realizar la fotosíntesis",
            'level'  => 3,
            'teacher_id'  => 2,
            'module_id'   => 4,
        ]);
        Questionnaire::create([
            'ask'    => 'La siguiente luz ayuda a mantener la temperatura adecuada en las hojas y facilitar la transpiración y la absorción de agua',
            'answer' => "Luz infrarroja",
            'bad1'   => "Luz visible",
            'bad2'   => "Luz marina",
            'bad3'   => "Luz ultravioleta",
            'level'  => 4,
            'teacher_id'  => 2,
            'module_id'   => 4,
        ]);
        Questionnaire::create([
            'ask'    => '¿Qué es el ciclo del carbono?',
            'answer' => "Proceso natural en el que el carbono se mueve entre la tierra",
            'bad1'   => "El crecimiento del carbono en los seres vivos",
            'bad2'   => "La combinación del ciclo del agua con el carbono",
            'bad3'   => "La eliminación del carbono de la naturaleza",
            'level'  => 1,
            'teacher_id'  => 2,
            'module_id'   => 5,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cómo se relaciona la fotosíntesis con el ciclo del carbono?',
            'answer' => "Ambas ayudan a mantener el equilibrio en la atmósfera",
            'bad1'   => "No se relaciona con el CO2",
            'bad2'   => "Están relacionadas con el ciclo del agua",
            'bad3'   => "La fotosíntesis no está relacionada con el ciclo del carbono",
            'level'  => 2,
            'teacher_id'  => 2,
            'module_id'   => 5,
        ]);
        Questionnaire::create([
            'ask'    => '¿Por donde capturan la energía las plantas terrestres?',
            'answer' => "Hojas",
            'bad1'   => "Tallo",
            'bad2'   => "Raíz",
            'bad3'   => "Frutos",
            'level'  => 1,
            'teacher_id'  => 2,
            'module_id'   => 6,
        ]);
        Questionnaire::create([
            'ask'    => 'Las plantas acuaticas pueden capturar dióxido de carbono por medio del agua a través del:',
            'answer' => "De la raíz",
            'bad1'   => "Del tallo",
            'bad2'   => "De los Frutos",
            'bad3'   => "De las semillas",
            'level'  => 2,
            'teacher_id'  => 2,
            'module_id'   => 6,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál es la importancia de la fotosíntesis en los alimentos?',
            'answer' => "Para obtener nutrientes",
            'bad1'   => "Para obtener colores característicos",
            'bad2'   => "Para ayudar en el ciclo del carbono",
            'bad3'   => "Para ayudar en el ciclo del agua",
            'level'  => 2,
            'teacher_id'  => 2,
            'module_id'   => 7,
        ]);









        /*El sistema solar: un viaje por el espacio*/
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









        /*Salvando animales: la importancia de la conservación.*/
        Questionnaire::create([
            'ask'    => '¿Cuál es una medida común para conservar especies en peligro de extinción?',
            'answer' => "La creación de reservas naturales y parques nacionales.",
            'bad1'   => "La caza y pesca excesiva.",
            'bad2'   => "La destrucción del hábitat natural.",
            'bad3'   => "Introducir especies invasoras.",
            'level'  => 1,
            'teacher_id'  => 2,
            'module_id'   => 12,
        ]);
        Questionnaire::create([
            'ask'    => '¿Es importante la conservación de especies?',
            'answer' => "Es importante para mantener el equilibrio de la naturaleza",
            'bad1'   => "Solo es necesaria en áreas remotas y no en entornos urbanos. .",
            'bad2'   => "Es importante para los animales y plantas, no para los seres humanos.",
            'bad3'   => "La conservación de las especies no es importante",
            'level'  => 2,
            'teacher_id'  => 2,
            'module_id'   => 12,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuales especies no están incluidas en la biodiversidad?',
            'answer' => "Ninguna, todas están incluidas.",
            'bad1'   => "Plantas.",
            'bad2'   => "Insectos.",
            'bad3'   => "Microorganismos.",
            'level'  => 3,
            'teacher_id'  => 2,
            'module_id'   => 12,
        ]);
        Questionnaire::create([
            'ask'    => '¿Qué pasa si desaparece una especie?',
            'answer' => "Puede afectar a otras especies y desequilibrar todo el ecosistema.",
            'bad1'   => "Ayuda al equilibrio y la biodiversidad de nuestro ecosistema.",
            'bad2'   => "Las plantas producen más oxígeno para respirar.",
            'bad3'   => "Ninguna de las anteriores.",
            'level'  => 4,
            'teacher_id'  => 2,
            'module_id'   => 12,
        ]);

        Questionnaire::create([
            'ask'    => '¿Cuál no es una acción que hace que desaparezcan los animales?',
            'answer' => "Mantener animales en centro clinicos",
            'bad1'   => "La caza ilegal.",
            'bad2'   => "El tráfico de animales.",
            'bad3'   => "Destrucción de su hábitat.",
            'level'  => 1,
            'teacher_id'  => 2,
            'module_id'   => 13,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuales de estas especies está en peligro de extinción?',
            'answer' => "El jaguar.",
            'bad1'   => "El león.",
            'bad2'   => "El tigre.",
            'bad3'   => "Los loros.",
            'level'  => 2,
            'teacher_id'  => 2,
            'module_id'   => 13,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuales de estas especies no está en peligro de extinción?',
            'answer' => "La guacamaya roja.",
            'bad1'   => "El oso frontino.",
            'bad2'   => "La tortuga arrau.",
            'bad3'   => "El delfín rosado.",
            'level'  => 3,
            'teacher_id'  => 2,
            'module_id'   => 13,
        ]);
        Questionnaire::create([
            'ask'    => 'Los zoológicos y acuarios ofrecen:',
            'answer' => "Un hogar seguro y cuidados especiales.",
            'bad1'   => "Únicamente un hogar seguro.",
            'bad2'   => "Únicamente un cuidados especiales.",
            'bad3'   => "Ninguna opción.",
            'level'  => 1,
            'teacher_id'  => 2,
            'module_id'   => 14,
        ]);
        Questionnaire::create([
            'ask'    => 'Los programas de cría en cautividad permiten:',
            'answer' => "Aumentar el números de especies.",
            'bad1'   => "Acostumbrar al animal a un habitat salvaje",
            'bad2'   => "Poner dos especies de animales diferentes.",
            'bad3'   => "Crear nuevas especies de animales.",
            'level'  => 2,
            'teacher_id'  => 2,
            'module_id'   => 14,
        ]);
        Questionnaire::create([
            'ask'    => '¿Qué cosa no hace un programa de educación para la promoción de la conservación de especies?',
            'answer' => "Aprender sobre como domar animales.",
            'bad1'   => "Promover la conservación de especies",
            'bad2'   => "Dar a conocer las diferentes especies.",
            'bad3'   => "Aprender sobre la importancia de proteger.",
            'level'  => 3,
            'teacher_id'  => 2,
            'module_id'   => 14,
        ]);
        Questionnaire::create([
            'ask'    => 'Si existiera una participación comunitaria esto ayudaría a:',
            'answer' => "Que los animales puedan seguir viviendo.",
            'bad1'   => "Disfrutar de más animales en cautiverios.",
            'bad2'   => "Que menos personas sepan de la importancia de la preservación.",
            'bad3'   => "Que más animales pudieran ser cazados.",
            'level'  => 4,
            'teacher_id'  => 2,
            'module_id'   => 14,
        ]);

        Questionnaire::create([
            'ask'    => '¿Cual de estos proyectos no ayudan a la preservación de las especies?',
            'answer' => "Mantener a los animales en cautiverio.",
            'bad1'   => "Educación ambiental.",
            'bad2'   => "Restauración de ecosistemas degradados.",
            'bad3'   => "Protección de especies en peligro de extinción.",
            'level'  => 1,
            'teacher_id'  => 2,
            'module_id'   => 15,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál de estas estrategias ayudan a la restauración de ecosistemas degradados?',
            'answer' => "Rehabilitación de áreas contaminadas.",
            'bad1'   => "Reproducción de animales en cautiverio.",
            'bad2'   => "Turismo comunitario.",
            'bad3'   => "Pesca sostenible.",
            'level'  => 2,
            'teacher_id'  => 2,
            'module_id'   => 15,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál de estas estrategias no ayudan a la protección de especies en peligro de extinción?',
            'answer' => "Cazar animales.",
            'bad1'   => "Creación de reservas naturales.",
            'bad2'   => "Reproducción en cautiverio.",
            'bad3'   => "Reforestación.",
            'level'  => 3,
            'teacher_id'  => 2,
            'module_id'   => 15,
        ]);








        /*Estados de la materia.*/
        Questionnaire::create([
            'ask'    => 'Estos son los 3 estados de la materia:',
            'answer' => "Sólido, líquido y gaseoso",
            'bad1'   => "Sólido, líquido y compuesto",
            'bad2'   => "Sólido, pesado y ligero",
            'bad3'   => "Líquido, gaseoso y compuesto ",
            'level'  => 1,
            'teacher_id'  => 1,
            'module_id'   => 16,
        ]);
        Questionnaire::create([
            'ask'    => 'Cuando el agua hierve se convierte en:',
            'answer' => "Vapor",
            'bad1'   => "Liquido.",
            'bad2'   => "Hielo.",
            'bad3'   => "Ninguna opción.",
            'level'  => 2,
            'teacher_id'  => 1,
            'module_id'   => 16,
        ]);
        Questionnaire::create([
            'ask'    => 'Comprender los estados de la materia nos permite:',
            'answer' => "Conocer el mundo en el que vivimos",
            'bad1'   => "Conocer cosas incomprensibles.",
            'bad2'   => "Conocer el comportamiento de las personas",
            'bad3'   => "Conocer a los animales y sus alimentos",
            'level'  => 3,
            'teacher_id'  => 1,
            'module_id'   => 16,
        ]);
        Questionnaire::create([
            'ask'    => 'El siguiente estado de la materia tiene sus partículas muy juntas y no se pueden mover fácilmente',
            'answer' => "Sólido",
            'bad1'   => "Líquido",
            'bad2'   => "Gaseoso",
            'bad3'   => "Pesado",
            'level'  => 1,
            'teacher_id'  => 1,
            'module_id'   => 17,
        ]);
        Questionnaire::create([
            'ask'    => 'El siguiente objeto no es de estado sólido',
            'answer' => "Aceite Vegetal",
            'bad1'   => "Roca",
            'bad2'   => "Computadora",
            'bad3'   => "Flor",
            'level'  => 2,
            'teacher_id'  => 1,
            'module_id'   => 17,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál de las siguientes opciones es una propiedad física del estado sólido?',
            'answer' => "Densidad",
            'bad1'   => "Conducción",
            'bad2'   => "Elasticidad",
            'bad3'   => "Fragilidad",
            'level'  => 3,
            'teacher_id'  => 1,
            'module_id'   => 17,
        ]);
        Questionnaire::create([
            'ask'    => 'La expansión térmica se produce cuando un sólido:',
            'answer' => "Cambia en su tamaño o volumen",
            'bad1'   => "Se derrite",
            'bad2'   => "Las partículas desaceleran",
            'bad3'   => "Las partículas comienzan a vibrar más rápidamente",
            'level'  => 4,
            'teacher_id'  => 1,
            'module_id'   => 17,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál de las siguientes opciones no es una propiedades mecánicas del estado sólido?',
            'answer' => "Volumen",
            'bad1'   => "Dureza",
            'bad2'   => "Elasticidad",
            'bad3'   => "Fragilidad",
            'level'  => 5,
            'teacher_id'  => 1,
            'module_id'   => 17,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál de las siguientes opciones es un uso de los sólidos en la vida cotidiana?',
            'answer' => "Todas las anteriores",
            'bad1'   => "Mobiliario",
            'bad2'   => "Joyería y accesorios",
            'bad3'   => "Transporte",
            'level'  => 6,
            'teacher_id'  => 1,
            'module_id'   => 17,
        ]);
        Questionnaire::create([
            'ask'    => 'las partículas que forman el líquido están juntas pero no tan cerca como: ',
            'answer' => "El estado sólido",
            'bad1'   => "El estado gaseoso",
            'bad2'   => "El vapor",
            'bad3'   => "El Hierro",
            'level'  => 1,
            'teacher_id'  => 1,
            'module_id'   => 18,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuáles son las características principales del estado líquido?',
            'answer' => "Forma, volumen y fluidez.",
            'bad1'   => "Forma, volumen y tamaño",
            'bad2'   => "Volumen, forma y densidad.",
            'bad3'   => "Volumen, densidad y tamaño",
            'level'  => 2,
            'teacher_id'  => 1,
            'module_id'   => 18,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál no es una propiedad físicas del estado líquido?',
            'answer' => "Fluidez",
            'bad1'   => "Viscosidad.",
            'bad2'   => "Densidad.",
            'bad3'   => "Capilaridad.",
            'level'  => 3,
            'teacher_id'  => 1,
            'module_id'   => 18,
        ]);
        Questionnaire::create([
            'ask'    => '¿Cuál no es una propiedad termodinámica del estado líquido?',
            'answer' => "Viscosidad",
            'bad1'   => "Puntos de fusión.",
            'bad2'   => "Ebullición.",
            'bad3'   => "Calor específico.",
            'level'  => 4,
            'teacher_id'  => 1,
            'module_id'   => 18,
        ]);
        Questionnaire::create([
            'ask'    => 'Aplicaciones y usos de los líquidos en diferentes industrias',
            'answer' => "Todas las anteriores.",
            'bad1'   => "Industria farmacéutica.",
            'bad2'   => "Industria petrolera.",
            'bad3'   => "Industria automotriz.",
            'level'  => 5,
            'teacher_id'  => 1,
            'module_id'   => 18,
        ]);
        Questionnaire::create([
            'ask'    => 'Propiedades térmicas del estado gaseoso:',
            'answer' => "Dilatación y compresibilidad.",
            'bad1'   => "Dilatación y Viscosidad.",
            'bad2'   => "Capilaridad y Viscosidad.",
            'bad3'   => "Dilatación y Fluidez.",
            'level'  => 1,
            'teacher_id'  => 1,
            'module_id'   => 19,
        ]);
        Questionnaire::create([
            'ask'    => 'Propiedades físicas del estado gaseoso:',
            'answer' => "Forma, volumen, densidad.",
            'bad1'   => "Forma, volumen y tamaño",
            'bad2'   => "Tamaño, forma y densidad.",
            'bad3'   => "Volumen, densidad y tamaño",
            'level'  => 2,
            'teacher_id'  => 1,
            'module_id'   => 19,
        ]);
        Questionnaire::create([
            'ask'    => 'La siguiente propiedad mecánicas del estado gaseoso refiere a la capacidad que tiene un gas para deformarse:',
            'answer' => "Elasticidad.",
            'bad1'   => "Presión.",
            'bad2'   => "Densidad.",
            'bad3'   => "Viscosidad.",
            'level'  => 3,
            'teacher_id'  => 1,
            'module_id'   => 19,
        ]);
        Questionnaire::create([
            'ask'    => 'Las partículas que componen la sustancia se encuentran en constante movimiento y separadas entre sí',
            'answer' => "Gaseoso.",
            'bad1'   => "Sólido.",
            'bad2'   => "Líquido.",
            'bad3'   => "Viscosidad.",
            'level'  => 4,
            'teacher_id'  => 1,
            'module_id'   => 19,
        ]);
        Questionnaire::create([
            'ask'    => 'Usos y aplicaciones de los gases en la vida cotidiana:',
            'answer' => "Todas las anteriores.",
            'bad1'   => "Medicina.",
            'bad2'   => "Soldadura y corte.",
            'bad3'   => "Cocina.",
            'level'  => 5,
            'teacher_id'  => 1,
            'module_id'   => 19,
        ]);
        Questionnaire::create([
            'ask'    => '¿Qué son los cambios de estado?',
            'answer' => "Cuando un objeto cambia de una forma a otra, como de sólido a líquido, líquido a gas, o viceversa.",
            'bad1'   => "Cuando un objeto no cambia de forma, si es sólido queda sólido",
            'bad2'   => "Cuando un objeto cambia de tamaño, densidad y elasticidad",
            'bad3'   => "Cuando un objeto no cambia de forma pero si de elasticidad",
            'level'  => 1,
            'teacher_id'  => 1,
            'module_id'   => 20,
        ]);
        Questionnaire::create([
            'ask'    => 'Ejemplo de cuando ocurre un cambio de estado de tipo fusión:',
            'answer' => "El hielo se derrite y se convierte en agua.",
            'bad1'   => "El vapor se convierte el agua.",
            'bad2'   => "El hielo se convierte en vapor.",
            'bad3'   => "Ninguna de las opciones.",
            'level'  => 2,
            'teacher_id'  => 1,
            'module_id'   => 20,
        ]);
    }
}
