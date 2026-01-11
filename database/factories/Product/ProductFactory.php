<?php

namespace Database\Factories\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(),
            'slug' => $this->faker->text(),
            'thumb_img' => 'https://picsum.photos/640/480?random=' . fake()->uuid(),
            'regular_price' => $this->faker->randomNumber(2),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'sale_price' => $this->faker->randomNumber(2),
            'sku' => $this->faker->unique->text(60),
            'status' => $this->faker->numberBetween(0, 127),
            'herlan_product_id' => $this->faker->unique->randomNumber(),
            'herlan_product_uri' => $this->faker->text(),
            'affiliate_commission_rate' => $this->faker->numberBetween(0, 127),
            'total_clicked' => $this->faker->randomNumber(0),
            'sold_count' => $this->faker->randomNumber(0),
            'product_brand_id' => \App\Models\Product\ProductBrand::factory(),
            'short_description' => $this->faker->text(),
            'long_description' => $this->faker->text(),
        ];
    }
}
