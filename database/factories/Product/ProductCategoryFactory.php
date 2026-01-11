<?php

namespace Database\Factories\Product;

use App\Models\Product\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'thumb_img' => 'https://picsum.photos/640/480?random=' . fake()->uuid(),
            'status' => $this->faker->numberBetween(0, 127),
            'herlan_cat_id' => $this->faker->unique->randomNumber(),
            'herlan_cat_slug' => $this->faker->text(191),
            'herlan_cat_uri' => $this->faker->unique->text(),
            'herlan_cat_total_products' => $this->faker->randomNumber(0),
            'product_category_id' => function () {
                return \App\Models\Product\ProductCategory::factory()->create([
                    'product_category_id' => null,
                ])->id;
            },
        ];
    }
}
