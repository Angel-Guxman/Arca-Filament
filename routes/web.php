<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.home');
});

Route::get('/Catalogue', function () {
    return view('customer.catalogue');
});