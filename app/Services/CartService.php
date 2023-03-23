<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public function addToCart(int $productId): array
    {
        $shoppingCart = session('shoppingCart', []);

        if (isset($shoppingCart[$productId])) {
            $shoppingCart[$productId]['amount'] += 1;
        } else {
            $product = Product::findOrFail($productId);
            $shoppingCart[$productId] = [
                'productId' => $productId,
                'amount' => '1',
                'price' => $product->price->getAmount(),
                'name' => $product->name,
                'discount' => $product->discount
            ];
        }

        session(['shoppingCart' => $shoppingCart]);
        return $shoppingCart;
    }

    public function removeFromCart(int $productId): array | null
    {
        $shoppingCart = session('shoppingCart', []);

        if (!isset($shoppingCart[$productId])) {
            return null;
        }

        if ($shoppingCart[$productId]['amount'] == 1) {
            unset($shoppingCart[$productId]);
        } else {
            $shoppingCart[$productId]['amount'] = -1;
        }

        session(['shoppingCart' => $shoppingCart]);
        return $shoppingCart;
    }
}
