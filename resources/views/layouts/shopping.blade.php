<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Checkout')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-950 text-gray-800">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-gray-950 border-b border-neutral-800 sticky top-0">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-3">
                    <div class="text-xl font-bold tracking-wider  text-white select-none cursor-default">Arca</div>
                    <div class="">
                        {{--          @if (auth()->check())
                            @php
                                $name = auth()->user()->name;
                                $initial = strtoupper(mb_substr($name, 0, 1));
                            @endphp
                            <div class="flex items-center space-x-3  px-3.5 py-2 rounded-md ">

                                <div
                                    class="bg-gradient-to-r from-purple-600 to-pink-600 text-white w-8 h-8 flex items-center justify-center rounded-full">
                                    {{ $initial }}
                                </div>
                                <span class="text-sm font-semibold tracking-wider text-white">{{ $name }}</span>
                            </div>
                        @endif --}}
                        <button
                            class="text-sm font-medium tracking-wider hover:bg-red-500/20 text-red-500 bg-red-500/15 px-2 py-1.5 rounded-md cursor-pointer">Cancelar
                            compra</button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Stepper -->
                @include('partials.checkout-stepper')

                <!-- Page Content -->
                <div class="mt-8">

                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>

</html>
