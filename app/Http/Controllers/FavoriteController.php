<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class FavoriteController extends Controller
{

    public function index()
{
    $favoriteProducts = session('favorites', []);
    $products = \App\Models\Product::all(); // O la lógica que uses para obtener los productos


    return view('customer.catalogue', compact('products', 'favoriteProducts', ''));
}

    public function showFavorites()
    {
        $favoriteProducts = session('favorites', []);
        return view('favorites.index', compact('favoriteProducts'));
    }

    public function toggleFavorite(Request $request)
    {
        $productId = $request->input('product_id');
        $favorites = session('favorites', []);
    
        if (in_array($productId, $favorites)) {
            // Si ya está en favoritos, lo eliminamos
            $favorites = array_diff($favorites, [$productId]);
            $action = 'removed';
        } else {
            // Si no está en favoritos, lo agregamos
            $favorites[] = $productId;
            $action = 'added';
        }
    
        session(['favorites' => $favorites]);
    
        return response()->json(['success' => true, 'action' => $action, 'favorites' => $favorites]);
    }
    

    public function removeFavorite(Request $request)
    {
        $productId = $request->input('product_id');
        $favorites = session('favorites', []);

        // Eliminar el producto de la lista de favoritos
        if (($key = array_search($productId, $favorites)) !== false) {
            unset($favorites[$key]);
            session(['favorites' => array_values($favorites)]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Product not found in favorites']);
    }
}

