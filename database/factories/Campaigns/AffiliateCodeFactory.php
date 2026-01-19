<?php

namespace Database\Factories\Campaigns;

use Illuminate\Support\Str;
use App\Models\Campaigns\AffiliateCode;
use Illuminate\Database\Eloquent\Factories\Factory;

class AffiliateCodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AffiliateCode::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_parent_code' => $this->faker->numberBetween(0, 127),
            'code' => $this->faker->unique->text(80),
            'product_ref_link' => $this->faker->text(),
            'total_hit' => $this->faker->randomNumber(0),
            'total_order' => $this->faker->randomNumber(0),
            'total_sell' => $this->faker->randomNumber(0),
            'product_sku' => $this->faker->text(255),
            'status' => $this->faker->numberBetween(0, 127),
            'created_by' => \App\Models\User::factory(),
            'product_id' => \App\Models\Product\Product::factory(),
            'influencer_campain_id' => \App\Models\Campaigns\InfluencerCampain::factory(),
        ];
    }
}
