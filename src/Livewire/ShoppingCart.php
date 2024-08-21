<?php

namespace Naykel\Shopit\Livewire;

use Naykel\Shopit\Models\Product;
use Naykel\Shopit\Facades\Cart;
use Illuminate\Support\Collection;
use Livewire\Component;

class ShoppingCart extends Component
{
    public array $cart = [];
    public array $cartItems = [];
    public float $totalPrice = 0.00;
    public int $totalItems = 0;
    public $showCart = true;

    protected $listeners = ['cart-updated' => 'hydrate'];

    public function mount(): void
    {
        $this->refreshCart();
    }

    public function hydrate(): void
    {
        $this->refreshCart();
    }

    /**
     * Refresh the cart by reloading all items and calculating the total.
     */
    public function refreshCart(): void
    {
        // Retrieve the items in the cart and assign them to the $cart property
        $this->cart = Cart::items();

        // Retrieve detailed information about the products in the cart
        // and calculate the total price of the items in the cart
        $this->cartItems = tap(
            Cart::getCartProductDetails(),
            fn(Collection $cartItems) => $this->totalPrice = $cartItems->sum('lineTotal')
        )->toArray();

        $this->totalItems = Cart::totalItems();
    }

    public function remove(int $id): void
    {
        Cart::removeItem($id);
        $this->refreshCart();
    }

    public function increase(int $id): void
    {
        Cart::updateQuantity($id, 1);
        $this->refreshCart();
    }

    public function decrease(int $id): void
    {
        Cart::updateQuantity($id, -1);
        $this->refreshCart();
    }

    public function clear()
    {
        Cart::clear();
        $this->refreshCart();
    }

    public function render()
    {
        return view('shopit::livewire.cart.shopping-cart');
    }
}
