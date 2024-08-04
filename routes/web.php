<?php

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