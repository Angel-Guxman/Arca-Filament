<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', env('APP_NAME')) </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/arca-a.ico') }}" sizes="16x16">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.4.0/build/css/intlTelInput.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body class=" bg-black  ">
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
            animation: carrusel 20s infinite linear
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

        .menu-option:hover {
            box-shadow: 0 0 10px rgb(255, 255, 255, 0.4);
        }

        .transition-menu {
            animation: menu-hamburger-animation 250ms ease;
        }

        @keyframes menu-hamburger-animation {
            0% {
                transform: translateX(-450px);
            }

            100% {
                transform: translateX(0px);
            }
        }

        .catalogue:hover .option-catalogue {
            visibility: visible;
            min-height: 130px;
            width: 250px;
            opacity: 100%;
            transition: width 250ms ease, opacity 250ms ease, visibility 250ms ease;
        }
    </style>




    <header class="header-home  py-1 bg-black text-white">
        <div class="carrusel-header-home flex   items-center h-full">
            <div class=" text-carrusel text-center">
                <h2 class=" text-xl tracking-widest">We don´t made jewelry, we made amulets </h2>
            </div>
            <div class=" text-carrusel text-center">
                <h2 class=" text-xl tracking-widest">We don´t made jewelry, we made amulets </h2>
            </div>

        </div>
    </header>
    <section class=" sticky  top-0 z-[21] bg-white  ">


        <nav class=" h-full  border relative ">
            <div class=" absolute hidden      min-h-[85px]    left-0 right-0    z-20" id="search-menu">

                <livewire:customer.dynamic-search />
            </div>
            {{-- closed button --}}
            <div
                class="hidden  w-full  absolute  z-[21]  backdrop-brightness-50 justify-start items-end  md:hidden btn-closed    ">

                <button class=" hover:bg-gray-100 ml-2 bg-white  p-2 duration-200 h-fit   rounded-full ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <ul class=" grid grid-cols-3   items-center px-2  h-full ">
                <li class=" flex items-center  z-[19]  ">
                    <button href="" class=" md:hidden hamburger-btn hover:bg-gray-100 p-2 rounded-full">
                        <x-svgs.hamburger-button class=" size-6"></x-svgs.hamburger-button>
                    </button>
                    @auth
                        <a href="{{ route('profile') }}"
                            class="hidden md:inline-block   hamburger-btn hover:bg-gray-100 p-2 rounded-full ">
                            <x-svgs.user-button></x-svgs.user-button>

                        </a>

                    @endauth
                    @guest
                        <a href="{{ route('login') }}"
                            class="hidden md:inline-block hamburger-btn hover:bg-gray-100 p-2 rounded-full ">
                            <x-svgs.user-button></x-svgs.user-button>
                        </a>
                    @endguest

                </li>
                <li class=" flex justify-center">
                    <a class=" text-2xl tracking-widest" href="{{ route('home') }}">ARCA</a>
                </li>
                <li class="    relative      flex justify-end items-center  ">
                    <button id="button-search"
                        class=" mr-[2px]  duration-200 flex  hover:bg-gray-100 p-1 rounded-full justify-center items-center  "
                        href="">
                        <x-svgs.search-button></x-svgs.search-button>
                    </button>

                    <a href="{{ route('cart') }}"
                        class=" ml-3 mr-1 hover:scale-105 duration-200 relative hover:bg-gray-100 p-2 rounded-full ">

                        <x-svgs.cart-button></x-svgs.cart-button>
                        @auth

                            <div id="cart-count"
                                class="bottom-0 hidden rounded-full bg-black text-xs text-white px-2 py-[2px] right-0 absolute">


                            </div>

                        @endauth


                    </a>
                    <a href="{{ route('favorites') }}"
                        class="  hover:scale-105 duration-200 hover:bg-gray-100 p-2 rounded-full">
                        <x-svgs.heart-button></x-svgs.heart-button>

                    </a>
                </li>
            </ul>
        </nav>

        <section class=" w-full  md:block  hidden      bg-neutral-100/90 ">
            <nav class=" border-b-2 w-full flex justify-center items-center">
                <ul class=" w-full grid grid-cols-3 justify-items-center ">
                    <a href="{{ route('home') }}"
                        class=" text-black py-2 px-3  duration-200   hover:bg-gray-200/80  {{ request()->routeIs('home') ? 'border-b-2  border-gray-600' : '' }} ">
                        Inicio
                    </a>
                    <div class="catalogue relative ">
                        <a href="{{ route('catalogue') }}"
                            class="      flex items-center gap-1 py-2 px-3 text-black    hover:bg-gray-200/80 duration-200 {{ request()->routeIs('catalogue') ? 'border-b-2  border-gray-600' : '' }} ">

                            Catálogo


                        </a>

                    </div>

                    <a href=" {{ route('history') }}"
                        class=" py-2 px-3 text-black  duration-200   hover:bg-gray-200/80 {{ request()->routeis('history') ? 'border-b-2  border-gray-600' : '' }}  ">
                        La Esencia del Jade
                    </a>
                </ul>

            </nav>
            </footer>
        </section>
    </section>
    {{-- menu hamburguesa --}}
    <div class=" menu-hamburger hidden   h-full    md:hidden fixed z-20 left-0 right-0 top-0 backdrop-brightness-50">
        <div class="flex justify-start items-center h-[100%]">
            <div class="container-menu   w-full max-w-[450px]  mt-5   pb-10    p-4 px-4 bg-black shadow-2xl  z-20">
                <h1 class=" text-white  mb-2  text-center underline-offset-4  underline  py-2">Menú</h1>
                <ul class=" flex flex-col gap-3">
                    <a href="{{ route('home') }}"
                        class="text-sm  link-menu-hamburger text-center  border hover:opacity-95 hover:scale-[.99] menu-option duration-200   p-2 {{ request()->routeIs('home') ? ' bg-black  border-emerald-400/80 text-emerald-100' : 'text-gray-100 bg-black border-gray-400' }} ">
                        Inicio</a>
                    <a href="{{ route('catalogue') }}"
                        class="link-menu-hamburger border  text-sm text-center  duration-200  p-2 hover:opacity-95 hover:scale-[.99] menu-option {{ request()->routeIs('catalogue') ? ' bg-black  border-emerald-400/80 text-emerald-100' : 'text-gray-100 bg-black border-gray-400' }}">Cátalogo</a>
                    <a href="{{ route('history') }}"
                        class="link-menu-hamburger   duration-200 text-sm  text-center border  p-2  hover:opacity-95 hover:scale-[.99] menu-option   {{ request()->routeIs('history') ? ' bg-black  border-emerald-400/80 text-emerald-100' : 'text-gray-100 bg-black  border-gray-400' }} ">Esencia
                        del Jade</a>
                    @auth
                        <a href="{{ route('profile') }}"
                            class="link-menu-hamburger   duration-200 text-sm  text-center  border  p-2  hover:opacity-95 hover:scale-[.99] menu-option  {{ request()->routeIs('profile') ? ' bg-black  border-emerald-400/80 text-emerald-100' : 'text-gray-100 border-gray-400  bg-black' }} ">
                            Perfil
                        </a>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}"
                            class="link-menu-hamburger   duration-200 text-sm  text-center  border  p-2  hover:opacity-95 hover:scale-[.99] menu-option  {{ request()->routeIs('profile') ? ' bg-black  border-emerald-400/80 text-emerald-100' : 'text-gray-100 border-gray-400 bg-black' }} ">
                            Iniciar Sesión
                        </a>
                    @endguest
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
                <a href="{{ route('privacyNotice') }}"
                    class=" hover:scale-105 duration-200 hover:underline-offset-4 hover:underline">Avisos
                    de Privacidad</a>
                <a
                    href=""class=" hover:scale-105 duration-200 hover:underline-offset-4 hover:underline">Cuidados</a>
                <a href="{{ route('history') }}"
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
    <a href="https://wa.me/529984930161?text=Hola%20quiero%20más%20información!"
        class="fixed bottom-0 right-0 my-5 mx-3">
        <x-svgs.whatsapp-button></x-svgs.whatsapp-button>
    </a>


    <script defer>
        async function cartCount() {
            const cartCount = document.getElementById('cart-count')
            if (!cartCount) {
                return
            }
            try {
                const response = await axios.get('/cart-count')
                if (response.data.success) {
                    let count = response.data.count;
                    if (count >= 100) {
                        cartCount.innerHTML = `  <small >+99</small>`;
                        cartCount.classList.remove('hidden')
                    } else if (count > 0) {
                        cartCount.innerHTML = `  <small >${count}</small>`;
                        cartCount.classList.remove('hidden')

                    }
                }
            } catch (error) {
                console.log('ocurrio un error en el contador principal');

                console.log(error);
            }

        }
        cartCount()
        const $searchClose = document.querySelector('#search-close');
        const $buttonSearch = document.querySelector('#button-search');
        const $searchMenu = document.querySelector('#search-menu');
        $buttonSearch.addEventListener('click', () => {
            $searchMenu.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

        })


        $searchClose.addEventListener('click', () => {
            $searchMenu.classList.add('hidden');
            document.body.style.overflow = '';



        })

        /*   $searchButton.addEventListener('click',()=>{
            $search.classList.remove('invisible','h-0','w-0','opacity-0');
          }) */
        const hamburgerBtn = document.querySelector('.hamburger-btn');
        const menuHamburger = document.querySelector('.menu-hamburger');
        const containerMenu = document.querySelector('.container-menu');
        const btnClosed = document.querySelector('.btn-closed');
        const links = Array.from(document.querySelectorAll('.link-menu-hamburger'));
        links.forEach(l => {
            l.addEventListener('click', () => {
                menuHamburger.classList.add('hidden');
                btnClosed.classList.replace('flex', 'hidden');
                containerMenu.classList.remove('transition-menu');
                document.body.style.overflow = '';
            })
        });
        hamburgerBtn.addEventListener('click', () => {
            menuHamburger.classList.remove('hidden');
            btnClosed.classList.replace('hidden', 'flex');
            document.body.style.overflow = 'hidden';
            containerMenu.classList.add('transition-menu');
        })

        btnClosed.addEventListener('click', () => {
            menuHamburger.classList.add('hidden');
            menuHamburger.classList.add('hidden');
            btnClosed.classList.replace('flex', 'hidden');
            containerMenu.classList.remove('transition-menu');
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
