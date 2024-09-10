<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\UserProfileController;
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

Route::get('/PrivacyNotice', function () {
    return view('customer.privacyNotice');
})->name('privacyNotice');

Route::get('/ProductInformation', function () {
    return view('customer.productInformation');
})->name('productInformation');

Route::get('/carrito',[CartController::class,'index'])->name('cart');
//*verificar la ruta del perfil del admin
//proteger las rutas de los clientes los cuales el admin no debe usar y debe estar autenticado el usuario
Route::middleware(['auth','customer'])->group(function(){
    Route::get('/perfil',[UserProfileController::class,'index'])->name('profile');
    Route::post('/logout',[UserProfileController::class,'logout'])->name('logout');

    Route::get('/historial-pedidos',[UserOrderController::class,'index'])->name('order-history');
});

Route::middleware(['guest'])->group(function(){

    Route::get('/inicio-sesion',[LoginController::class,'create'])->name('login');
    Route::post('/inicio-sesion',[LoginController::class,'store'])->name('login');
    
    Route::get('/registro',[RegisterController::class,'create'])->name('register');
    Route::post('/registro',[RegisterController::class,'store'])->name('register');
});

Route::get('/perfil/password',function(){
return 'hey';
}
)->name('hey');


