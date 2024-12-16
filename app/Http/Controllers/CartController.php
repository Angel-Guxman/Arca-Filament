<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
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
            $cartItems = CartItem::where('cart_id', $cart->id)->with('product')->get();
    
            // Aquí puedes agregar la ruta base de las imágenes
            foreach ($cartItems as $item) {
                $item->product->image_url = asset('storage/' . $item->product->image); // Asegúrate de que 'image' sea el nombre de la columna donde guardas la ruta de la imagen
            }
    
            return view('customer.cart', compact(['cart', 'cartItems']));
        }
        return view('customer.cart'); // Muestra la vista del carrito vacío
    }
    

    // Agrega un producto al carrito

public function addToCart(Request $request, $productId)
{
    $user = Auth::user();
    if (!$user) {
        return response()->json(['success' => false, 'message' => 'Por favor, inicie sesión para agregar productos al carrito.']);
    }

    $product = Product::find($productId);
    if (!$product) {
        return response()->json(['success' => false, 'message' => 'Producto no encontrado.']);
    }

    $cart = Cart::firstOrCreate(['user_id' => $user->id]);
    $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $productId)->first();

    if ($cartItem) {
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

    return response()->json(['success' => true, 'message' => 'Producto agregado al carrito.']);
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

    return response()->json(['success' => true, 'message' => 'Cantidad actualizada.']);
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
