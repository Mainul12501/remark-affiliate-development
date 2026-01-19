<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BenefitListCategory;

class BenefitListCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BenefitListCategory::factory()
            ->count(5)
            ->create();
    }
}
