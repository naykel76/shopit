<?php

namespace Naykel\Shopit\Contracts;

use Illuminate\Support\Collection;

interface CartInterface
{
    /**
     * Add or subtract an item from the cart.
     * 
     * an item to the cart or update its quantity.
     *
     * This method will add the item to the cart if it doesn't exist, or
     * increment the quantity if it does.
     */
    public function updateQuantity(int $id, int $qty): void;

    /**
     * Remove an item complexly from the cart.
     */
    public function removeItem(int $id): void;

    /**
     * Clear the entire cart including items, quantities and totals.
     */
    public function clear(): void;

    /**
     * Get the current quantity of an item in the cart.
     */
    public function currentQty(int $id): int;

    /**
     * Retrieve the items in the cart as a collection of product objects with
     * quantities and line totals.
     * 
     * This method fetches the products in the cart and returns them as a
     * collection of objects containing product details including quantities,
     * and line totals, etc.
     * 
     * It returns a collection to make it easier to work with the data in the
     * Livewire component. Specifically in the refresh cart method where the tap
     * method is use to compare the original cart items with the updated cart
     * items.
     */
    public function getCartProductDetails(): Collection;

    /**
     * Retrieve all items in the cart.
     */
    public function items(): array;

    /**
     * Get the total number of items in the cart.
     */
    public function totalItems(): int;

    /**
     * Calculate the total cost of all items in the cart.
     */
    public function totalPrice(): float;

    /**
     * Check if an item exists in the cart.
     */
    // public function hasItem(int $id): bool;
}
