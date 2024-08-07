<?php

namespace Naykel\Shopit\Livewire;

use Naykel\Shopit\Models\Product;
use Naykel\Shopit\Facades\Cart as CartFacade;
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
        $this->cart = CartFacade::all();

        $this->cartItems = tap(
            $this->cartItems(),
            fn (Collection $cartItems) => $this->total = $cartItems->sum('total')
        )->toArray();

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
                    'total' => $product->price * $qty,
                ];
            });
    }


    public function remove(int $pid): void
    {
        CartFacade::remove($pid);
        $this->update();
    }

    public function increase(int $pid): void
    {
        CartFacade::add($pid, $this->cart[$pid] + 1);
        $this->update();
    }

    public function decrease(int $pid): void
    {
        if (($qty = $this->cart[$pid] - 1) < 1) {
            $this->remove($pid);
        } else {
            CartFacade::add($pid, $qty);
            $this->update();
        }
    }

    public function clear()
    {
        CartFacade::clear();
        // WHY NOT FIRING???
        $this->refreshCart();
    }

    public function render()
    {
        return view('shopit::cart.cart');
    }
}
