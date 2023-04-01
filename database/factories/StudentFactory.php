<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
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
     * firstNameMale : Retorna un nombre de hombre. 
     * lastName : Retorna un apellido.
     * numberBetween($min = 0, $max = Null) : Retorna un número entre $min y $max
     * safeEmail : Retorna un correo electrónico.
     * md5 : Retorna una contraseña cifrada con md5.
     * e164PhoneNumber : Retorna un número de teléfono con el siguiente formato:'+584160140472'.
     */
    public function definition(): array
    {
        return [
            'name'      => fake()->firstNameMale(),
            'lastname'  => fake()->lastName(),
            'identification_card' => fake()->unique()->numberBetween($min = 10000000, $max = 40000000),
            'email'     => fake()->unique()->safeEmail(),
            'password'  => "root",
            'number_phone' => fake()->unique()->e164PhoneNumber(),
        ];
    }
}
