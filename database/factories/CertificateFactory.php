<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
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
     * date($format, max) : Retorna una fecha como máximo (ahora) y con el formato ("Y-m-d"). 
     * numberBetween($min = 0, $max = Null) : Retorna un número entre $min y $max
     */
    public function definition(): array
    {
        return [
            'date_certificate' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'course_id'  => fake()->numberBetween($min = 1, $max = 2),
            'student_id' => fake()->numberBetween($min = 1, $max = 2),
        ];
    }
}
