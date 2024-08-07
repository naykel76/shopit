<?php

namespace Naykel\Shopit;

use Naykel\Shopit\Contracts\CartInterface;
use Illuminate\Support\Facades\Session;

class CartService implements CartInterface
{
    public function add(int $id, int $qty): void
    {
        Session::put($this->getItemKey($id), $qty);
    }

    public function remove(int $id): void
    {
        Session::remove($this->getItemKey($id));
    }

    public function currentQty(int $id): int
    {
        return Session::get($this->getItemKey($id), 0);
    }

    /**
     * Get the key for an item in the session cart.
     */
    private function getItemKey(int $id): string
    {
        return 'cart.items.' . $this->item($id);
    }

    public function all(): array
    {
        return Session::get('cart.items', []);
    }

    private function item(int $id): string
    {
        return $id;
    }

    public function clear(): void
    {
        Session::forget('cart');
    }
}
