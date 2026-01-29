<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Spectacles',
                'image' => 'images/1734930736.webp',
            ],
            [
                'name' => 'Sunglasses',
                'image' => 'images/1734930748.png',
            ],
            [
                'name' => 'Clip-On',
                'image' => 'images/1734930757.png',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
