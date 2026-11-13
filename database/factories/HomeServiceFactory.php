<?php

namespace Database\Factories;

use App\Models\HomeService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HomeService>
 */
class HomeServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // مصفوفة العناوين الحقيقية من تصميمك
            'title' => $this->faker->randomElement([
                'Refrigerator Repair', 'Gas Refill (Freon)', 'Freezer Repair',
                'Compressor Replacement', 'Thermostat Repair', 'Door Seal Replacement',
                'Fan Motor Fix', 'Preventive Maintenance'
            ]),

            // النص البيضاوي الصغير
            'sub_text' => $this->faker->randomElement([
                'Home & kitchen units', 'Leak testing included', 'Chest & upright freezers',
                'Original parts replacement', 'Wiring & temperature fix', 'Magnetic seal fix',
                'Noisy fan solutions', 'Seasonal check-up'
            ]),

            // الأيقونات المتناسقة
            'icon' => $this->faker->randomElement([
                'fa-snowflake', 'fa-tint', 'fa-plug', 'fa-wrench',
                'fa-bolt', 'fa-shield-halved', 'fa-gauge-high', 'fa-gears'
            ]),

            // التعديل المطلوب: العودة للألوان الأصلية الواضحة والزاهية من صورتك الأولى 🎨
            'bg_color' => $this->faker->randomElement([
                '#e8f5e9', // الأخضر الزاهي الأصلي
                '#e3f2fd', // الأزرق الواضح الأصلي
                '#f3e5f5', // الموف/البنفسجي الأصلي
                '#fffde7', // الأصفر الواضح الأصلي
                '#efebe9', // الرمادي الدافئ الأصلي
                '#f1f8e9', // الأخضر العشبي الأصلي
                '#e0f7fa', // الفيروزي/السيان الأصلي
                '#ffe0b2'  // البرتقالي الخفيف الأصلي
            ]),

            'is_active' => true,
        ];
    }
}
