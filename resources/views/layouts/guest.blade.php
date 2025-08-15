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





    <section class="     top-0 z-20">
        <nav class="  flex justify-center  relative">


            <a class=" text-4xl tracking-widest text-white py-8 " href="{{ route('home') }}">ARCA</a>


        </nav>

    </section>



    <main class=" bg-black ">
        @yield('content')
    </main>


    <a href="" class=" fixed  bottom-0 right-0 my-5 mx-3">
        <x-svgs.whatsapp-button></x-svgs.whatsapp-button>
    </a>


</body>

</html>
