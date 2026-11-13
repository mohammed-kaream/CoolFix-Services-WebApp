<?php

namespace Database\Seeders;

use App\Models\Information;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Information::factory(10)->Create();
    }
}
