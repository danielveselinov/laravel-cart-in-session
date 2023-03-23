<?php

namespace App\Http\Livewire;

use App\Services\CartService;
use Livewire\Component;

class ShoppingCartButton extends Component
{
    public $subTotal = 0;

    public $cartAmount = 0;

    public $shoppingCart;

    protected $listeners = [
        'updateShoppingCart' => 'updateShoppingCart'
    ];

    public function render()
    {
        return view('livewire.shopping-cart-button');
    }

    public function mount(CartService $cartService)
    {
        $this->shoppingCart = $cartService->getShoppingCart();
        $this->cartAmount = $cartService->getCartAmount();
        $this->subTotal = $cartService->getCartSubTotal();
    }

    public function updateShoppingCart(CartService $cartService)
    {
        $this->shoppingCart = $cartService->getShoppingCart();
        $this->cartAmount = $cartService->getCartAmount();
        $this->subTotal = $cartService->getCartSubTotal();
    }
}
