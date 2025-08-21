@extends('layouts.customer')

@section('content')
<div class="max-w-xl mx-auto px-4 py-12">
    <div class="bg-neutral-900 rounded-lg border border-neutral-700/80 p-8 text-center">
        <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-red-900/50 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
        <h1 class="text-2xl font-bold text-white mt-4">Compra Cancelada</h1>
        <p class="text-neutral-400 mt-2">Tu compra ha sido cancelada. No se ha realizado ningún cargo.</p>
        <a href="{{ route('home') }}" class="mt-6 inline-block bg-emerald-600 text-white font-semibold px-6 py-2 rounded-lg hover:bg-emerald-500 transition-colors">Volver al Inicio</a>
    </div>
</div>
@endsection
