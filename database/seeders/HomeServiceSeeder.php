<?php

namespace Database\Seeders;

use App\Models\HomeService; // استدعاء الموديل
use Illuminate\Database\Seeder;

class HomeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // السطر السحري والذكي تبعك اللي بيشغل الفاكتوري ويولد 8 كروت فوراً
        HomeService::factory(8)->create();
    }
}
