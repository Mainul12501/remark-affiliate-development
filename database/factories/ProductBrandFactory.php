<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Product\ProductBrand;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductBrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductBrand::class;

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
            'logo' => $this->faker->text(),
            'status' => $this->faker->numberBetween(0, 127),
            'herlan_brand_id' => $this->faker->unique->randomNumber(),
            'herlan_brand_slug' => $this->faker->unique->text(255),
            'note' => $this->faker->text(),
        ];
    }
}
