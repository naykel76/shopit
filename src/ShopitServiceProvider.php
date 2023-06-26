<?php

namespace Naykel\Shopit;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;
use Naykel\Shopit\CartService;
use Naykel\Shopit\Commands\InstallCommand;
use Naykel\Shopit\Contracts\CartInterface;
use Naykel\Shopit\Http\Livewire\AddToCartButton;
use Naykel\Shopit\Http\Livewire\Cart;

class ShopitServiceProvider extends ServiceProvider
{
    public $singletons = [
        CartInterface::class => CartService::class,
    ];

    public function register()
    {
        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('add-to-cart-button', AddToCartButton::class);
            Livewire::component('cart', Cart::class);
        });
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'shopit');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        // $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->commands([InstallCommand::class]);
    }
}
