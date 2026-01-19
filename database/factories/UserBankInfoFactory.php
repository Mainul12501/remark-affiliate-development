<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\UserBankInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserBankInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserBankInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_name' => $this->faker->text(255),
            'branch_name' => $this->faker->text(),
            'routing_number' => $this->faker->text(255),
            'cheque_img' => $this->faker->text(),
            'vendor_type' => 'mobile',
            'mobile_vendor' => 'bkash',
            'mobile_number' => $this->faker->phoneNumber(),
            'status' => $this->faker->numberBetween(0, 127),
            'active_status' => 'inactive',
            'active_till' => $this->faker->text(255),
            'account_number' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
            'bank_id' => \App\Models\Bank::factory(),
        ];
    }
}
