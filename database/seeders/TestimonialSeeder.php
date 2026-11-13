<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // توليد وضخ 3 كروت آراء زبائن حقيقية بلمحة بصر
        Testimonial::factory(10)->create();
    }
}
