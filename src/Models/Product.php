<?php

namespace Naykel\Shopit\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Naykel\Shopit\Database\Factories\ProductFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory, HasSlug;

    protected static function newFactory(): Factory
    {
        return ProductFactory::new();
    }

    public function mainImageUrl()
    {
        return $this->image_name
            ? Storage::disk('products')->url($this->image_name)
            : url('/svg/placeholder.svg');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function scopeActive(Builder $query)
    {
        return $query->whereNotNull('released_at');
    }
}
