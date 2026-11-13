<?php

namespace Database\Factories;

use App\Models\HomeCounter; // ربطه بالموديل الصحيح تبعك
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HomeCounter>
 */
class HomeCounterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // مصفوفة تختار أرقام حقيقية ضخمة من صورتك وعشوائية
            'count_value' => $this->faker->randomElement(['8', '2431', '37', '973', '15', '100', '500']),

            // النصوص التوضيحية أسفل الأرقام
            'title' => $this->faker->randomElement([
                'Years in Business',
                'Repairs Completed',
                'Minutes Avg. Response',
                'Happy Customers'
            ]),

            // أيقونات الفونت أوسم المتناسقة مع العدادات
            'icon' => $this->faker->randomElement(['fa-clock', 'fa-award', 'fa-id-card', 'fa-user']),

            // الألوان الزاهية الأصلية المأخوذة من صورتك بالظبط 🎨
            'bg_color' => $this->faker->randomElement([
                '#fffbe7', // الأصفر/الكريمي للكرت الأول
                '#f3e5f5', // الموف/البنفسجي للكرت الثاني
                '#e0f7fa', // الأزرق السماوي للكرت الثالث
                '#ffe0b2'  // الوردي/البرتقالي للكرت الرابع
            ]),

            'is_active' => true,
        ];
    }
}
