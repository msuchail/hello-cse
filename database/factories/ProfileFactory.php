<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name,
            'prenom' => $this->faker->firstName,
            'statut' => $this->faker->randomElement(['active', 'inactive', 'pending']),
            'description' => $this->faker->text(1000),
            'image' => 'https://thispersondoesnotexist.com/'
        ];
    }
}
