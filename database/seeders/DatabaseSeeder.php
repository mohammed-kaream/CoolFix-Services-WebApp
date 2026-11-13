<?php

namespace Database\Seeders;

use App\Models\HomeService;
use App\Models\Information;
use App\Models\Post;
use App\Models\User;
use Database\Seeders\HomeServiceSeeder;
use Database\Seeders\InformationSeeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\ServiceSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Information::factory(50)->create();

        $this->call(PostSeeder::class);
        $this->call(InformationSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(HomeServiceSeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(HomeCounterSeeder::class);
        $this->call(HomeFeatureSeeder::class);
        $this->call(AboutTeamSeeder::class);
        $this->call(PricingSeeder::class);
        $this->call(AboutFaqSeeder::class);
        $this->call(UserSeeder::class);
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@coolfix.test'],
            ['name' => 'Admin', 'password' => bcrypt('password123'), 'type' => 'admin']
        );
    }
}
