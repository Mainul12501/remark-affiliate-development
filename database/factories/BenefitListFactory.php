<?php

namespace Database\Factories;

use App\Models\BenefitList;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BenefitListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BenefitList::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand_title' => $this->faker->text(255),
            'amount' => $this->faker->text(255),
            'status' => $this->faker->numberBetween(0, 127),
            'slug' => $this->faker->slug(),
            'benefit_list_category_id' => \App\Models\BenefitListCategory::factory(),
        ];
    }
}
