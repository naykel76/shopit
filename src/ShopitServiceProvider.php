<?php

namespace Naykel\Shopit;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Naykel\Shopit\Commands\InstallCommand;
use Naykel\Shopit\Contracts\CartInterface;
use Naykel\Shopit\Livewire\AddToCartButton;
use Naykel\Shopit\Livewire\ShoppingCart;

class ShopitServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Bind the interface to the service
        $this->app->bind(CartInterface::class, CartService::class);

        // Register the service as a singleton for the facade
        $this->app->singleton('cart', function ($app) {
            return $app->make(CartService::class);
        });
    }
    public function boot()
    {
        $this->commands([InstallCommand::class]);
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'shopit');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        Livewire::component('add-to-cart-button', AddToCartButton::class);
        Livewire::component('shopping-cart', ShoppingCart::class);
    }
}
