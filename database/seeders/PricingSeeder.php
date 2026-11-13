<?php

namespace Database\Seeders;

use App\Models\Pricing;
use App\Models\PricingFeature;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. مصفوفة الباقات الثلاثة الحقيقية المأخوذة من صورتك بالظبط 🎯
        $packages = [
            [
                'name' => 'Basic Checkup',
                'description' => 'A quick diagnostic visit for a single fridge or freezer that isn\'t cooling right.',
                'price' => 80,
                'billing_period' => '/ VISIT',
                'button_text' => 'BOOK THIS VISIT',
                'features' => [
                    'Full diagnostic inspection',
                    'Gas pressure & leak check',
                    'Door seal & thermostat test',
                    'Written quote for any repair',
                    'Visit fee waived if you proceed'
                ]
            ],
            [
                'name' => 'Standard Repair',
                'description' => 'Our most-booked package — covers the majority of fridge and freezer breakdowns.',
                'price' => 150,
                'billing_period' => '+ PARTS',
                'button_text' => 'BOOK THIS REPAIR',
                'features' => [
                    'Everything in Basic Checkup',
                    'Gas refill (Freon) if needed',
                    'Thermostat or control repair',
                    '6-month parts & labor warranty',
                    'Same-day service, most areas'
                ]
            ],
            [
                'name' => 'Full Service Contract',
                'description' => 'Continuous cooling coverage for homes and shops to prevent issues.',
                'price' => 250,
                'billing_period' => '/ YEAR',
                'button_text' => 'GET THIS PLAN',
                'features' => [
                    '2 scheduled maintenance visits',
                    'Priority same-day emergency calls',
                    '12-month parts & labor warranty',
                    'Compressor replacement discount',
                    'Covers up to 2 units'
                ]
            ]
        ];

        // 2. تكرار الحقن الذكي لربط الباقة بميزاتها عبر الـ ForeignKey تلقائياً 🚀
        foreach ($packages as $pkgData) {
            $pricing = Pricing::create([
                'name' => $pkgData['name'],
                'description' => $pkgData['description'],
                'price' => $pkgData['price'],
                'billing_period' => $pkgData['billing_period'],
                'button_text' => $pkgData['button_text'],
                'is_active' => true,
            ]);

            // ضخ أسطر التشيك مارك التابعة للباقة الحالية
            foreach ($pkgData['features'] as $featureName) {
                PricingFeature::create([
                    'pricing_id' => $pricing->id,
                    'feature_name' => $featureName,
                ]);
            }
        }
    }
}
