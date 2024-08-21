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

Route::get('/carrito',[CartController::class,'index'])->name('cart');