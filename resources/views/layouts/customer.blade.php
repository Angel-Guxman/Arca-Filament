<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/arca-a.ico') }}" sizes="16x16">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body class=" bg-black">
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }

        .header-home {

            overflow: hidden;
            width: 100%;
        }

        .carrusel-header-home {
            width: 200%;
            animation: carrusel 20s 1 linear
                /* ,
            ensulugar 2s 1 linear forwards 20s */
            ;
        }

        .text-carrusel {
            width: 50%;
        }

        @keyframes carrusel {
            0% {
                transform: translateX(-50%)
            }

            100% {
                transform: translateX(0%)
            }
        }

        body::-webkit-scrollbar {
            width: 5px;
            /* horizontal */
            height: 5px;

        }

        /* Estilo del "track" (fondo) de la barra de desplazamiento */
        body::-webkit-scrollbar-track {
            background: #fffefe00;

        }

        body::-webkit-scrollbar-thumb {

            background: #888;
            /* Color del thumb */
            border-radius: 5px;
            /* Radio de esquina del thumb */
        }
    </style>

    <header class="header-home h-16 bg-black text-white">
        <div class="carrusel-header-home flex   items-center h-full">
            <div class=" text-carrusel text-center">
                <h2 class=" text-2xl tracking-widest">We don´t made jewelry, we made amulets </h2>
            </div>
            <div class=" text-carrusel text-center">
                <h2 class=" text-2xl tracking-widest">We don´t made jewelry, we made amulets </h2>
            </div>

        </div>
    </header>
    <section class=" bg-white  h-[60px] ">
        <nav class=" h-full border">
            <ul class=" grid grid-cols-3  items-center px-2  h-full ">
                <li class="   ">
                    <button href="" class=" md:hidden hamburger-btn hover:bg-gray-100 p-2 rounded-full">
                        <x-svgs.hamburger-button></x-svgs.hamburger-button>
                    </button>

                </li>
                <li class=" flex justify-center">
                    <a class=" text-3xl tracking-widest" href="">ARCA</a>
                </li>
                <li class="      flex justify-end items-center  ">
                    <button id="button-search"
                        class=" mr-[2px] hover:scale-105 duration-200 flex  p-1 rounded-full justify-center items-center "
                        href="">
                        <x-svgs.search-button></x-svgs.search-button>
                    </button>
                    <input
                        class=" ring-1 outline-none p-[1px]    ring-gray-300 duration-100   sm:h-4/6 sm:w-44 sm:opacity-100 sm:visible  h-0 w-0 opacity-0 invisible focus:ring-2 rounded-md "
                        type="text" name="search" id="search">
                    <a href=""
                        class=" ml-3 mr-1 hover:scale-105 duration-200 hover:bg-gray-100 p-2 rounded-full">
                        <x-svgs.cart-button></x-svgs.cart-button>


                    </a>
                </li>
            </ul>
        </nav>
    </section>
    <footer class=" hidden md:block       bg-neutral-200 ">
        <nav class=" w-full flex justify-center items-center">
            <ul class=" w-full grid grid-cols-3 justify-items-center ">
                <li class=" py-2 px-3  duration-200   hover:bg-neutral-300/90">
                    <a class="   {{ request()->routeIs('home') ? 'border-b-2  border-gray-600' : '' }} "
                        href="{{ route('home') }}">Inicio</a>
                </li>
                <li class=" py-2 px-3    hover:bg-neutral-300/90 duration-200  ">
                    <a class=" {{ request()->routeIs('catalogue') ? 'border-b-2  border-black' : '' }}"
                        href="{{ route('catalogue') }}">Catálogo</a>
                </li>
                <li class=" py-2 px-3  duration-200   hover:bg-neutral-300/90  ">
                    <a class="{{ request()->routeis('history') ? 'border-b-2  border-black' : '' }}"
                        href=" {{ route('history') }}">La Esencia del Jade</a>
                </li>
            </ul>
        </nav>
    </footer>
    <div class=" menu-hamburger hidden   md:hidden absolute z-20 left-0 right-0 top-0 bottom-0 backdrop-brightness-50">
        <div class=" flex justify-start items-end    h-[18%]">
            <button class=" btn-closed bg-neutral-100 ml-2 mb-1 p-2 hover:scale-105 duration-200 h-fit   rounded-full ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex justify-center items-center  h-[33%]">
            <div class="  border     p-4 px-4  bg-neutral-100/90  shadow-2xl rounded-md z-20">
                <ul class=" flex flex-col gap-2">
                    <a href=""
                        class="hover:bg-gray-100 hover:border-gray-300 hover:text-slate-700 text-sm border bg-white rounded-md p-2 {{ request()->routeIs('home') ? 'border-gray-400 border-2   ' : '' }} ">


                        Inicio</a>
                    <a href=""
                        class="hover:bg-gray-100 hover:border-gray-300 hover:text-slate-700 border text-sm bg-white rounded-md p-2 {{ request()->routeIs('catalogue') ? 'border-gray-400 border-2' : '' }}">Cátalogo</a>
                    <a href=""
                        class="hover:bg-gray-100 hover:border-gray-300 hover:text-slate-700 text-sm bg-white border rounded-md p-2 {{ request()->routeIs('history') ? 'border-gray-400 border-2' : '' }} ">Esencia
                        del Jade</a>
                </ul>
            </div>
        </div>
    </div>

    <main class=" bg-black min-h-dvh">
        @yield('content')
    </main>

    <footer class=" bg-[#191919]  p-4 mt-4  text-white">
        <div class=" grid grid-cols-3">
            <div class=" flex flex-col items-center text-center gap-5 ">
                <a href="" class=" hover:scale-105 duration-200 hover:underline-offset-4 hover:underline">Avisos
                    de Privacidad</a>
                <a
                    href=""class=" hover:scale-105 duration-200 hover:underline-offset-4 hover:underline">Cuidados</a>
                <a href=""
                    class=" hover:scale-105 duration-200 hover:underline-offset-4 hover:underline">Historia</a>
            </div>
            <div class=" flex flex-col items-center gap-4">
                <a href=""
                    class=" hover:scale-105 duration-200 hover:underline-offset-4 hover:underline">Misión</a>
                <a href=""
                    class=" hover:scale-105 duration-200 hover:underline-offset-4 hover:underline">Visión</a>
                <a href=""
                    class=" hover:scale-105 duration-200 hover:underline-offset-4 hover:underline">Contacto</a>
            </div>
            <div class=" flex flex-col  text-center items-center gap-4">
                <h2>Redes Sociales</h2>
                <div class=" flex gap-3 ">
                    <a href="" class=" hover:scale-105 duration-200">
                        <x-svgs.instagram-icon></x-svgs.instagram-icon>
                    </a>
                    <a href="" class=" hover:scale-105 duration-200">
                        <x-svgs.facebook-icon></x-svgs.facebook-icon>
                    </a>
                    <a href="" class=" hover:scale-105 duration-200 ">
                        <x-svgs.messenger-icon></x-svgs.messenger-icon>
                    </a>

                </div>
                <h2>Alessandro Cardone</h2>
            </div>

        </div>
        <div class=" w-full mt-8">
            <h3 class=" mx-auto w-fit">
                © Arca S.A. de C.V. 2024.

            </h3>
        </div>


    </footer>
    <a href="" class=" fixed  bottom-0 right-0 my-5 mx-3">
        <x-svgs.whatsapp-button></x-svgs.whatsapp-button>
    </a>
    <script defer>
        const $searchButton = document.querySelector('#button-search');
        const $search = document.querySelector('#search');

        /*   $searchButton.addEventListener('click',()=>{
            $search.classList.remove('invisible','h-0','w-0','opacity-0');
          }) */
        const hamburgerBtn = document.querySelector('.hamburger-btn');
        const menuHamburger = document.querySelector('.menu-hamburger');
        hamburgerBtn.addEventListener('click', () => {
            menuHamburger.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        })
        const btnClosed = document.querySelector('.btn-closed');
        btnClosed.addEventListener('click', () => {
            menuHamburger.classList.add('hidden');
            document.body.style.overflow = '';

        })
        // Define una media query
        const mediaQuery = window.matchMedia("(max-width: 768px)");
        // Añadir un listener para que la función se ejecute al cambiar el tamaño de la ventana
        mediaQuery.addEventListener('change', handleResize);

        function handleResize(event) {
            if (event.matches) {
                if (!menuHamburger.classList.contains('hidden')) {
                    document.body.style.overflow = 'hidden';
                }
            } else {
                document.body.style.overflow = '';

            }
        }

        // Ejecutar la función para establecer el estado inicial
        handleResize(mediaQuery);
    </script>
</body>

</html>
