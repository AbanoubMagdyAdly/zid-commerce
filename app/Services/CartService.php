<?php

namespace App\Services;

use App\Models\Tenants\Cart;
use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;


class CartService {

    protected $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    public function addToCart($request) {
        if($this->productService->getProduct($request->product_id) == null){
            throw new \Exception("Product Not Found", 404);
        }
        return Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);
    }

    public function getCart() {
        $cartQuery = Cart::where('user_id', '=', Auth::user()->id)->join('products', 'product_id', '=', 'products.id');
        $carts = Cart::where('user_id', '=', Auth::user()->id)->join('products', 'product_id', '=', 'products.id')->get();
        $totals = $cartQuery->select(\DB::raw('SUM(price) as total_price'), \DB::raw('SUM(shipping_cost) as total_shipping'))->first();
        return [
                'cart' => $carts,
                'cost' => $totals
            ];
    }

}
