@extends('layouts.customer')
@section('content')
    <div class="max-w-xl mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-white">Historial de Pedidos</h2>
            <a href="{{ route('favorites') }}"
                class="flex items-center gap-1 text-sm text-neutral-300 hover:text-white border border-neutral-600 hover:border-neutral-500 rounded px-3 py-1.5 transition-colors">
                @php
                    $class = 'size-3';

                @endphp
                <x-svgs.favorite-heart :class="$class" />


                Favoritos
            </a>
        </div>

        <div class="mb-6 bg-neutral-900 rounded-lg border border-neutral-700/80 overflow-hidden">
            <div class="flex border-b border-neutral-700/80">
                <a href="{{ route('profile') }}"
                    class="flex-1 py-3 text-center text-sm font-medium {{ request()->routeIs('profile') ? 'text-white border-b-2 border-neutral-200' : 'text-neutral-400 hover:text-white' }}">
                    Perfil
                </a>
                <a href="{{ route('order-history') }}"
                    class="flex-1 py-3 text-center text-sm font-medium {{ request()->routeIs('order-history') ? 'text-white border-b-2 border-neutral-200' : 'text-neutral-400 hover:text-white' }}">
                    Mis Pedidos
                </a>
            </div>
        </div>

        @if ($orders->count() > 0)
            <div class="space-y-4">
                @foreach ($orders as $order)
                    <div class="bg-neutral-900 rounded-lg border border-neutral-700/80 overflow-hidden">
                        <div class="p-4 border-b border-neutral-700/80">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                                <div>
                                    <h3 class="text-base font-medium text-white">Orden #{{ $order->id }}</h3>
                                    <p class="text-xs text-neutral-400">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="px-2 py-0.5 text-xs cursor-default rounded-full {{ $order->payment_status === 'paid' ? 'bg-green-900/50 text-green-400' : 'bg-yellow-900/50 text-yellow-400' }}">
                                        {{ ucfirst($order->payment_status) }}
                                    </span>
                                    <p class="mt-1 text-base font-semibold tracking-wider text-neutral-200">
                                        ${{ number_format($order->total_price, 2) }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="divide-y divide-neutral-800">
                            @foreach ($order->items as $item)
                                <div class="p-3 flex items-start gap-3">
                                    <div class="flex-shrink-0 w-16 h-16 bg-neutral-800 rounded overflow-hidden">
                                        @if ($item->product_image)
                                            <img src="{{ $item->product_image }}" alt="{{ $item->product_name }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-neutral-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-neutral-500"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-medium text-white truncate">{{ $item->product_name }}</h4>
                                        <p class="text-xs text-neutral-400 mt-0.5">
                                            {{ $item->quantity }} × ${{ number_format($item->price, 2) }}
                                            @if ($item->product_size)
                                                <span class="mx-1">•</span> Talla: {{ $item->product_size }}
                                            @endif
                                            @if ($item->product_color)
                                                <span class="mx-1">•</span> {{ $item->product_color }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-white">
                                            ${{ number_format($item->quantity * $item->price, 2) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="p-3 bg-neutral-800/30 border-t border-neutral-700/80">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-neutral-400">Envío</span>
                                <span class="text-sm text-white">${{ number_format($order->shipping_price, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center mt-1">
                                <span class="text-sm font-medium text-white">Total</span>
                                <span
                                    class="text-base font-semibold text-neutral-200">${{ number_format($order->total_price + $order->shipping_price, 2) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Enlaces de paginación --}}
                <div class="mt-6 flex justify-center">
                    {{ $orders->links() }}
                </div>
            </div>
        @else
            <div class="text-center py-10">
                <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-neutral-800 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-neutral-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-white mb-1">No hay pedidos</h3>
                <p class="text-sm text-neutral-400 mb-6">Aún no has realizado ningún pedido.</p>
                <a href="{{ route('home') }}"
                    class="inline-flex items-center justify-center px-4 py-2 bg-emerald-600 hover:bg-emerald-500 text-white text-sm font-medium rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                    Ver productos
                </a>
            </div>
        @endif


    </div>
@endsection
