<?php

namespace App\Services;

use App\Models\Tenants\Cart;
use Illuminate\Support\Facades\Auth;


class CartService {


    public function addToCart($request) {
        return Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);
    }

    public function getCart() {
        return Cart::where('user_id', '=', Auth::user()->id )->get();
    }

}
