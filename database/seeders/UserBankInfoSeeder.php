<?php

namespace Database\Seeders;

use App\Models\UserBankInfo;
use Illuminate\Database\Seeder;

class UserBankInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserBankInfo::factory()
            ->count(5)
            ->create();
    }
}
