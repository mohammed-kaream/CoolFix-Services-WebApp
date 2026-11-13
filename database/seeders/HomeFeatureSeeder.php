<?php

namespace Database\Seeders;

use App\Models\HomeFeature;
use Illuminate\Database\Seeder;

class HomeFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // سطر محمد السحري يولد ويضخ 6 كروت ميزات بضربة واحدة عبر الفاكتوري
        HomeFeature::factory(6)->create();
    }
}
