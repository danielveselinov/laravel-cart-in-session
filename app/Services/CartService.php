<?php

namespace App\Services;

use App\Models\Product;

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
                'price' => $product->price->getAmount(),
                'name' => $product->name,
                'discount' => $product->discount
            ];
        }

        session(['shoppingCart' => $shoppingCart]);
        return $shoppingCart;
    }

    public function removeFromCart(Product $product): array | null
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
}
