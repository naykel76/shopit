<?php

namespace Naykel\Shopit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Naykel\Shopit\Cart
 */
class Cart extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'cart';
    }
}
