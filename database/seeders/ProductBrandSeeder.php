<?php

namespace Database\Seeders;

use App\Models\Product\ProductBrand;
use Illuminate\Database\Seeder;

class ProductBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductBrand::factory()
            ->count(10)
            ->create();
    }
}
