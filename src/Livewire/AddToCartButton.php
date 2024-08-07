<?php

namespace Naykel\Shopit\Livewire;

use Livewire\Component;

class AddToCartButton extends Component
{
    public bool $showQtyInput = true;
    public int $currentQty = 0;
    public int $itemId;
    public int $qty = 1;

    public function hydrate(): void
    {
        $this->currentQty = Cart::getCurrentQty($this->itemId);
    }

    /**
     * add product to cart
     */
    public function add(): void
    {

        $qty = $this->currentQty + (int) $this->qty;

        if ($qty < 1) return;

        Cart::add($this->itemId, $qty);

        $this->qty = 1; // reset to prepare for the next quantity input

        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('shopit::add-to-cart-button');
    }
}
