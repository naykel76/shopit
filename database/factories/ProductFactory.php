<?php

namespace Naykel\Shopit\Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Naykel\Shopit\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public $images = ['naykel-400-001.png', 'naykel-400-002.png', 'naykel-400-003.png', 'naykel-400-004.png', 'naykel-400-005.png'];

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'code' => 'PR-' . $this->faker->unique()->numberBetween(500, 900),
            'image_name' => $this->faker->randomElement($this->images),
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }

    public function released(?Carbon $date = null): self
    {
        return $this->state(
            fn (array $attr) => ['released_at' => $date ?? Carbon::now()]
        );
    }
}
