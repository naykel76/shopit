<?php

namespace Naykel\Shopit\Livewire;

use Livewire\Component;
use Naykel\Shopit\Facades\Cart;
use Naykel\Shopit\Models\Product;

class AddToCartButton extends Component
{
    public Product $product;
    public int $qty = 1;

    public function add(): void
    {
        Cart::updateQuantity($this->product->id, (int) $this->qty);

        $this->dispatch('cart-updated');
        $this->dispatch('notify', 'Item added to cart');
    }

    public function render()
    {
        return view('shopit::livewire.cart.add-to-cart-button');
    }
}
