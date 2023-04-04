<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
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
     * imageUrl() : Retorna una url de una imagen de internet. 
     * realText($maxNbChars, indexSize) : Retorna un texto largo. 
     * numberBetween($min = 0, $max = Null) : Retorna un número entre $min y $max
     */
    public function definition(): array
    {
        return [
            'img' => fake()->unique()->imageUrl($width = "640px", 
                                                $height = "480px", 
                                                'cats'),
            'description' => fake()->realText($maxNbChars = 200, $indexSize = 2),
            'teacher_id' => "1",
            'level' => fake()->numberBetween($min = 1, $max = 2),
            'module_id'  => fake()->numberBetween($min = 1, $max = 2),
        ];
    }
}
