<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
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
        return view('customer.favorites', compact('favoriteProducts'));
    }
    public function toggleFavorite(Request $request)
    {
        $productId = $request->input('idProduct');
        $userId = auth()->id(); // Suponiendo que el usuario está autenticado
        if (!auth()) {
            return to_route("login");
        }

        $favorite = Favorite::where('product_id', $productId)
            ->where('user_id', $userId)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['success' => true, 'message' => 'Favorite removed']);
        } else {
            Favorite::create([
                'product_id' => $productId,
                'user_id' => $userId,
            ]);
            return response()->json(['success' => true, 'message' => 'Favorite added']);
        }
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
