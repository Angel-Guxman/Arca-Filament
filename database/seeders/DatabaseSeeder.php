<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         Role::create(['name' => 'customer']);
         Role::create(['name' => 'administrator']);
         User::factory(10)->create();
        $this->call([CategoriesSeeder::class,ProductsSeeder::class,ImageProductsSeeder::class]);
       //  Product::factory(10)->create();


       $customerUser= User::factory()->create([
            'name' => 'Misael',
            'email' => 'misael@gmail.com',
            'password'=>'password'
        ]);

        $customerAdministrator= User::factory()->create([
            'name' => 'Angel',
            'email' => 'angel@gmail.com',
            'password'=>'password'
        ]);

        $customerUser->assignRole('customer');
        $customerAdministrator->assignRole('administrator');
    }
}
