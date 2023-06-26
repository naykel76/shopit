<?php

use Naykel\Shopit\Contracts\CartInterface;

if (!function_exists('cart')) {
    function cart()
    {
        return app(CartInterface::class);
    }
}

