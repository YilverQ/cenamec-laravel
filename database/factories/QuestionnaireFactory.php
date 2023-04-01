<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Questionnaire>
 */
class QuestionnaireFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     *
     * fake()->tipo_de_dato($argumento = valor);
     * fake es una función que nos ayuda a llenar una base de datos. 
     * unique() : Es un método que define un valor único.
     * 
     * Tipos.
     * bs : Retorna un texto descriptivo acerca de una empresa X. 
     * catchPhrase : Retorna un texto descriptivo acerca de lo que hace una empresa X. 
     * numberBetween($min = 0, $max = Null) : Retorna un número entre $min y $max
     */
    public function definition(): array
    {
        return [
            'ask'    => fake()->bs(),
            'answer' => fake()->catchPhrase(),
            'bad1'   => fake()->catchPhrase(),
            'bad2'   => fake()->catchPhrase(),
            'bad3'   => fake()->catchPhrase(),
            'teacher_id'  => "1",
            'module_id'   => fake()->numberBetween($min = 1, $max = 5),
        ];
    }
}
