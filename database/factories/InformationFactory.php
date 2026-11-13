<?php

namespace Database\Factories;

use App\Models\Information;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Information>
 */
class InformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->email(),
            'password' => $this->faker->password(),
        ];
    }
}
