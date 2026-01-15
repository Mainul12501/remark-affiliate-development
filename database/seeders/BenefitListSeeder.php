<?php

namespace Database\Seeders;

use App\Models\BenefitList;
use Illuminate\Database\Seeder;

class BenefitListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BenefitList::factory()
            ->count(5)
            ->create();
    }
}
