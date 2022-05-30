<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use App\Models\ProductSave;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();
        User::created([
            'name' => 'user',
            'image' => 'image/user1.png',
            'email' => 'user@gmail.com',
            'password' => Hash::make('useruser')
        ]);

        User::created([
            'name' => 'admin',
            'image' => 'image/user1.png',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminadmin')
        ]);

        Category::factory(5)->create();
        Product::factory(50)->create();
        ProductCart::factory(5)->create();
        ProductOrder::factory(5)->create();
        ProductSave::factory(5)->create();

    }
}
