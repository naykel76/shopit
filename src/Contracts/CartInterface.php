<?php

namespace Naykel\Shopit\Contracts;

interface CartInterface
{
    /**
     * Add an item to the cart.
     *
     * @param  int  $id  The ID of the item to add.
     * @param  int  $qty  The quantity of the item to add.
     */
    public function add(int $id, int $qty): void;

    /**
     * Remove an item from the cart.
     *
     * @param  int  $id  The ID of the item to remove.
     */
    public function remove(int $id): void;

    /**
     * Get the current quantity of an item in the cart.
     *
     * @param  int  $id  The ID of the item.
     * @return int The current quantity of the item in the cart.
     */
    public function currentQty(int $id): int;

    // /**
    //  * Get all items in the cart.
    //  *
    //  * @return array An array of all items in the cart.
    //  */
    // public function items(): array;

    /**
     * Clear all items from the cart.
     */
    public function clear(): void;
}
