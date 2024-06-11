<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productVariant = [
            [
                'product_id' => 1,
                'price' => 200.00,
                'discount' => 0,
                'discount_id' => 0,
                'selling_price' => 200.00,
                'variant_name' => 'Color',
                'sub_variant_name' => 'Pink',
                'single_image' => 'images/products/18-04-2024_1302_fresh-kashmiri-apples.png',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'product_id' => 1,
                'price' => 220.00,
                'discount' => 10,
                'discount_id' => 1,
                'selling_price' => 200.00,
                'variant_name' => 'Color',
                'sub_variant_name' => 'Red',
                'single_image' => 'images/products/18-05-2024_1302_fresh-kashmiri_red.png',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'product_id' => 2,
                'price' => 150.00,
                'discount' => 5,
                'discount_id' => 2,
                'selling_price' => 142.50,
                'variant_name' => 'Size',
                'sub_variant_name' => 'Large',
                'single_image' => 'images/products/18-04-2024_1302_black_diamond_large.png',
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];
        DB::table('product_variants')->insert($productVariant);
    }
}