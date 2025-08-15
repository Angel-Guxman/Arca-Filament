<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use DragonCode\Contracts\Cashier\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Muestra el carrito
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $cart = Cart::firstOrCreate(['user_id' => $user->id]);
            $cartItems = CartItem::where('cart_id', $cart->id)->with('product.featuredImage')->get();
            return view('customer.cart', compact(['cart', 'cartItems']));
        }
        return to_route('login');
    }
    

    // Agrega un producto al carrito

public function addToCart(Request $request, $productId)
{
    $user = Auth::user();
    if (!$user) {
        return to_route('login');
    }

    $product = Product::where('id',$productId)->with(['images'=>function($query){
        $query->where('featured',true);
    }])->first();
    if (!$product) {
        return response()->json(['success' => false, 'message' => 'Producto no encontrado.']);
    }
    $stock=$product->stock;
    if($stock<=0){
        return response()->json(['success' => false, 'message' => 'Se alcanzo el limite del Stock.']);
    }

    $cart = Cart::firstOrCreate(['user_id' => $user->id]);
    $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $productId)->first();

    if ($cartItem) {
        if($cartItem->quantity+1>$stock){
            return response()->json(['success' => false, 'message' => 'Se alcanzo el limite del Producto.']);
            }
        $cartItem->quantity += 1;
        $cartItem->save();
    } else {
        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $productId,
            'quantity' => 1,
            'price' => $product->price,
        ]);
    }
    return response()->json(['success' => true, 'message' => 'Producto agregado al carrito.','product'=>$product]);
}


public function cartCount(){

    $user=Auth::user();
    if($user){
        $cart = Cart::where('user_id', $user->id)->first();
    if($cart){
        $cartCount = $cart ? $cart->products->count() : 0;
        return response()->json(['success'=>true,'count' => $cartCount]);
    }else{
        return response()->json(['success'=>false]);
    }
    }else{
        return response()->json(['success'=>false]);

    }

}


public function updateQuantity(Request $request, $cartItemId)
{
    $cartItem = CartItem::find($cartItemId);
    if (!$cartItem) {
        return response()->json(['success' => false, 'message' => 'Artículo no encontrado en el carrito.']);
    }

    $newQuantity = $request->input('quantity');
    $product = Product::find($cartItem->product_id);

    // Verifica si la cantidad nueva es válida
    if ($newQuantity > $product->stock) {
        return response()->json(['success' => false, 'message' => 'No hay suficiente stock disponible.']);
    }

    $cartItem->quantity = $newQuantity;
    $cartItem->save();

    // Calcular el subtotal del producto
    $subtotal = $cartItem->quantity * $product->price;

    // Calcular el total del carrito
    $cart = Cart::find($cartItem->cart_id);
    $total = $cart->cartItems->sum(function($item) {
        return $item->quantity * $item->product->price;
    });

    return response()->json([
        'success' => true,
        'message' => 'Cantidad actualizada.',
        'subtotal' => number_format($subtotal, 2), // Devolver el subtotal actualizado
        'total' => number_format($total, 2)         // Devolver el total actualizado
    ]);
}
public function increaseQuantity($itemId){

   
}

public function SearchElements($itemId){
     if(!$itemId){
        return ["success"=>false,"message"=>"No se recibio el item"];
    }
    $item=CartItem::find($itemId);
    if(!$item){
        return ["success"=>false,"message"=>"No se encontro el item"];
    }
    $product=Product::find($item->product_id);
    if(!$product){
        return response()->json(["success"=>false,"message"=>"No se encontro el producto"]);
    }

}

//añadir al carrito con cantidad
public function addToCartWithCounter($productId, $quantity)
{
    $user = Auth::user();
    if (!$user) {
        return to_route('login');
    }

    // Validar que la cantidad sea un número válido y positivo
    $quantity = filter_var($quantity, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);
    if (!$quantity) {
        return response()->json(['success' => false, 'message' => 'Cantidad inválida.']);
    }

    $product = Product::where('id', $productId)
        ->with(['images' => function ($query) {
            $query->where('featured', true);
        }])->first();

    if (!$product) {
        return response()->json(['success' => false, 'message' => 'Producto no encontrado.']);
    }
    $stock=$product->stock;
    if($stock<=0){
        return response()->json(['success' => false, 'message' => 'Se alcanzo el limite del Stock.']);
    }
    $cart = Cart::firstOrCreate(['user_id' => $user->id]);
    $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $productId)->first();

    if ($cartItem) {
        if($cartItem->quantity+$quantity>$stock){
        return response()->json(['success' => false, 'message' => 'Se alcanzo el limite del Producto.']);
        }
        // Sumar la cantidad al item existente
        $cartItem->quantity += $quantity;
        $cartItem->save();
    } else {
        if($quantity>$stock){ 
        return response()->json(['success' => false, 'message' => 'Se alcanzo el limite del Producto.']);

        }
        // Crear un nuevo item con la cantidad específica
        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $productId,
            'quantity' => $quantity,
            'price' => $product->price,
        ]);
    }

    return response()->json([
        'success' => true,
        'message' => "Producto agregado al carrito con cantidad: $quantity.",
        'product' => $product
    ]);
}






    // Elimina un producto del carrito
    public function removeFromCart($cartItemId)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Por favor, inicie sesión para eliminar productos del carrito.');
        }

        $cartItem = CartItem::find($cartItemId);
        if (!$cartItem) {
            return redirect()->back()->with('error', 'Artículo no encontrado en el carrito.');
        }

        $cartItem->delete();

        return redirect()->back()->with('success', 'Artículo eliminado del carrito.');
    }

    // Método para obtener los productos
    public function getProducts()
    {
        if (Auth::check()) {
            $products = Product::all();
            return view('customer.products', compact('products'));
        }
        return redirect()->route('login');
    }
}
