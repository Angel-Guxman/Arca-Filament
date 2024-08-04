@extends('layouts.customer')
@section('content')
    <main class="bg-black p-8">
        <h1 class="text-left text-white text-5xl ml-36 mb-12 mt-10">Catálogo</h1>

        <div class="text-white flex ml-36">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
            </svg>
            <p class="ml-2 mr-2">Filtrar y ordernar</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </div>
        <p class="text-right text-white -mt-6 mr-36"> 10 Catálogos</p>

        <div class=" flex items-center mt-16">
            <div class="ml-36">
                <img class="w-100 h-80 mb-2" src={{asset ('images/Pulsera.png') }} alt="Pulseras"/>
                <p class="text-white">Misael estas bien</p>
            </div>

            <div class="ml-14">
                <img class="w-100 h-80 mb-2" src={{asset ('images/Pulsera.png') }} alt="Pulseras"/>
                <p class="text-white">Misael estas bien</p>
            </div>

            <div class="ml-14">
                <img class="w-100 h-80 mb-2" src={{asset ('images/Pulsera.png') }} alt="Pulseras"/>
                <p class="text-white">Misael estas bien</p>
            </div>

            <div class="ml-14">
                <img class="w-100 h-80 mb-2" src={{asset ('images/Pulsera.png') }} alt="Pulseras"/>
                <p class="text-white">Misael estas bien</p>
            </div>
        </div>

    </main>
@endsection
