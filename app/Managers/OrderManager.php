<?php

namespace App\Managers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order; // Asegúrate de tener tu modelo de Order
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\CartItem;
use Exception;

class OrderManager
{
    // Crea la orden
    public function createOrder($user, $data, $product)
    {

        $shipping_price = 0;
        $total_price = ($product->price * $data['quantity']) + $shipping_price;

        $order = Order::create([
            'user_id' => $user->id,
            "payment_status" => "pending",
            "divisa" => "MXN",
            "total_price" => $total_price,
            "session_id" => "id_sesion",
            "shipping_price" => $shipping_price,
            "shipping_status" => "pending",
            "shipping_address" => json_encode([
                "first_street" => $data['first_street'],
                "second_street" => $data['second_street'] ?? null,
                "interior_number" => $data['interior_number'] ?? null,
                "outdoor_number" => $data['outdoor_number'] ?? null,
                "state" => $data['state'],
                "municipality" => $data['municipality'],
                "address" => $data['address'],
                "indications" => $data['indications'],
                "country" => $data['country'],
                "post_code" => $data['post_code'],
            ]),
            "payment_method" => $data['payment_method'] ?? "card",
        ]);
        $order->items()->create([
            'order_id' => $order->id,
            'product_name' => $product->name,
            'product_image' => $product->images->first()->image,
            'product_size' => $data['size'] ?? null,
            'product_color' => $data['color'] ?? null,
            'product_type' => $data['type'] ?? null,
            'product_category' => $product->category->name ?? null,
            'quantity' => $data['quantity'],
            'price' => $product->price,
            'subtotal' => $product->price * $data['quantity'],
        ]);
        return $order;
    }

    // Actualiza usuario y crea orden
    public function storeUserAndOrder($data)
    {
        $user = User::find(Auth::id());

        if (!$user) {
            return [
                'success' => false,
                'message' => 'Usuario no encontrado'
            ];
        }
        $product = Product::where('slug', $data['product_slug'])->with([
            'images' => function ($query) {
                $query->where('featured', true);
            },
            'category'
        ])->first();
        if (!$product) {
            return [
                'success' => false,
                'message' => 'Producto no encontrado'
            ];
        }
        if ($product->stock < $data['quantity']) {
            return [
                'success' => false,
                'message' => 'No hay stock suficiente'
            ];
        }
        DB::beginTransaction();

        try {
            // Actualizamos los datos del usuario
            $user->update([
                'email' => $data['email'],
                'phone' => $data['phone'],
                'first_street' => $data['first_street'],
                'second_street' => $data['second_street'] ?? null,
                'interior_number' => $data['interior_number'] ?? null,
                'outdoor_number' => $data['outdoor_number'] ?? null,
                'state' => $data['state'],
                'municipality' => $data['municipality'],
                'address' => $data['address'],
                'indications' => $data['indications'],
                'country' => $data['country'],
                'post_code' => $data['post_code'],
            ]);

            // Creamos la orden
            $order = $this->createOrder($user, $data, $product);
            // Creamos la sesión de Stripe
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'mxn',
                        'product_data' => [
                            'name' => $product->name,
                        ],
                        'unit_amount' => $product->price * 100,
                    ],
                    'quantity' => $data['quantity'],
                ]],
                'mode' => 'payment',
                'success_url' => route('order-success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('order-cancel') . '?session_id={CHECKOUT_SESSION_ID}',
            ]);

            $order->update([
                'session_id' => $checkout_session->id,
            ]);

            DB::commit();

            return [
                'success' => true,
                'message' => 'Orden creada correctamente',
                'order' => $order,
                'checkout_session' => $checkout_session,
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => 'Error al crear la orden: ' . $e->getMessage()
            ];
        }
    }

    public function storeUserAndOrderCart($data)
    {
        $user = User::find(Auth::id());

        if (!$user) {
            return [
                'success' => false,
                'message' => 'Usuario no encontrado'
            ];
        }
        $cart = Cart::with('cartItems.product.category')->where('user_id', $user->id)->first();

        if (!$cart || $cart->cartItems->isEmpty()) {
            return [
                'success' => false,
                'message' => 'Tu carrito está vacío'
            ];
        }
        DB::beginTransaction();

        try {
            $user->update([
                'email' => $data['email'],
                'phone' => $data['phone'],
                'first_street' => $data['first_street'],
                'second_street' => $data['second_street'] ?? null,
                'interior_number' => $data['interior_number'] ?? null,
                'outdoor_number' => $data['outdoor_number'] ?? null,
                'state' => $data['state'],
                'municipality' => $data['municipality'],
                'address' => $data['address'],
                'indications' => $data['indications'],
                'country' => $data['country'],
                'post_code' => $data['post_code'],
            ]);

            $order = $this->createOrderCart($user, $cart);
            // Creamos la sesión de Stripe
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            $lineItems = $order->items->map(function ($item) {
                return [
                    'price_data' => [
                        'currency' => 'mxn',
                        'product_data' => [
                            'name' => $item->product_name,
                            'images' => [$item->product_image], // opcional
                        ],
                        'unit_amount' => intval($item->price * 100),
                    ],
                    'quantity' => $item->quantity,
                ];
            })->toArray();

            // Añadimos el envío como un item extra si aplica
            if ($order->shipping_price > 0) {
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'mxn',
                        'product_data' => [
                            'name' => 'Envío',
                        ],
                        'unit_amount' => intval($order->shipping_price * 100),
                    ],
                    'quantity' => 1,
                ];
            }
            // Creamos la sesión de Stripe
            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('order-success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('order-cancel') . '?session_id={CHECKOUT_SESSION_ID}',
            ]);

            $order->update([
                'session_id' => $checkout_session->id,
            ]);


            $cart->cartItems()->delete();
            $cart->delete();

            DB::commit();

            return [
                'success' => true,
                'message' => 'Orden creada correctamente',
                'order' => $order,
                'checkout_session' => $checkout_session,
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => 'Error al crear la orden: ' . $e->getMessage()
            ];
        }
    }

    public function createOrderCart($user, $cart)
    {
        $shipping_price = 0;
        $total_price = $cart->cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        }) + $shipping_price;
        $order = Order::create([
            'user_id' => $user->id,
            "divisa" => "MXN",
            'payment_status' => "pending",
            'total_price' => $total_price,
            'shipping_price' => $shipping_price,
            'session_id' => "id_sesion",
            'shipping_status' => "pending",
            'shipping_address' => json_encode([
                "first_street" => $user->first_street,
                "second_street" => $user->second_street ?? null,
                "interior_number" => $user->interior_number ?? null,
                "outdoor_number" => $user->outdoor_number ?? null,
                "state" => $user->state,
                "municipality" => $user->municipality,
                "address" => $user->address,
                "indications" => $user->indications,
                "country" => $user->country,
                "post_code" => $user->post_code,
            ]),
            'payment_method' => "card",
        ]);

        foreach ($cart->cartItems as $item) {
            $order->items()->create([
                'order_id' => $order->id,
                'product_name' => $item->product->name,
                'product_image' => $item->product->images->first()->image ?? null,
                'product_size' => $item->size ?? null,     // si manejas tallas
                'product_color' => $item->color ?? null,   // si manejas colores
                'product_type' => $item->type ?? null,
                'product_category' => $item->product->category->name ?? null,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
                'subtotal' => $item->quantity * $item->product->price,
            ]);
        }

        return $order;
    }
}
