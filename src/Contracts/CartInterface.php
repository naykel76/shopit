<?php

namespace Naykel\Shopit\Contracts;

interface CartInterface
{

    /**
     * Get all products in the cart.
     */
    public function all(): array;

    /**
     * Add product to cart.
     *
     * @param int $id
     * @param int $qty
     */
    public function add(int $id, int $qty): void;


    /**
     * Get product's current quantity.
     *
     * @param int $id
     */
    public function getCurrentQty(int $id): int;

    /**
     * Remove item from cart.
     * @param int $id
     */
    public function remove(int $id): void;

    /**
     * Clear the cart.
     */
    public function clear(): void;
}
