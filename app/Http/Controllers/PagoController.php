<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;



class PagoController extends Controller
{
    //
    public function store(Request $request){

        \Stripe\Stripe::setApiKey( config('services.stripe.secret'));

        
$YOUR_DOMAIN = 'http://localhost:8000';
        $checkout_session = \Stripe\Checkout\Session::create([
          'line_items' => [[
    'price_data' => [
        'currency' => 'usd',
        'product_data' => [
            'name' => 'Your Product Name',
        ],
        'unit_amount' => 40000, // 400.00 USD
    ],
    'quantity' => 1,
]],
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN . '/',
            'cancel_url' => $YOUR_DOMAIN . '/',
          ]);
          return redirect($checkout_session->url);

         
    }
}
