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
            animation: carrusel 20s infinite linear;
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
            /* Ancho de la barra de desplazamiento */
            height: 5px;
            /* Alto de la barra de desplazamiento (para el desplazamiento horizontal) */
        }

        /* Estilo del "track" (fondo) de la barra de desplazamiento */
        body::-webkit-scrollbar-track {
            background: transparent;
            /* Color de fondo de la pista */
            border-radius: 10px;
            /* Radio de esquina del track */

        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            /* Color del thumb */
            border-radius: 10px;
            /* Radio de esquina del thumb */
        }
    </style>
    <header class="header-home h-16 bg-black text-white">
        <div class="carrusel-header-home flex   items-center h-full">
            <div class=" text-carrusel">
                <h2 class=" text-2xl tracking-widest">We don´t made jewelry, we made amulets </h2>
            </div>
            <div class=" text-carrusel">
                <h2 class=" text-2xl tracking-widest">We don´t made jewelry, we made amulets </h2>
            </div>

        </div>
    </header>
    <section class=" bg-white  h-[70px]">
        <nav class=" h-full border">
            <ul class=" grid grid-cols-3  items-center px-2  h-full ">
                <li class="   ">
                    <button href="" class="md:hidden">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>

                </li>
                <li class=" flex justify-center">
                    <a class=" text-3xl tracking-widest" href="">ARCA</a>
                </li>
                <li class="      flex justify-end items-center  ">
                    <button id="button-search"
                        class=" mr-[2px] hover:scale-105 duration-200 flex  p-1 rounded-full justify-center items-center "
                        href="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>


                    </button>
                    <input
                        class=" ring-1 outline-none p-[1px]    ring-gray-300 duration-100   sm:h-4/6 sm:w-44 sm:opacity-100 sm:visible  h-0 w-0 opacity-0 invisible focus:ring-2 rounded-md "
                        type="text" name="search" id="search">
                    <a href=""
                        class=" ml-3 mr-1 hover:scale-105 duration-200 hover:bg-gray-100 p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>


                    </a>
                </li>
            </ul>
        </nav>
    </section>
    <footer class=" hidden md:block  bg-white border ">
        <nav class=" w-full flex justify-center items-center">
            <ul class=" w-full flex  justify-evenly p-2 py-3">
                <li class=" p-1 hover:scale-105 duration-200 ">
                    <a class="{{ request()->routeIs('home') ? 'border-b-2 border-black' : '' }}"
                        href="{{ route('home') }}">Inicio</a>
                </li>
                <li class=" ">
                    <a class=" {{ request()->routeIs('catalogue') ? 'border-b-2 border-black' : '' }}"
                        href="{{ route('catalogue') }}">Catálogo</a>
                </li>
                <li class=" ">
                    <a class=" {{ request()->routeis('history') ? 'border-b-2 border-black' : '' }}"
                        href=" {{ route('history') }}">La Esencia del Jade</a>
                </li>
            </ul>
        </nav>
    </footer>
    <main class=" bg-black min-h-dvh">
        @yield('content')
    </main>

    <footer class=" bg-[#191919]  p-4 mt-2  text-white">
        <div class=" grid grid-cols-3">
            <div class=" flex flex-col items-center gap-4 ">
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
            <div class=" flex flex-col items-center gap-4">
                <h2>Redes Sociales</h2>
                <div class=" flex gap-3 ">
                    <a href="" class=" hover:scale-105 duration-200">

                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="  h-6 w-6" viewBox="0,0,256,256">
                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1"
                                stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                <g transform="scale(5.33333,5.33333)">
                                    <path
                                        d="M16.5,5c-6.33361,0 -11.5,5.16639 -11.5,11.5v15c0,6.33276 5.16621,11.5 11.5,11.5h15c6.33294,0 11.5,-5.16706 11.5,-11.5v-15c0,-6.33379 -5.16724,-11.5 -11.5,-11.5zM16.5,8h15c4.71124,0 8.5,3.78779 8.5,8.5v15c0,4.71106 -3.78894,8.5 -8.5,8.5h-15c-4.71221,0 -8.5,-3.78876 -8.5,-8.5v-15c0,-4.71239 3.78761,-8.5 8.5,-8.5zM34,12c-1.105,0 -2,0.895 -2,2c0,1.105 0.895,2 2,2c1.105,0 2,-0.895 2,-2c0,-1.105 -0.895,-2 -2,-2zM24,14c-5.50482,0 -10,4.49518 -10,10c0,5.50482 4.49518,10 10,10c5.50482,0 10,-4.49518 10,-10c0,-5.50482 -4.49518,-10 -10,-10zM24,17c3.88318,0 7,3.11682 7,7c0,3.88318 -3.11682,7 -7,7c-3.88318,0 -7,-3.11682 -7,-7c0,-3.88318 3.11682,-7 7,-7z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <a href="" class=" hover:scale-105 duration-200">

                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class=" h-6 w-6"
                            viewBox="0,0,256,256">
                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1"
                                stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                <g transform="scale(5.12,5.12)">
                                    <path
                                        d="M25,3c-12.13844,0 -22,9.86156 -22,22c0,11.01913 8.12753,20.13835 18.71289,21.72852l1.14844,0.17383v-17.33594h-5.19727v-3.51953h5.19727v-4.67383c0,-2.87808 0.69065,-4.77363 1.83398,-5.96289c1.14334,-1.18926 2.83269,-1.78906 5.18359,-1.78906c1.87981,0 2.61112,0.1139 3.30664,0.19922v2.88086h-2.44727c-1.38858,0 -2.52783,0.77473 -3.11914,1.80664c-0.59131,1.03191 -0.77539,2.264 -0.77539,3.51953v4.01758h6.12305l-0.54492,3.51953h-5.57812v17.36523l1.13477,-0.1543c10.73582,-1.45602 19.02148,-10.64855 19.02148,-21.77539c0,-12.13844 -9.86156,-22 -22,-22zM25,5c11.05756,0 20,8.94244 20,20c0,9.72979 -6.9642,17.7318 -16.15625,19.5332v-12.96875h5.29297l1.16211,-7.51953h-6.45508v-2.01758c0,-1.03747 0.18982,-1.96705 0.50977,-2.52539c0.31994,-0.55834 0.62835,-0.80078 1.38477,-0.80078h4.44727v-6.69141l-0.86719,-0.11719c-0.59979,-0.08116 -1.96916,-0.27148 -4.43945,-0.27148c-2.7031,0 -5.02334,0.73635 -6.625,2.40234c-1.60166,1.66599 -2.39258,4.14669 -2.39258,7.34961v2.67383h-5.19727v7.51953h5.19727v12.9043c-9.04433,-1.91589 -15.86133,-9.84626 -15.86133,-19.4707c0,-11.05756 8.94244,-20 20,-20z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <a href="" class=" hover:scale-105 duration-200 ">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class=" h-6 w-6"
                            viewBox="0,0,256,256">
                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1"
                                stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                <g transform="scale(5.12,5.12)">
                                    <path
                                        d="M25,2c-12.65234,0 -23,9.59766 -23,21.5c0,6.50781 3.13281,12.28516 8,16.21875v8.9375l1.46875,-0.78125l7.21875,-3.75c2.01563,0.53906 4.11328,0.875 6.3125,0.875c12.65234,0 23,-9.59766 23,-21.5c0,-11.90234 -10.34766,-21.5 -23,-21.5zM25,4c11.64453,0 21,8.75781 21,19.5c0,10.74219 -9.35547,19.5 -21,19.5c-2.16406,0 -4.25781,-0.3125 -6.21875,-0.875l-0.375,-0.09375l-0.34375,0.1875l-6.0625,3.15625v-6.5625l-0.375,-0.28125c-4.66406,-3.58984 -7.625,-8.99219 -7.625,-15.03125c0,-10.74219 9.35547,-19.5 21,-19.5zM22.71875,17.71875l-12.03125,12.75l10.8125,-6.0625l5.78125,6.1875l11.875,-12.875l-10.53125,5.90625z">
                                    </path>
                                </g>
                            </g>
                        </svg>
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

        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class=" w-10 h-10 " viewBox="0 0 48 48">
            <path fill="#fff"
                d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z">
            </path>
            <path fill="#fff"
                d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z">
            </path>
            <path fill="#cfd8dc"
                d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z">
            </path>
            <path fill="#40c351"
                d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z">
            </path>
            <path fill="#fff" fill-rule="evenodd"
                d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"
                clip-rule="evenodd"></path>
        </svg>
    </a>
    <script defer>
        const $searchButton = document.querySelector('#button-search');
        const $search = document.querySelector('#search');

        /*   $searchButton.addEventListener('click',()=>{
            $search.classList.remove('invisible','h-0','w-0','opacity-0');
          }) */
    </script>


</body>

</html>
