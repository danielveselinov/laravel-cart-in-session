<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;

class AddToCartButton extends Component
{
    public Product $productId;

    protected $shoppingCart;

    public function render()
    {
        return view('livewire.add-to-cart-button');
    }

    public function mount(CartService $cartService)
    {
        $this->shoppingCart = $cartService->getShoppingCart();
    }

    public function addToCart(CartService $cartService)
    {
        $cartService->addToCart($this->productId);
    }

    public function incrementAmount(CartService $cartService)
    {
        $this->emit('updateShoppingCart');
        $cartService->addToCart($this->productId);
    }
}
