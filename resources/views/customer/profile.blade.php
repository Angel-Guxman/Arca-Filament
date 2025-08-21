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
        <livewire:customer.user-profile :user="$user" />
    </div>
@endsection
