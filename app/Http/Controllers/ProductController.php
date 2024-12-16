<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Obtiene todos los productos
        $categories = Category::all(); // Obtiene todas las categorías
        return view('customer.catalogue', compact('products', 'categories'));
    }

    public function showByCategory($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products; // Asumiendo que tienes una relación definida
        $categories = Category::all(); // Para mostrar el menú de categorías

        return view('customer.catalogue', compact('products', 'categories'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'image|nullable|max:1999',
            'category_id' => 'required|exists:categories,id',
        ]);

        $fileNameToStore = null;
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Almacena en public/products
            $path = $request->file('image')->storeAs('public/products', $fileNameToStore);
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => 'products/' . $fileNameToStore, // Almacena solo la ruta relativa
            'category_id' => $request->category_id
        ]);
    }
}
