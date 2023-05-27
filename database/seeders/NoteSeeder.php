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
            'title'       => "¿Qué es la física?", 
            'img'         => '/storage/imgNotes/module.jpg',
            'description' => "Para ser honesto, es muy difícil definir exactamente qué es la física. Una de las razones es que la física sigue cambiando a medida que progresamos y hacemos descubrimientos. Las nuevas teorías no solo traen nuevas respuestas. También crean preguntas que incluso podrían no tener sentido cuando se observan desde las teorías previas de la física. Esto hace que sea emocionante e interesante, pero también fuerza a que los intentos por definirla se vuelvan generalizaciones acerca de lo que ha sido, en lugar de lo que puede ser en algún momento en el futuro.", 
            'level'       => 1,
            'teacher_id'  => 1,
            'module_id'   => 1,
        ]);

        Note::create([
            'title'       => "¿Qué significa la posición?",
            'img'         => '/storage/imgNotes/module.jpg',
            'description' => "En física, nos encanta describir de forma precisa el movimiento de un objeto. En serio, los primeros capítulos de prácticamente cualquier libro de texto de física están dedicados a enseñarle a la gente cómo describir de forma precisa el movimiento, pues es muy importante para todo lo demás que hacemos en física.", 
            'level'       => 2,
            'teacher_id'  => 1,
            'module_id'   => 1,
        ]);

        Note::create([
            'title'       => "¿Qué es la aceleración?",
            'img'         => '/storage/imgNotes/module.jpg',
            'description' => "Comparada con el desplazamiento y la velocidad, la aceleración es como el dragón enojado que escupe fuego de las variables de movimiento. Puede ser violenta; algunas personas le tienen miedo; y si es grande, te obliga a que la notes. Ese sentimiento que te da cuando estás sentado en un avión durante el despegue, al frenar súbitamente en un automóvil o al dar una vuelta a alta velocidad en un carrito de carreras, son situaciones en las que estás acelerando.", 
            'level'       => 3,
            'teacher_id'  => 1,
            'module_id'   => 1,
        ]);

        Note::create([
            'title'       => "¿Qué es un proyectil en 2D?", 
            'img'         => '/storage/imgNotes/module.jpg',
            'description' => "En un ataque de ira inducido por fructosa, decides lanzar por los aires un limón que sigue la curva punteada que mostramos en el siguiente diagrama. En este caso, consideramos que el limón es un proyectil bidimensional, pues está volando por el aire tanto vertical como horizontalmente, y se encuentra únicamente bajo la influencia de la gravedad.", 
            'level'       => 1,
            'teacher_id'  => 1,
            'module_id'   => 2,
        ]);

        Note::create([
            'title'       => "¿Por qué descomponemos los vectores en componentes?",
            'img'         => '/storage/imgNotes/module.jpg',
            'description' => "El movimiento bidimensional es más complicado que el movimiento unidimensional, ya que las velocidades pueden apuntar en direcciones diagonales. Por ejemplo, una bola de béisbol se podría estar moviendo tanto horizontal como verticalmente al mismo tiempo con una velocidad diagonal V. Para simplificar nuestros cálculos, descomponemos el vector de velocidad V de la bola de béisbol en dos direcciones separadas: la velocidad horizontal, Vx y la velocidad vertical, Vx.", 
            'level'       => 2,
            'teacher_id'  => 1,
            'module_id'   => 2,
        ]);

        Note::create([
            'title'       => "¿Qué es la primera ley de Newton?", 
            'img'         => '/storage/imgNotes/module.jpg',
            'description' => "Antes de Galileo y Newton, mucha gente pensaba que los objetos perdían rapidez debido a que tenían incorporada una tendencia natural para hacerlo. Pero esas personas no estaban tomando en cuenta las múltiples fuerzas aquí en la Tierra —por ejemplo, la fricción, la gravedad y la resistencia del aire— que causan que los objetos cambien su velocidad. Si pudiéramos ver el movimiento de un objeto en el espacio interestelar profundo, seríamos capaces de observar las tendencias naturales de un objeto que está libre de cualquier influencia externa. En el espacio interestelar profundo observaríamos que si un objeto tuviera una velocidad, continuaría moviéndose con esa velocidad hasta que hubiera alguna fuerza que causara un cambio en su movimiento. Del mismo modo, si un objeto estuviera en reposo en el espacio interestelar, se mantendría en reposo hasta que hubiera una fuerza que causara un cambio en su movimiento.", 
            'level'       => 1,
            'teacher_id'  => 1,
            'module_id'   => 3,
        ]);

        Note::create([
            'title'       => "¿Qué es la fuerza normal?",
            'img'         => '/storage/imgNotes/module.jpg',
            'description' => "¿Alguna vez te has volteado demasiado rápido y caminado derechito a una pared? Yo sí. Duele y me hace sentir tonto. Podemos culpar a la fuerza normal por el dolor que sentimos cuando chocamos contra objetos sólidos. La fuerza normal es la fuerza que las superficies ejercen para prevenir que los objetos sólidos se atraviesen entre sí.

            La fuerza normal es una fuerza de contacto. Si dos superficies no están en contacto, no pueden ejercer fuerza normal una sobre la otra. Por ejemplo, las superficies de una mesa y una caja no ejercen fuerza normal la una sobre la otra si no están en contacto.", 
            'level'       => 2,
            'teacher_id'  => 1,
            'module_id'   => 3,
        ]);

        



        /*VANESSA*/
        Note::create([
            'title' => 'Titulo',
            'img' => '/storage/imgNotes/module.jpg',
            'description' => "Aprender nunca fue tan fácil", 
            'level' => 1,
            'teacher_id'  => 2,
            'module_id'   => 13,
        ]);

        Note::create([
            'title' => 'Titulo',
            'img' => '/storage/imgNotes/module.jpg',
            'description' => "CENAMEC, un lugar para aprender sobre la ciencia", 
            'level' => 2,
            'teacher_id'  => 2,
            'module_id'   => 13,
        ]);


        Note::create([
            'title' => 'Titulo',
            'img' => '/storage/imgNotes/module.jpg',
            'description' => "Aprender nunca fue tan fácil", 
            'level' => 1,
            'teacher_id'  => 2,
            'module_id'   => 14,
        ]);

        Note::create([
            'title' => 'Titulo',
            'img' => '/storage/imgNotes/module.jpg',
            'description' => "CENAMEC, un lugar para aprender sobre la ciencia",
            'level' => 2,
            'teacher_id'  => 2,
            'module_id'   => 14,
        ]);

        Note::create([
            'title' => 'Titulo',
            'img' => '/storage/imgNotes/module.jpg',
            'description' => "Biología, Física y Química. Es lo que sabemos.", 
            'level' => 3,
            'teacher_id'  => 2,
            'module_id'   => 14,
        ]);


        Note::create([
            'title' => 'Titulo',
            'img' => '/storage/imgNotes/module.jpg',
            'description' => "Aprender nunca fue tan fácil",
            'level' => 1,
            'teacher_id'  => 2,
            'module_id'   => 15,
        ]);

        Note::create([
            'title' => 'Titulo',
            'img' => '/storage/imgNotes/module.jpg',
            'description' => "CENAMEC, un lugar para aprender sobre la ciencia", 
            'level' => 2,
            'teacher_id'  => 2,
            'module_id'   => 15,
        ]);

        Note::create([
            'title' => 'Titulo',
            'img' => '/storage/imgNotes/module.jpg',
            'description' => "Biología, Física y Química. Es lo que sabemos.", 
            'level' => 3,
            'teacher_id'  => 2,
            'module_id'   => 15,
        ]);
    }
}
