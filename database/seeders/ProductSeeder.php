<?php

namespace Naykel\Shopit\Database\Seeders;

use Illuminate\Database\Seeder;
use Naykel\Shopit\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Some Product',
            'code' => 'nk-abc',
            'image' => 'naykel-400.png',
            'price' => 4.99,
        ]);
        Product::create([
            'name' => 'Another Product',
            'code' => 'nk-xyz',
            'image' => 'naykel-400.png',
            'price' => 87.50,
        ]);
        Product::create([
            'name' => 'Yet Another Product',
            'code' => 'nk-123',
            'image' => 'naykel-400.png',
            'price' => 848.00,
        ]);

        // Product::factory(100)->create();
    }
}
