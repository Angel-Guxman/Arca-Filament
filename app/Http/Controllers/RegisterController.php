<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('guest.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required|min:2|max:30',
            'last_name'=>'required|min:2|max:30',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5',
        ]);

       $user= User::create([
            'name'=>$request->name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        if( auth()->attempt($request->only('email','password'),$request->remember)){
            $us=Auth::user();
            $us->assignRole('customer');
        Cart::create(['user_id'=>$user->id]);
            return redirect()->route('home');
        }else{
            return back()->with('error','Ha ocurrido un error');
        }

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
