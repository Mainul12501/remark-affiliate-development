<?php

namespace Database\Factories\Product;

use Illuminate\Support\Str;
use App\Models\Product\ProductCommissionRate;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCommissionRateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCommissionRate::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_sku' => $this->faker->randomNumber(0),
            'commission_type' => 'percentage',
            'amount' => $this->faker->randomNumber(2),
            'status' => $this->faker->numberBetween(0, 127),
            'product_name' => $this->faker->text(255),
            'product_image' => $this->faker->text(),
        ];
    }
}
