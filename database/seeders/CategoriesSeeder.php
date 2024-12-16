<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Aretes'],
            ['name' => 'Collares '],
            ['name' => 'Pulseras'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

// php artisan db:seed --class=CategoriesSeeder

