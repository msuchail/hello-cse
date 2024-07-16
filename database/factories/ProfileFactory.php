<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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
        $img = Http::get('https://thispersondoesnotexist.com/')->body();
        $path = 'public/profiles/' . $this->faker->uuid . '.jpg';
        Storage::put($path, $img);

        return [
            'nom' => $this->faker->name,
            'prenom' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'statut' => $this->faker->randomElement(['active', 'inactive', 'pending']),
            'description' => $this->faker->text(1000),
            'image' => $path,
        ];
    }
}
