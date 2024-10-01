<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Redirect::route('indeks_product');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['admin'])->group(function () {
    Route::get('/product', [ProductController::class, 'index_product'])->name('indeks_product');
    Route::get('/product/create', [ProductController::class, 'create_product'])->name('create_product');
    Route::get('/product/{product}', [ProductController::class, 'show_product'])->name('show_all');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit_product'])->name('editing');
    Route::post('/product/create', [ProductController::class, 'store_product'])->name('store_product');


    Route::post('/order/{order}/confirm', [OrderController::class, 'confirm_payment'])->name('confirm_payment');

    Route::patch('/product/{product}/update', [ProductController::class, 'update_product'])->name('updatings');
    Route::delete('/product/{product}', [ProductController::class, 'delete_product'])->name('deletings');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/product', [ProductController::class, 'index_product'])->name('indeks_product');
    Route::get('/product/{product}', [ProductController::class, 'show_product'])->name('show_all');


    Route::post('/cart/{product}', [CartsController::class, 'add_carts'])->name('cart_adding');
    Route::get('/cart', [CartsController::class, 'show_cart'])->name('show_cart');
    Route::patch('/cart/{cart}', [CartsController::class, 'update_cart'])->name('update_cart');
    Route::delete('/cart/{cart}', [CartsController::class, 'delete_cart'])->name('delete_cart');




    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/order', [OrderController::class, 'index_order'])->name('index_order');
    Route::get('/order/{order}', [OrderController::class, 'show_order'])->name('show_order');
    Route::post('/order/{order}/pay', [OrderController::class, 'payment'])->name('payment');


    Route::get('/profile', [ProfileController::class, 'show_profile'])->name('show_profile');
    Route::post('/profile', [ProfileController::class, 'edit_profile'])->name('edit_profile');
});