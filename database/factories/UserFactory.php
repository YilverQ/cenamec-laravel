<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firts_name'        => fake()->firstNameMale(),
            'second_name'       => fake()->firstNameMale(),
            'lastname'          => fake()->lastName(),
            'second_lastname'   => fake()->lastName(),
            'gender'            => 'Masculino',
            'birthdate'         => fake()->date(),
            'identification_card' => fake()->unique()->numberBetween($min = 10000000, $max = 38000000),
            'number_phone'      => fake()->unique()->e164PhoneNumber(),
            'email'             => fake()->unique()->safeEmail(),
            'password'          => "root",
            'profileimg_id'     => fake()->numberBetween($min = 1, $max = 34),
            'parishe_id'        => fake()->numberBetween($min = 300, $max = 700)
        ];
    }
}
