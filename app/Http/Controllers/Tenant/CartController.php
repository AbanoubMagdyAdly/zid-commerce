<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function addToCart(Request $request) {
        $cart = $this->cartService->addToCart($request);
        return $this->getSuccessResponse($cart);

    }

    public function getCart() {
        $cart = $this->cartService->getCart();
        return $this->getSuccessResponse($cart);
    }
}
