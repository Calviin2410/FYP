<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'RETROFIT WFIH1039 C5 Tortoise Eyeglasses',
                'category_id' => 1,
                'image' => '',
                'price' => 100,
            ],
            [
                'name' => 'RETROFIT WFIH1041 C1 Slim Gold Eyeglasses',
                'category_id' => 2,
                'image' => '',
                'price' => 100,
            ],
            [
                'name' => 'TANOSHI DE16221 C03 Round Black/Gold Eyeglasses',
                'category_id' => 3,
                'image' => '',
                'price' => 100,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
