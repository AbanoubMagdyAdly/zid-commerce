<?php

namespace App\Services;

use App\Models\Tenants\Product;
use App\Models\Tenants\ProductAttributeValue;


class ProductService {


    public function create($product) {
        return Product::create([
            'price'=> $product->price,
            'is_tax_included'=> $product->is_tax_included,
            'shipping_cost'=> $product->shipping_cost,
            'tax_percentage'=> $product->tax_percentage,
            'en_name'=> $product->en_name,
            'ar_name'=> $product->ar_name,
        ]);
    }

    public function getProducts() {
        return Product::with('attributeValues.attribute')->paginate();
    }

    public function getProduct($id) {
        return Product::with('attributeValues.attribute')->find($id);
    }

    public function addAttributesToProduct($request) {
        if($this->getProduct($request->product_id) == null){
            throw new \Exception("Product Not Found");
        }
        return ProductAttributeValue::create($request->all());
    }

}
