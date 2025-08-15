<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('guest.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'email' => 'required|email ',
            'password' => 'required|min:4',
        ]);


        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('error', 'Los datos no coincide con nuestros registros');
        }
        $user = Auth::user();
        if ($user->hasRole('administrator')) {
            return redirect('dashboard')->with('status', [
                'success' => 'Inicio de Sesión Correctamente.'
            ]);
        }
        if (session()->has('pending_purchase')) {
            $pending = session('pending_purchase');
            session()->forget('pending_purchase');
            return redirect()->route('create-order', [
                'product_slug' => $pending['slug'],
                'quantity' => $pending['quantity'],
            ]);
        }
        return redirect()->route('home')->with('status', [
            'success' => 'Inicio de Sesión Correctamente.'
        ]);
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
