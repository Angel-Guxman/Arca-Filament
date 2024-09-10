@extends('layouts.customer')
@section('content')
    <h2 class=" text-white text-3xl mx-auto w-fit  m-4 font-medium">Perfil
    </h2>



    <div
        class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap mx-auto w-fit -mb-px">
            <li class="me-2">
                <a href="{{ route('profile') }}"
                    class="inline-block p-4  rounded-t-lg   {{ request()->routeIs('profile') ? 'text-emerald-500/80 border-b-2 border-emerald-500/80' : ' hover:border-gray-300 hover:text-gray-300 hover:border-b-2' }}">Perfil</a>
            </li>
            <li class="me-2">
                <a href="{{ route('order-history') }}"
                    class="inline-block p-4  rounded-t-lg   {{ request()->routeIs('order-history') ? 'text-emerald-500/80 border-b-2 border-emerald-500/80' : 'hover:text-gray-300 hover:border-gray-300 hover:border-b-2' }} "
                    aria-current="page">Historial de Pedidos</a>
            </li>
        </ul>
    </div>
    <livewire:customer.user-profile :user="$user" />
@endsection
