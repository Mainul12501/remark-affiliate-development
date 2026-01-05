<?php

namespace Database\Seeders;

use App\Models\UserInfo;
use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        UserInfo::factory()
//            ->count(5)
//            ->create();

        UserInfo::create([
            'user_id' => 1,
            'bio'   => "Remark developer info"
        ]);

    }
}
