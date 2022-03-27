<?php

declare(strict_types=1);

use App\Models\Tenants\Cart;
use App\Models\Tenants\User;
use Illuminate\Http\Request;
use App\Models\Tenants\Product;
use App\Models\Tenants\Attribute;
use Illuminate\Support\Facades\Route;
use App\Models\Tenants\ProductAttributeValue;
use App\Http\Controllers\Tenant\AuthController;
use App\Http\Controllers\Tenant\CartController;
use App\Http\Controllers\Tenant\ProductController;
use App\Http\Controllers\Tenant\AttributeController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'api',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        throw new ErrorException('You must');
        return tenant();
    });


    Route::group([
        'middleware' => 'api',
        'prefix' => 'auth'
    ], function ($router) {
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::post('register', [AuthController::class, 'register'])->name('register');
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });

    Route::get('/products', [ProductController::class, 'getProducts']);

    Route::get('/products/{id}', [ProductController::class, 'getProduct']);

    Route::middleware('auth:api')->group(function () {

        Route::post('/products', [ProductController::class, 'create']);

        Route::post('/attributes', [AttributeController::class, 'create']);

        Route::get('/attributes', [AttributeController::class, 'getAttributes']);

        Route::post('/product-attribute-values', [ProductController::class, 'addAttributesToProduct']);

        Route::get('/cart', [CartController::class, 'getCart']);

        Route::post('/cart', [CartController::class, 'addToCart']);
    });
});