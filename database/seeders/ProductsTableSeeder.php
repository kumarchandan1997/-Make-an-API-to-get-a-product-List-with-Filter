<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                "title" => "Kashmir Apples 2",
                "category_id" => 4,
                "sub_category_id" => 7,
                "child_category_id" => 15,
                "sort_price" => 200.00,
                "product_price_type" => 1,
                "single_image" => "images/products/18-04-2024_1302_fresh-kashmiri-apples.png",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "title" => "Black Dimond Apple",
                "category_id" => 4,
                "sub_category_id" => 7,
                "child_category_id" => 15,
                "sort_price" => 1.00,
                "product_price_type" => 0,
                "single_image" => "images/products/02-04-2024_6703_Black1.jpeg",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}