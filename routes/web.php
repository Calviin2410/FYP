<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', function () {
    return view('product');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route::group(['middleware' => ['auth']], function () {
    Route::prefix('users')->group( function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/export', [UserController::class, 'export'])->name('users.export');
    });

    Route::prefix('categories')->group( function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::get('/export', [CategoryController::class, 'export'])->name('categories.export');
    });

    Route::prefix('products')->group( function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/create', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('/export', [BlogController::class, 'export'])->name('products.export');
    });
//});