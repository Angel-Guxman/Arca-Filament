<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.home');
})->name('home');

Route::get('/Catalogue', [ProductController::class, 'index'])->name('catalogue');
Route::get('/Earrings', [ProductController::class, 'index'])->name('earrings');
Route::get('/Necklaces', [ProductController::class, 'index'])->name('necklaces');
Route::get('/Bracelets', [ProductController::class, 'index'])->name('bracelets');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('customer.show');

Route::get('/productInformation/{id}', [ProductController::class, 'show'])->name('productInformation');

//Son rutas publicas estaticas
Route::get('/History', function () {return view('customer.history');})->name('history');
Route::get('/Favorites', function () {return view('customer.favorites');})->name('favorites');
Route::get('/PrivacyNotice', function () {return view('customer.privacyNotice');})->name('privacyNotice');

//*verificar la ruta del perfil del admin
//proteger las rutas de los clientes los cuales el admin no debe usar y debe estar autenticado el usuario
Route::middleware(['auth','customer'])->group(function(){
    Route::get('/perfil',[UserProfileController::class,'index'])->name('profile');
    Route::post('/logout',[UserProfileController::class,'logout'])->name('logout');

    Route::get('/historial-pedidos',[UserOrderController::class,'index'])->name('order-history');
});
//rutas para solo customers y no importa si esta autenticado
Route::middleware(['auth'])->group(function(){
Route::get('/carrito',[CartController::class,'index'])->name('cart');
Route::get('/products', [CartController::class, 'getProducts'])->name('products');
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update-quantity/{cartItemId}', [CartController::class, 'updateQuantity']);
Route::delete('/cart/remove/{cartItemId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/favorites', [FavoriteController::class, 'showFavorites'])->middleware('auth');
Route::post('/favorites/toggle', [FavoriteController::class, 'toggleFavorite'])->middleware('auth');
Route::post('/favorites/remove', [FavoriteController::class, 'removeFavorite']);

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


