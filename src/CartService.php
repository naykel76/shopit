<?php

namespace Naykel\Shopit;

use Naykel\Shopit\Contracts\CartInterface;
use Illuminate\Contracts\Session\Session;

class CartService implements CartInterface
{

    public function __construct(private Session $session)
    {
    }

    public function add(int $id, int $qty): void
    {
        $this->session->put($this->getItemKey($id), $qty);
    }

    public function remove(int $id): void
    {
        $this->session->remove($this->getItemKey($id));
    }

    public function getCurrentQty(int $id): int
    {
        return $this->session->get($this->getItemKey($id), 0);
    }

    /**
     * Get the key for an item in the session cart.
     */
    private function getItemKey(int $id): string
    {
        return 'cart.items.' . $this->product($id);
    }

    //
    //
    //
    //
    //
    //
    //
    //
    //
    public function all(): array
    {
        return $this->session->get('cart.items', []);
    }
    private function product(int $id): string
    {
        // get the rest of the product details???
        return $id;  // ['cart' => [productId => qty]]
    }


    public function clear(): void
    {
        $this->session->forget('cart');
    }
}

// public function clearCart()
// {
//     Session()->forget('cart');
//     return back();
// }
