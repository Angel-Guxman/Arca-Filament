<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Managers\OrderManager;
use App\Http\Requests\StoreUserOrderPostRequest;
use App\Http\Requests\StoreUserOrderCartPostRequest;
use App\Models\Cart;

class OrderController extends Controller
{
    protected $orderManager;

    public function __construct(OrderManager $orderManager)
    {
        $this->orderManager = $orderManager;
    }
    /**
     * Show the form for creating a new order of only 1 product.
     */
    public function createOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_slug' => 'required|string',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return to_route('catalogue')
                ->withErrors($validator)
                ->withInput();
        }
        $user = Auth::user();
        if (!$user) {
            return to_route('login');
        }
        $product = Product::where('slug', $request->input('product_slug'))->with(['images' => function ($query) {
            $query->where('featured', true);
        }])->first();
        if (!$product) {
            return to_route('catalogue');
        }

        // Ruta del archivo en el directorio de almacenamiento
        $filePath = 'public/states.json';

        // Lee el contenido del archivo
        $json = Storage::get($filePath);

        // Decodifica el JSON en un array
        $data  = json_decode($json, true);

        return     view('customer.continue-shopping-step1', [
            'data' => $data,
            'user' => $user,
            'product' => $product,
            'quantity' => $request->input('quantity')
        ]);
    }
    public function createOrderPay(Request $request)
    {
        return view('customer.continue-shopping-step2', [
            'product' => $request->input('product_slug'),
            'quantity' => $request->input('quantity')
        ]);
    }
    public function createOrderCart()
    {
        $user = Auth::user();
        $cart = Cart::with('cartItems.product')
            ->where('user_id', $user->id)
            ->first();
        $shipping = 0;
        $totalItems = $cart->cartItems->sum(function ($item) {
            $item['subtotal'] = $item->quantity * $item->product->price;
            return $item->quantity * $item->product->price;
        });
        $total = $totalItems + $shipping;
        // Ruta del archivo en el directorio de almacenamiento
        $filePath = 'public/states.json';

        // Lee el contenido del archivo
        $json = Storage::get($filePath);

        // Decodifica el JSON en un array
        $data  = json_decode($json, true);

        return view('customer.continue-shopping-step2', [
            'cart' => $cart,
            'user' => $user,
            'shipping' => $shipping,
            'totalItems' => $totalItems,
            'total' => $total,
            'data' => $data
        ]);
    }
    /**
     * Store a newly created order.
     */
    public function storeOrder(StoreUserOrderPostRequest $request)
    {
        $result = $this->orderManager->storeUserAndOrder($request->validated());

        if (!$result['success']) {
            return redirect()->back()->with('error', $result['message']);
        }

        return redirect()->away($result['checkout_session']->url);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function storeCartOrder(StoreUserOrderCartPostRequest $request)
    {
        // Create the order
        $result = $this->orderManager->storeUserAndOrderCart($request->validated());

        if (!$result['success']) {
            return redirect()->back()->with('error', $result['message']);
        }
        return redirect()->away($result['checkout_session']->url);
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
