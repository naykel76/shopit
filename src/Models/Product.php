<?php

namespace Naykel\Shopit\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'price' => \Naykel\Gotime\Casts\MoneyCast::class
    ];

    protected static function newFactory()
    {
        return \Naykel\Shopit\Database\Factories\ProductFactory::new();
    }

    public function imageUrl()
    {
        return $this->image_name ? Storage::disk('products')->url($this->image_name) : "/svg/placeholder.svg";
    }
}
