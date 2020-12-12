<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('home');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
    Route::get('/add-to-cart/{gift}', App\Http\Controllers\CartController::class)->name('add.cart');
    Route::get('/remove-from-cart/{gift}', [App\Http\Controllers\CartController::class, 'remove'])->name('remove.cart');
    Route::get('/lower-quantity/{gift}', [App\Http\Controllers\CartController::class, 'lowerQuantity'])->name('lower.quantity.cart');
    Route::get('/cart/index', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::get('/reset', [App\Http\Controllers\CartController::class, 'resetCard'])->name('reset.card');
    Route::get('/lists', [App\Http\Controllers\FavouriteGiftListController::class, 'index'])->name('lists.index');
    Route::post('/lists', [App\Http\Controllers\FavouriteGiftListController::class, 'store'])->name('lists.store');
    Route::get('/lists/{list}', [App\Http\Controllers\FavouriteGiftListController::class, 'show'])->name('lists.show');
    Route::get('/add-to-list/{gift}', [App\Http\Controllers\GiftsController::class, 'index'])->name('add.favourites');
    Route::post('/add-to-list/{gift}', [App\Http\Controllers\GiftsController::class, 'store'])->name('store.favourites');
    Route::get('/remove-from-list/{item}', [App\Http\Controllers\GiftsController::class, 'remove'])->name('remove.favourites');

});