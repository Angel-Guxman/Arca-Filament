@extends('layouts.orders')

@section('content')
    <div class="max-w-xl mx-auto px-4 py-12">
        <div class="bg-neutral-900 rounded-lg border border-neutral-700/80 p-8 text-center">
            <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-emerald-900/50 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-white mt-4">¡Compra Exitosa!</h1>
            <p class="text-neutral-400 mt-2">Gracias por tu compra. Hemos enviado una confirmación a tu correo electrónico.
            </p>
            <p class="text-neutral-400 mt-2">Tu número de pedido es: {{ $order->id }}</p>
            <div class="mt-6 space-y-3">
                <a href="{{ route('order-history') }}"
                    class="inline-block bg-emerald-600 text-white font-semibold px-6 py-2 rounded-lg hover:bg-emerald-500 transition-colors mr-2">
                    Ver mis pedidos
                </a>
                <a href="{{ route('home') }}"
                    class="inline-block bg-transparent border border-neutral-600 text-white font-semibold px-6 py-2 rounded-lg hover:bg-neutral-800/50 transition-colors">
                    Seguir comprando
                </a>
            </div>
        </div>
    </div>
@endsection
