<?php

namespace Database\Factories;

use App\Models\AboutTeam; // مربوط بالموديل الصحيح تبع الأباوت
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AboutTeam>
 */
class AboutTeamFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            // مصفوفة الأسماء الحقيقية للرؤساء الثلاثة
            'name' => $this->faker->randomElement([
                'Mohammed Kareem Kohail',
                'Ahmad coranty',
                'Samir Barghouti'
            ]),

            // المسمى الوظيفي
            'role' => $this->faker->randomElement([
                'Founder & Lead Technician',
                'Senior AC Specialist',
                'Commercial Cooling Expert'
            ]),

            // اسم الصورة الحقيقية تبعتك من الكود اللي بعته 🖼️
            'image' =>$this->faker->randomElement([
                            'image_131675fab.png',
                            '1778341387517.jpg',
                            'realmadrid.jpg'

            ]),


            // روابط الاتصال والواتساب الحقيقية للدواير 📞
            'phone' => '+970598924040',
            'whatsapp' => 'https://wa.me',

            // الإحصائيات السفلية (الخبرة والتصليحات)
            'experience' => $this->faker->randomElement(['8+ Years', '10+ Years', '6+ Years']),
            'repairs_count' => $this->faker->randomElement(['3000+ Repairs', '2500+ Repairs', '1800+ Repairs']),
            'is_active' => true,
        ];
    }
}
