<?php

namespace Naykel\Http\Shopit\Livewire;

use Naykel\Shopit\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Component;

class Cart extends Component
{
    public array $cart = [];
    public array $cartItems = [];
    public $total = 0.00;
    public $showCart = true;

    protected $listeners = ['cartUpdated' => 'hydrate',];

    public function mount(): void
    {
        $this->refreshCart();
    }

    private function update(): void
    {
        $this->emit('cartUpdated');
    }

    public function hydrate(): void
    {
        $this->refreshCart();
    }

    /**
     * Refresh for current cart information
     */
    public function refreshCart(): void
    {
        $this->cart = cart()->all();

        $this->cartItems = tap(
            $this->cartItems(),
            fn (Collection $cartItems) => $this->total = $cartItems->sum('total')
        )->toArray();

        // make total available for checkout
        session()->put('cartTotal', $this->total);
    }

    /**
     * Get cart products.
     */
    public function cartItems(): Collection
    {
        if (empty($this->cart)) {
            return new Collection;
        }

        return Product::whereIn('id', array_keys($this->cart))
            ->get()
            ->map(function (Product $product) {
                return (object)[
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->imageUrl(),
                    'qty' => $qty = $this->cart[$product->id],
                    // push total to session???
                    'total' => $product->price * $qty,
                ];
            });
    }


    public function remove(int $pid): void
    {
        cart()->remove($pid);
        $this->update();
    }

    public function increase(int $pid): void
    {
        cart()->add($pid, $this->cart[$pid] + 1);
        $this->update();
    }

    public function decrease(int $pid): void
    {
        if (($qty = $this->cart[$pid] - 1) < 1) {
            $this->remove($pid);
        } else {
            cart()->add($pid, $qty);
            $this->update();
        }
    }

    public function clear()
    {
        cart()->clear();
        // WHY NOT FIRING???
        $this->refreshCart();
    }

    public function render()
    {
        return view('shopit::cart.cart');
    }
}
