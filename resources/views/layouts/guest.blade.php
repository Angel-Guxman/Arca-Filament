<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', env('APP_NAME')) </title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/arca-a.ico') }}" sizes="16x16">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body class=" bg-black  ">
    <style>
        body {
            font-family: "Poppins", sans-serif;
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





    <section class="    top-0 z-20">
        <nav class=" h-full  relative">

            <li class=" flex justify-center w-fit mx-auto text-white  py-10">
                <a class=" text-4xl tracking-widest" href="{{ route('home') }}">ARCA</a>
            </li>

        </nav>

    </section>



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
    <a href="" class=" fixed  bottom-0 right-0 my-5 mx-3">
        <x-svgs.whatsapp-button></x-svgs.whatsapp-button>
    </a>


</body>

</html>
