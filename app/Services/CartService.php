<?php

namespace App\Services;

use App\Models\Tenants\Cart;


class CartService {


    public function addToCart($request) {
        return Cart::create($request->all());
    }

    public function getCart() {
        return Cart::where('user_id', '=', auth()->id )->get();
    }

}
