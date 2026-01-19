<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaigns\InfluencerCampain;

class InfluencerCampainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InfluencerCampain::factory()
            ->count(5)
            ->create();
    }
}
