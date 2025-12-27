<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $this->_create(['name' => 'Super Admin', 'email' => 'superadmin@example.com', 'password' => Hash::make('password'), 'mobile_no' => '01815495595', 'account_type' => 'backend','password_changed_at' => now(), 'is_active' => true,'profile_image'=>$this->generateFakeImage()]);
       $this->_create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => Hash::make('password'), 'mobile_no' => '01612456789', 'account_type' => 'backend', 'password_changed_at' => now(), 'is_active' => true,'profile_image'=>$this->generateFakeImage()]);

        // $faker = Faker::create();

        // foreach (range(1, 35000) as $index) {
        //     User::create([
        //         'name'                  => $faker->name,
        //         'email'                 => $faker->unique()->safeEmail,
        //         'password'              => Hash::make('password'),
        //         'mobile_no'             => '01' . $faker->numberBetween(100000000, 999999999),
        //         'password_changed_at'   => now(),
        //         'profile_image'         => $this->generateFakeImage(),
        //     ]);
        // }
    }
    public function generateFakeImage(): string
    {
        $imageUrl = 'https://picsum.photos/250/250?random=' . uniqid(rand(1, 1000), true);
        return $imageUrl;
    }

    private function _create(array $data)
    {
        return User::create($data);
    }
}
