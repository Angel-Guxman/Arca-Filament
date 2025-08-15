<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       /*  $categories=Category::all(['id','name']);
        return $categories; */
            $bracelets=Product::whereHas('category',function($query){
                $query->where('name','Pulseras');
            })->with(['images' => function ($query) {
                $query->where('featured', true);
            }])->get();
        $necklaces=Product::whereHas('category',function($query){
            $query->where('name','Collares');
        })->with(['images' => function ($query) {
            $query->where('featured', true);
        }])->get();
        $earrings=Product::whereHas('category',function($query){
            $query->where('name','Aretes');
        })->with(['images' => function ($query) {
            $query->where('featured', true);
        }])->get();
      

        //
        return view('customer.home',compact('bracelets','necklaces','earrings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
