<?php

namespace Database\Factories;

use App\Models\UserInfo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bio' => $this->faker->sentence(15),
            'current_balance' => $this->faker->randomNumber(2),
            'total_conversion' => $this->faker->randomNumber(2),
            'total_earnings' => $this->faker->randomNumber(2),
            'tiktalk_profile_link' => $this->faker->text(),
            'is_tiktalk_varified' => $this->faker->numberBetween(0, 127),
            'fb_profile_link' => $this->faker->text(),
            'is_fb_verified' => $this->faker->numberBetween(0, 127),
            'youtube_profile_link' => $this->faker->text(),
            'is_youtube_verified' => $this->faker->numberBetween(0, 127),
            'tin_number' => $this->faker->text(255),
            'bin_number' => $this->faker->text(255),
            'tin_cert_img' => $this->faker->text(),
            'nid' => $this->faker->text(255),
            'insta_profile_link' => $this->faker->text(),
            'is_insta_verified' => $this->faker->numberBetween(0, 127),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
