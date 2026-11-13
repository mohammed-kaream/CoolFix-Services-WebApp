<?php

namespace Database\Seeders;

use App\Models\HomeCounter;
use Illuminate\Database\Seeder;

class HomeCounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // سطر محمد السحري يولد وضخ 4 كروت إحصائيات فوراً بالاعتماد على الفاكتوري
        HomeCounter::factory(4)->create();
    }
}
