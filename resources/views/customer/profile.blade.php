@extends('layouts.customer')
@section('content')
    <h2 class=" text-white text-3xl mx-auto w-fit  m-4 font-medium">Perfil
    </h2>



    <div
        class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap mx-auto w-fit -mb-px">
            <li class="me-2">
                <a href="#"
                    class="inline-block p-4  rounded-t-lg   {{ request()->routeIs('profile') ? 'text-emerald-500/80 border-b-2 border-emerald-500/80' : ' hover:border-gray-300 hover:text-gray-300 hover:border-b-2' }}">Perfil</a>
            </li>
            <li class="me-2">
                <a href="#"
                    class="inline-block p-4  rounded-t-lg   {{ request()->routeIs('home') ? 'text-blue-500 border-b-2 border-blue-600' : 'hover:text-gray-300 hover:border-gray-300 hover:border-b-2' }} "
                    aria-current="page">Historial de Pedidos</a>
            </li>




        </ul>
    </div>



    <form class="max-w-sm mx-auto my-10">
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
            <input type="text" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 outline-none focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-white"
                placeholder="Albert Einstein" required />
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" id="email"
                class="bg-gray-50 border outline-none   border-gray-300 text-gray-900 text-sm    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-white"
                placeholder="name@example.com" required />
        </div>
        <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
                <input id="remember" type="checkbox" value=""
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                    required />
            </div>
            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
        </div>
        <button type="submit"
            class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-slate-950/50 border border-gray-400 dark:hover:bg-slate-900/50  hover:scale-[1.02] duration-[150ms] dark:focus:ring-blue-800 hover:border-emerald-300/80 hover:text-emerald-100">Guardar</button>
    </form>
@endsection
