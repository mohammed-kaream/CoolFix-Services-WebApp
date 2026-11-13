<?php

namespace Database\Seeders;

use App\Models\AboutTeam;
use Illuminate\Database\Seeder;

class AboutTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // توليد وضخ 3 كروت لفريق العمل بلمحة بصر
        AboutTeam::factory(8)->create();
    }
}
