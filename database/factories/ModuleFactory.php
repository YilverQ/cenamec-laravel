<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
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
     * company() : Retorna un nombre de una empresa. 
     * numberBetween($min = 0, $max = Null) : Retorna un número entre $min y $max
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->company(),
            'level' => fake()->numberBetween($min = 1, $max = 4),
            'teacher_id' => fake()->numberBetween($min = 1, $max = 2),
        ];
    }
}
