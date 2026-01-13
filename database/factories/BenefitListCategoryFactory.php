<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\BenefitListCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class BenefitListCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BenefitListCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'slug' => $this->faker->slug(),
            'status' => $this->faker->numberBetween(0, 127),
            'user_type' => 'influencer',
            'created_by' => \App\Models\User::factory(),
            'deleted_by' => \App\Models\User::factory(),
        ];
    }
}
