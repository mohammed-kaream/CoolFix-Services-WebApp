<?php

namespace Database\Factories;

use App\Models\HomeFeature; // ربطه بالموديل الصحيح 🎯
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HomeFeature>
 */
class HomeFeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            // مصفوفة تختار أسماء حقيقية لكروتك الستة بالظبط من صورتك
            'title' => $this->faker->randomElement([
                'Fast Response', 'Skilled Technicians', 'Genuine Parts',
                'Transparent Pricing', 'Repair Warranty', 'Always Reachable'
            ]),

            // نصوص الشرح التفصيلي الحقيقية المطابقة لفقرات صورتك بالظبط
            'description' => $this->faker->randomElement([
                'Most calls within Gaza get a technician on site the same day, often within the hour.',
                'Years of hands-on experience with residential and commercial cooling units of every brand.',
                'Original or manufacturer-approved compressors, thermostats, and gas - never generic knock-offs.',
                'You get a clear quote before any work starts - the price you agree to is the price you pay.',
                'Every completed job comes with a written warranty covering parts and labor.',
                'Call or WhatsApp 0598 924 040 and speak directly with the person doing your repair.'
            ]),

            // أيقونات الفونت أوسم المتناسقة مع معاني الميزات
            'icon' => $this->faker->randomElement([
                'fa-truck', 'fa-user-gear', 'fa-gears',
                'fa-tag', 'fa-shield-halved', 'fa-headset'
            ]),

            'is_active' => true,
        ];
    }
}
    