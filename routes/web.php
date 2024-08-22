<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.home');
})->name('home');

Route::get('/Catalogue', function () {
    return view('customer.catalogue');
})->name('catalogue');

Route::get('/History', function () {
    return view('customer.history');
})->name('history');

Route::get('/Bracelets', function () {
    return view('customer.bracelets');
})->name('bracelets');

Route::get('/Necklaces', function () {
    return view('customer.necklaces');
})->name('necklaces');

Route::get('/Earrings', function () {
    return view('customer.earrings');
})->name('earrings');

Route::get('/Favorites', function () {
    return view('customer.favorites');
})->name('favorites');

Route::get('/carrito',[CartController::class,'index'])->name('cart');