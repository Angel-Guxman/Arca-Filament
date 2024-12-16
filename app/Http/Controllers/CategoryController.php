<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function show($id)
    {
        $category = Category::findOrFail($id); // Obtener la categoría
        $products = Product::where('category_id', $id)->get(); // Obtener productos por categoría
        $categories = Category::all(); // Obtener todas las categorías
    
        return view('customer.show', compact('category', 'products', 'categories')); // Pasar los datos a la vista
    }



}
