<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products=[];
        $favorites=[];
        $user=Auth::user();
        if($user){
           $favorites= $user->favorites->pluck('id')->toArray();
        }
        if($request->has('category')){
            $category=$request->input('category');
            $products = Product::
            whereHas('category', function ($query) use ($category) {
                $query->where('name', 'like', "%$category%"); 
            })->with(['images' => function ($query) {
                $query->where('featured', true);
            }])
            ->paginate(6)->withQueryString();
            
        }else if($request->has(['min-price','max-price'])){
            $minPrice=$request->input('min-price')*100;
            $maxPrice=$request->input('max-price')*100;
            $products = Product::where('price','>=',$minPrice)->where('price','<=',$maxPrice)->with(['images' => function ($query) {
                $query->where('featured', true);
            }])->paginate(6)->withQueryString();
          
   
        }else{      
           
            $products = Product::with(['images' => function ($query) {
                $query->where('featured', true); 
            }])->paginate(6);   
           
        }
      
  
        $categories = Category::all(); 
       
        return view('customer.catalogue', compact('products', 'categories','favorites'));
    }

    public function showByCategory($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products; // Asumiendo que tienes una relación definida
        $categories = Category::all(); // Para mostrar el menú de categorías

        return view('customer.catalogue', compact('products', 'categories'));
    }

    

    public function show($slug)
    {
        $favorites=[];
        $user=Auth::user();
        if($user){
           $favorites= $user->favorites->pluck('id')->toArray();
        }
        $product = Product::where('slug','=',$slug)->with('images')->first();
       
      
        if($product){
           
            return view('customer.productInformation', compact('product','favorites'));
        }else{
            return to_route('catalogue');
           
        }
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
