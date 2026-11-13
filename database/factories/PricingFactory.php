<?php

namespace Database\Factories;

use App\Models\Pricing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pricing>
 */
class PricingFactory extends Factory
{
    protected $model = Pricing::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Basic Checkup', 'Standard Repair', 'Full Service Contract']),
            'description' => 'A professional cooling cooling repair and contract package for Gaza homes.',
            'price' => $this->faker->randomElement([80, 150, 250]),
            'billing_period' => $this->faker->randomElement(['/ VISIT', '+ PARTS', '/ YEAR']),
            'button_text' => 'BOOK THIS SERVICE',
            'is_active' => true,
        ];
    }
}
