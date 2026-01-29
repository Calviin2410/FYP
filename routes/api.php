<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::prefix('products')->group( function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show']);
});

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'addToCart']);
Route::post('/cart/remove', [CartController::class, 'removeFromCart']);
Route::delete('cart/clear', [CartController::class, 'clearCart']);