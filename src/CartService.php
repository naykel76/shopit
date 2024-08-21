<?php

namespace Naykel\Shopit;

use Illuminate\Support\Collection;
use Naykel\Shopit\Contracts\CartInterface;
use Illuminate\Support\Facades\Session;
use Naykel\Shopit\Models\Product;

class CartService implements CartInterface
{
    public function updateQuantity(int $id, int $qty): void
    {
        $currentQty = $this->currentQty($id);
        $newQty = $currentQty + $qty;

        if ($newQty < 1) {
            $this->removeItem($id);
            // clear the cart if there are no items
            if (empty($this->items())) $this->clear();
            return;
        }

        Session::put($this->getItemKey($id), $newQty);
    }

    public function removeItem(int $id): void
    {
        Session::remove($this->getItemKey($id));

        // clear the cart if there are no items
        if (empty($this->items())) $this->clear();
    }

    public function clear(): void
    {
        Session::forget('cart');
    }

    public function currentQty(int $id): int
    {
        return Session::get($this->getItemKey($id), 0);
    }

    public function getCartProductDetails(): Collection
    {
        $cartItems = $this->items();

        if (empty($cartItems)) return new Collection();

        return Product::whereIn('id', array_keys($cartItems))
            ->get()
            ->map(function (Product $product) use ($cartItems) {
                return (object)[
                    'id' => $product->id,
                    'name' => $product->name,
                    'slug' => $product->slug,
                    'price' => $product->price,
                    'image_url' => $product->mainImageUrl(),
                    'qty' => $qty = $cartItems[$product->id], // this feels a little mystical
                    'lineTotal' => $product->price * $qty,
                ];
            });
    }

    // this is not the complete cart, it is only the id and qty of each item
    public function items(): array
    {
        return Session::get('cart.items', []);
    }

    public function totalItems(): int
    {
        return array_sum(Session::get('cart.items', []));
    }

    // this is not really used in the Livewire component, but it is here for
    // completeness. The Livewire component uses the tap method to calculate the
    // total price.
    public function totalPrice(): float
    {
        return $this->getCartProductDetails()->sum('lineTotal');
    }

    /**
     * Get the key for an item in the session cart.
     */
    private function getItemKey(int $id): string
    {
        return 'cart.items.' . $id;
    }
}
