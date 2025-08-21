<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/catalogo', [ProductController::class, 'index'])->name('catalogue');
Route::get('/aretes', [ProductController::class, 'index'])->name('earrings');
Route::get('/collares', [ProductController::class, 'index'])->name('necklaces');
Route::get('/brazaletes', [ProductController::class, 'index'])->name('bracelets');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('customer.show');

Route::get('/producto-informacion/{slug}', [ProductController::class, 'show'])->name('productInformation');

//Son rutas publicas estaticas
Route::get('/historia', function () {
    return view('customer.history');
})->name('history');
Route::get('/favoritos', function () {
    return view('customer.favorites');
})->name('favorites');
Route::get('/aviso-privacidad', function () {
    return view('customer.privacyNotice');
})->name('privacyNotice');

//*verificar la ruta del perfil del admin
//proteger las rutas de los clientes los cuales el admin no debe usar y debe estar autenticado el usuario
Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/perfil', [UserProfileController::class, 'index'])->name('profile');
    Route::post('/logout', [UserProfileController::class, 'logout'])->name('logout');
    Route::get('/historial-pedidos', [UserOrderController::class, 'index'])->name('order-history');
});
//rutas para solo customers y no importa si esta autenticado
Route::middleware(['auth'])->group(function () {
    Route::get('/carrito', [CartController::class, 'index'])->name('cart');
    Route::get('/productos', [CartController::class, 'getProducts'])->name('products');
    Route::get('/favoritos', [FavoriteController::class, 'showFavorites'])->name('favorites');
    Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/add-quantity/{productId}/{quantity}', [CartController::class, 'addToCartWithQuantity']);
    Route::post('/cart-item/update-quantity/{cartItemId}', [CartController::class, 'cartItemUpdateQuantity'])->name('cart-item.updateQuantity');
    Route::delete('/cart-item/delete/{cartItemId}', [CartController::class, 'deleteCartItem'])->name('cart-item.delete');
    Route::post('/favorites/remove', [FavoriteController::class, 'removeFavorite']);
    Route::post('/favorites/toggle', [FavoriteController::class, 'toggleFavorite']);
});

Route::get('/cart-count', [CartController::class, 'cartCount'])->name('cartCount');
Route::get('/si', [CartController::class, 'test'])->name('si');


Route::middleware(['guest'])->group(function () {
    Route::name("auth.")->group(function () {
        Route::post('/auth/registro', [RegisterController::class, 'store'])->name('register');
        Route::post('/auth/inicio-sesion', [LoginController::class, 'store'])->name('login');
    });
    Route::get('/registro', [RegisterController::class, 'create'])->name('register');
    Route::get('/inicio-sesion', [LoginController::class, 'create'])->name('login');
});

Route::get(
    '/perfil/password',
    function () {
        return 'hey';
    }
)->name('hey');

Route::post('/pagos', [PagoController::class, 'store'])->name('pagos.store');

/* Route::get('/prueba', function ( Illuminate\Http\Request $request) {
    if ($request->has('name')) {
        dd($request->query('name'));

    }else{
        dd('no hay nombre');
    }
})->name('prueba'); */
Route::get('/prueba', function (Illuminate\Http\Request $request) {
    return view('customer.test');
})->name('prueba');
Route::post('/prueba-post', function (Illuminate\Http\Request $request) {
    $request->validate([
        'apellido' => 'min:4'
    ]);
    return redirect()->route('view-test', [
        'apellido' => $request->input('apellido')
    ]);
})->name('prueba-post');
Route::get("/view-test", function (Illuminate\Http\Request $request) {
    return view('customer.tes2', [
        'apellido' => $request->input('apellido')
    ]);
})->name('view-test');

Route::post('/prueba-post-2', function (Illuminate\Http\Request $request) {
    $request->validate([
        'nick' => 'min:4'
    ]);
    return view('customer.final', [
        'nick' => $request->input('nick')
    ]);
})->name('prueba-post-2');

//oreder without cart
Route::get('/continuar-compra', [OrderController::class, 'createOrder'])->name('create-order')->middleware('store-pending-purchase');
Route::get('/continuar-compra/carrito', [OrderController::class, 'createOrderCart'])->name('create-order-cart')->middleware('auth');
//Route::get('/continuar-compra/step2', [OrderController::class, 'createOrderPay'])->name('create-order-pay');
Route::get('/compra-exitosa', [OrderController::class, 'success'])->name('order-success');
Route::get('/compra-cancelada', [OrderController::class, 'cancel'])->name('order-cancel');
Route::post('/webhook', [OrderController::class, 'webhook'])->name('webhook');

Route::prefix('api')->group(function () {
    Route::post('/order-store', [OrderController::class, 'storeOrder'])->name('store-order');
    Route::post('/order-cart-store', [OrderController::class, 'storeCartOrder'])->name('store-cart-order')->middleware('auth');
});
