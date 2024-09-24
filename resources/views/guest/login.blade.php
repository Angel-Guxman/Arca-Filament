@extends('layouts.guest')
@section('title', 'Iniciar Sesión')

@section('content')
    <div class=" max-w-md flex mx-auto justify-start items-center">
        <a href="{{ route('home') }}" class="   flex justify-center gap-1 items-center group hover:text-emerald-100">


            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-[14px]  text-white group-hover:text-emerald-100">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
            </svg>

            <span class="  block text-white  group-hover:text-emerald-100 text-sm">regresar</span>
        </a>

    </div>

    <form class="max-w-md mx-auto mb-10 mt-2  border border-gray-700/80 p-5 bg-gray-950/80" action="{{ route('login') }}"
        method="POST">
        @csrf



        <h1 class=" text-white mb-5 font-semibold text-xl text-center ">Inicio de Sesión</h1>
        @if (session('error'))
            <h3 class=" text-red-400 mb-3 font-medium text-sm text-center "> {{ session('error') }}</h3>
        @endif

        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium  text-white">Correo Electrónico
                <span class=" text-red-400">*</span>
            </label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class=" border outline-none     text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-emerald-500 focus:border-gray-400"
                placeholder="name@example.com" required />
            @error('email')
                <span class=" block text-red-400 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium  text-white">Contraseña
                <span class=" text-red-400">*</span>
            </label>
            <div class=" relative ">
                <input type="password" id="password" name="password"
                    class="  border outline-none      text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-emerald-500 focus:border-gray-400"
                    required />
                <div class="  absolute right-2   inset-y-0 flex items-center">

                    <x-svgs.eye id="toggle-eye" class=" cursor-pointer size-5 text-white"></x-svgs.eye>
                    <x-svgs.eye-closed id="toggle-eye-closed"
                        class=" cursor-pointer hidden size-5 text-white"></x-svgs.eye-closed>

                </div>
            </div>
            @error('password')
                <span class=" block text-red-400 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
                <input id="remember" name="remember" type="checkbox"
                    class="w-4 h-4 border  rounded  focus:ring-3  bg-gray-700 border-gray-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800" />

            </div>
            <label for="remember" class="ms-2 text-sm font-medium  text-gray-300">Recordar</label>
        </div>
        <div class="flex justify-start mb-5">

            <span href="" class="mr-2 inline-block text-sm font-medium  text-gray-300">
                ¿No tienes una Cuenta?
            </span>
            <a href="{{ route('register') }}"
                class="ms-2 inline-block text-sm underline underline-offset-4 font-medium  text-gray-300 hover:text-emerald-100  hover:scale-[1.02] duration-[150ms] ">
                Registrarse
            </a>
        </div>
        <button type="submit"
            class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none  font-medium text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-slate-950/50 border border-gray-400 hover:bg-slate-900/50  hover:scale-[1.02] duration-[150ms] focus:ring-emerald-800 hover:border-emerald-300/80 hover:text-emerald-100">Iniciar
            Sesión</button>
    </form>
    <script defer>
        const toggleEye = document.querySelector('#toggle-eye');
        const toggleEyeClosed = document.querySelector('#toggle-eye-closed');
        const password = document.querySelector('#password');

        toggleEye.addEventListener('click', () => {
            password.type = "text";
            toggleEye.classList.toggle('hidden');
            toggleEyeClosed.classList.toggle('hidden');
        });

        toggleEyeClosed.addEventListener('click', () => {
            password.type = "password";
            toggleEye.classList.toggle('hidden');
            toggleEyeClosed.classList.toggle('hidden');
        });
    </script>

@endsection
