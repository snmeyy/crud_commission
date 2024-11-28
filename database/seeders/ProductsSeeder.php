<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'image'=> 'lineart.jpg',
                'title'=>'LineArt',
                'description' => 'line art product',
                'price' => 10000,
                'stock' => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'image'=> 'lineart.jpg',
                'title'=>'LineArt',
                'description' => 'line art product',
                'price' => 10000,
                'stock' => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
