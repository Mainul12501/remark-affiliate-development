<?php

namespace Database\migrations;

use App\Models\Product\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductImage::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'src' => $this->faker->text(),
            'position' => $this->faker->numberBetween(0, 127),
            'img_alt' => $this->faker->text(),
            'status' => $this->faker->numberBetween(0, 127),
            'herlan_img_id' => $this->faker->unique->randomNumber(),
            'herlan_img_src' => $this->faker->text(),
            'product_id' => \App\Models\Product\Product::factory(),
        ];
    }
}
