<?php

namespace Database\Seeders;

use App\Models\AboutFaq;
use Illuminate\Database\Seeder;

class AboutFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // مصفوفة الأسئلة الستة الحقيقية بالتفصيل المريح من واجهتك 🎯
        $faqs = [
            [
                'question' => 'How much does a repair cost?',
                'answer'   => 'A diagnostic visit starts at ₪80, and most standard repairs run from ₪150 plus parts. You\'ll always get a clear quote before we start any work — see our Pricing page for details.'
            ],
            [
                'question' => 'How fast can you come out?',
                'answer'   => 'We offer same-day service in most areas of Gaza. Our technicians are equipped to handle urgent cooling breakdowns quickly to save your food from spoiling.'
            ],
            [
                'question' => 'Do you repair commercial fridges and freezers?',
                'answer'   => 'Yes, we specialize in both residential and commercial cooling units. From supermarket display fridges to restaurant walk-in freezers, we fix them all.'
            ],
            [
                'question' => 'What brands do you work with?',
                'answer'   => 'We work with all major appliance brands including Samsung, LG, Beko, Whirlpool, Bosch, and many local commercial cooling systems.'
            ],
            [
                'question' => 'Is there a warranty on repairs?',
                'answer'   => 'Absolutely. All our standard repairs come with a reliable 6-month warranty on both parts and labor, giving you peace of mind.'
            ],
            [
                'question' => 'How do I book a visit?',
                'answer'   => 'You can book a technician instantly by calling our hotline at 0598 924 040, messaging us on WhatsApp, or using the booking form on our contact page.'
            ]
        ];

        // حقن وضخ الأسئلة الستة بداخل جدول قاعدة البيانات عن طريق حلقة التكرار
        foreach ($faqs as $data) {
            AboutFaq::create([
                'question'  => $data['question'],
                'answer'    => $data['answer'],
                'is_active' => true
            ]);
        }
    }
}
