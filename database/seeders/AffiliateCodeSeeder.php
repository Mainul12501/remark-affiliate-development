<?php

namespace Database\Seeders;

use App\Models\Campaigns\AffiliateCode;
use Illuminate\Database\Seeder;

class AffiliateCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AffiliateCode::factory()
            ->count(5)
            ->create();
    }
}
