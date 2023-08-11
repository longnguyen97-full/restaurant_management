<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Starter',
                'slug' => 'starter',
                'description' => 'To discuss starter',
                'type' => 'Item'
            ],
            [
                'name' => 'Main Dish',
                'slug' => 'main-dish',
                'description' => 'To discuss main dish',
                'type' => 'Item'
            ],
            [
                'name' => 'Desserts',
                'slug' => 'desserts',
                'description' => 'To discuss desserts',
                'type' => 'Item'
            ],
            [
                'name' => 'Drinks',
                'slug' => 'drinks',
                'description' => 'To discuss drinks',
                'type' => 'Item'
            ],
            [
                'name' => 'Food & Beverage',
                'slug' => 'food-beverage',
                'description' => 'To discuss food & beverage',
                'type' => 'Blog'
            ],
            [
                'name' => 'Travel & Food',
                'slug' => 'travel-food',
                'description' => 'To discuss travel & food',
                'type' => 'Blog'
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
