<?php

namespace App\Services;

use App\Models\Product;
use Money\Money;

class CartService
{
    public function addToCart(Product $product): array
    {
        $shoppingCart = session('shoppingCart', []);

        if (isset($shoppingCart[$product->id])) {
            $shoppingCart[$product->id]['amount'] += 1;
        } else {
            $shoppingCart[$product->id] = [
                'productId' => $product->id,
                'amount' => '1',
                'price' => $product->price,
                'name' => $product->name,
                'discount' => $product->discount
            ];
        }

        session(['shoppingCart' => $shoppingCart]);
        return $shoppingCart;
    }

    public function removeFromCart(Product $product): array|null
    {
        $shoppingCart = session('shoppingCart', []);

        if (!isset($shoppingCart[$product->id])) {
            return null;
        }

        if ($shoppingCart[$product->id]['amount'] == 1) {
            unset($shoppingCart[$product->id]);
        } else {
            $shoppingCart[$product->id]['amount'] = -1;
        }

        session(['shoppingCart' => $shoppingCart]);
        return $shoppingCart;
    }

    public function getShoppingCart(): array
    {
        return session()->get('shoppingCart');
    }

    public function getCartSubTotal(): int
    {
        $subTotal = 0;

        foreach ($this->getShoppingCart() as $cart) {
            $subTotal += $cart['price'] * $cart['amount'];
        }

        return $subTotal;
    }

    public function getCartAmount(): int
    {
        return count($this->getShoppingCart());
    }
}
