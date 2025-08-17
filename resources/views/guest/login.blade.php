@extends('layouts.guest')
@section('title', 'Iniciar Sesión')

@section('content')
    <div class=" max-w-md flex mx-auto justify-start items-center ">
        <a href="{{ route('home') }}"
            class="   flex justify-center border-[0.5px] hover:border-neutral-500 border-neutral-600   gap-1 items-center group  p-2 w-fit">


            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-[14px]  text-white ">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
            </svg>

            <span class="  block text-white   text-sm">regresar</span>
        </a>

    </div>

    <form class="max-w-md mx-auto mb-10 mt-2 rounded-md  border border-neutral-700/80 p-5 bg-neutral-900"
        action="{{ route('auth.login') }}" method="POST">
        @csrf
        @if (request('product_slug') && request('quantity'))
            <input type="hidden" name="product_slug" value="{{ request('product_slug') }}">
            <input type="hidden" name="quantity" value="{{ request('quantity') }}">
        @endif



        <h1 class=" text-white mb-5 font-semibold font-sans tracking-wider text-xl text-center ">Inicio de Sesión</h1>
        @if (session('error'))
            <h3 class=" text-red-400 mb-3 font-medium text-sm text-center "> {{ session('error') }}</h3>
        @endif

        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium  text-white">Correo Electrónico
                <span class=" text-red-400">*</span>
            </label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class=" border outline-none     text-sm  rounded-md   block w-full p-2.5 bg-neutral-800 border-neutral-600 text-neutral-200 placeholder-neutral-400  focus:ring-neutral-500 focus:border-neutral-500"
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
                <input type="password" id="password" name="password" placeholder="********"
                    class=" border outline-none     text-sm  rounded-md   block w-full p-2.5 bg-neutral-800 border-neutral-600 text-neutral-200 placeholder-neutral-400  focus:ring-neutral-500 focus:border-neutral-500 "
                    required />
                <div class="  absolute right-2   inset-y-0 flex items-center">

                    <x-svgs.eye id="toggle-eye" class=" cursor-pointer size-5 text-neutral-200"></x-svgs.eye>
                    <x-svgs.eye-closed id="toggle-eye-closed"
                        class=" cursor-pointer hidden size-5 text-neutral-200"></x-svgs.eye-closed>

                </div>
            </div>
            @error('password')
                <span class=" block text-red-400 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex items-start mb-5">
            <div class="flex items-center h-5 relative">
                <input id="remember" name="remember" type="checkbox"
                    class="w-4 h-4 border peer  rounded  bg-neutral-700 border-neutral-500 checked:bg-neutral-600 checked:border-neutral-600 appearance-none" />
                <span
                    class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
                        stroke="currentColor" stroke-width="1">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
            </div>
            <label for="remember" class="ms-2 text-sm font-medium  text-gray-300">Recordar</label>
        </div>
        <div class="flex justify-start mb-5">

            <span href="" class="mr-2 inline-block text-sm font-medium  text-gray-300">
                ¿No tienes una Cuenta?
            </span>
            <a href="{{ route('register') }}"
                class="ms-2 inline-block text-sm underline underline-offset-4 font-medium  text-gray-300 hover:text-gray-200 ">
                Registrarse
            </a>
        </div>
        <button type="submit" class="button-primary w-full py-3">Iniciar
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
