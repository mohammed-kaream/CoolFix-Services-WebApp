<?php

namespace Database\Factories;

use App\Models\AboutFaq;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AboutFaq>
 */
class AboutFaqFactory extends Factory
{
    protected $model = AboutFaq::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'question' => $this->faker->sentence() . '?',
            'answer' => $this->faker->paragraph(),
            'is_active' => true,
        ];
    }
}
