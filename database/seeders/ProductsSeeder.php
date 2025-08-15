<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Collar de Jade Clásico', 'price' => 1299, 'stock' => 20, 'category_name' => 'Collares'],
            ['name' => 'Collar de Jade con Dijes', 'price' => 1599, 'stock' => 15, 'category_name' => 'Collares'],
            ['name' => 'Collar de Jade Elegante', 'price' => 1999, 'stock' => 10, 'category_name' => 'Collares'],
            ['name' => 'Aretes de Jade Redondos', 'price' => 799, 'stock' => 25, 'category_name' => 'Aretes'],
            ['name' => 'Aretes de Jade Largos', 'price' => 999, 'stock' => 18, 'category_name' => 'Aretes'],
            ['name' => 'Aretes de Jade con Plata', 'price' => 1299, 'stock' => 12, 'category_name' => 'Aretes'],
            ['name' => 'Pulsera de Jade Trenzada', 'price' => 1099, 'stock' => 20, 'category_name' => 'Pulseras'],
            ['name' => 'Pulsera de Jade y Cuarzo', 'price' => 1399, 'stock' => 10, 'category_name' => 'Pulseras'],
            ['name' => 'Pulsera de Jade Natural', 'price' => 999, 'stock' => 25, 'category_name' => 'Pulseras'],
            ['name' => 'Pulsera de Jade Minimalista', 'price' => 899, 'stock' => 30, 'category_name' => 'Pulseras'],
        ];
        

      
        

       
        foreach ($products as $index => $product) {

            $categoryId = Category::where('name', $product['category_name'])->first()->id;

            Product::create([
                'name' => $product['name'] ?? '',
                'price' => $product['price'] ?? 0,
                'stock' => $product['stock'] ?? 0,
                'category_id' => $categoryId?? 1,
                'featured'=> true,
            ]);
           
        }
    }
}

// php artisan db:seed --class=ProductsSeeder
