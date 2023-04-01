<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
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
     * jobTitle() : Retorna un nombre de un área de trabajo. Ejemplo: "Cajero". 
     * numberBetween($min = 0, $max = Null) : Retorna un número entre $min y $max
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->jobTitle(),
            'teacher_id' => fake()->numberBetween($min = 1, $max = 2),
        ];
    }
}
