<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'           => $this->faker->randomElement(['Refrigerator Repair', 'Freezer Repair', 'Gas Refill (Freon)', 'Compressor Replacement', 'Thermostat & Wiring']),
            'category'       => $this->faker->randomElement(['Home Appliances', 'Gas & Leaks', 'Major Repairs', 'Electrical']),
            'icon'           => $this->faker->randomElement(['fa-plug', 'fa-snowflake', 'fa-tint', 'fa-wrench', 'fa-bolt']),
            'starting_price' => $this->faker->randomElement([50, 60, 70, 80, 90, 120, 250]),
            'duration'       => $this->faker->randomElement(['Same-day visit', '1-2 hours', '2-4 hours', '30-45 min']),
            'warranty'       => $this->faker->randomElement(['6-mo warranty', '12-mo warranty', '3-mo warranty']),
            'description'    => $this->faker->paragraph(2), // بيولد جملتين عشوائيات كـ وصف للمشكلة
            'is_active'      => true,

        ];
    }
}
