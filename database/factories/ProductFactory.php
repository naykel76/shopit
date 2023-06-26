<?php

namespace Naykel\Shopit\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Naykel\Shopit\Models\Product;

class ProductFactory extends Factory
{

    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'code' => 'COU' . random_int(400, 95786),
            //'slug'=> ,
            //'headline'=> ,
            //'description'=> ,
            //'body'=> ,
            //'image'=> ,
            //'price'=> ,
            //'extra_data'=> ,
            //'published_at'=> ,
            //'tested_at'=> ,
            //'category_id'=> ,
            //' $table->timestamps();'=> ,
        ];
    }
}

// if (rand(1, 3) == 3) {
//     $published = null;
// } else {
//     $published = now();
// }

// return [
//     'name' => $this->faker->sentence,
//     'price' => $this->faker->numberBetween($min = 10, $max = 5000) / 100,
//     'published_at' => $published,

//     'qoh' => random_int(0, 10),
//     'headline' => $this->faker->realText($maxNbChars = 74, $indexSize = 2),
//     'description' => $this->faker->paragraph(20),
// ];
