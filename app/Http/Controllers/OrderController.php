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
use App\Models\Order;
use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function success(Request $request)
    {
        $customer = null;
        try {
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            $session_id = $request->input('session_id');
            $session = \Stripe\Checkout\Session::retrieve($session_id);
            $customer = $session->customer ? \Stripe\Customer::retrieve($session->customer) : $session->customer_details;
            if (!$session) {
                throw new NotFoundHttpException('Session not found');
            }
            if ($session->payment_status === 'paid') {
                $order = Order::where('session_id', $session->id)->first();
                if (!$order) {
                    throw new NotFoundHttpException('Order not found');
                }
                if ($order->payment_status === 'pending') {
                    $order->update([
                        'payment_status' => 'paid',
                    ]);
                }
                return view('customer.success', [
                    'customer' => $customer,
                    'order' => $order
                ]);
            } else {
                return view('customer.cancel', [
                    'customer' => $customer,
                ]);
            }
        } catch (Exception $e) {
            throw new NotFoundHttpException($e->getMessage());
        }
    }
    public function cancel(Request $request)
    {
        $session_id = $request->input('session_id');
        $order = Order::where('session_id', $session_id)->where('payment_status', 'pending')->first();
        if ($order) {
            $order->delete();
        }
        return view('customer.cancel');
    }
    public function webhook(Request $request)
    {

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        // Replace this endpoint secret with your endpoint's unique secret
        // If you are testing with the CLI, find the secret by running 'stripe listen'
        // If you are using an endpoint defined with the API or dashboard, look in your webhook settings
        // at https://dashboard.stripe.com/webhooks
        $endpoint_secret = config('services.stripe.webhook_secret');

        $payload = @file_get_contents('php://input');
        $event = null;

        try {
            $event = \Stripe\Event::constructFrom(
                json_decode($payload, true)
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response("", 400);
        }
        if ($endpoint_secret) {
            // Only verify the event if there is an endpoint secret defined
            // Otherwise use the basic decoded event
            $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
            try {
                $event = \Stripe\Webhook::constructEvent(
                    $payload,
                    $sig_header,
                    $endpoint_secret
                );
            } catch (\Stripe\Exception\SignatureVerificationException $e) {
                // Invalid signature
                return response("", 400);
            }
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                $sessionId = $session->id;
                $order = Order::where('session_id', $sessionId)->first();
                if ($order && $order->payment_status === 'pending') {
                    $order->update([
                        'payment_status' => 'paid',
                    ]);
                    if ($order->type === 'cart') {
                        $cart = Cart::where('user_id', $order->user_id)->first();
                        $cart->cartItems()->delete();
                        $cart->delete();
                    }
                }
                break;
            case 'payment_method.attached':
                $paymentMethod = $event->data->object;
                break;
            default:
                // Unexpected event type
                error_log('Received unknown event type');
        }

        return response("", 200);
    }
}
