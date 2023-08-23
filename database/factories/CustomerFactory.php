<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->unique()->firstName(),
            'lastname' => fake()->unique()->lastName(),
            'date_of_birth' => fake()->unique()->dateTimeBetween('-30 years', 'now'),
            'phonenumber' => fake()->phoneNumber(),
            'email' => fake()->unique()->email(),
            'bank_account' => fake()->iban(),
            'status' => 1,
        ];
    }
}
