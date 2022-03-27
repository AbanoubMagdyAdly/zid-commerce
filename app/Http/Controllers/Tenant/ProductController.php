<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    public function create(Request $request) {
        $product = $this->productService->create($request);
        return $this->getSuccessResponse($product);

    }

    public function getProducts() {
        $products = $this->productService->getProducts();
        return $this->getSuccessResponse($products);
    }

    public function getProduct($id) {
        $product = $this->productService->getProduct($id);
        return $this->getSuccessResponse($product);
    }

    public function addAttributesToProduct(Request $request) {
        $product = $this->productService->addAttributesToProduct($request);
        return $this->getSuccessResponse($product);
    }
}
