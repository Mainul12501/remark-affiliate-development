<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::factory()
            ->count(10)
            ->create();
    }
}
