<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <style>
        body{
            font-family: "Poppins", sans-serif;
        }
        .header-home{
            overflow: hidden;
            width:100%;
        }
        .carrusel-header-home{
            width: 200%;
            animation: carrusel 20s infinite linear;
        }
        .text-carrusel{
            width: 50%;
        }
        
        @keyframes carrusel{
            0%{
            transform: translateX(-50%)

            }
            100%{
            transform: translateX(0%)

            }
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
    <section class="  h-[70px]">
        <nav class=" h-full">
            <ul class=" grid grid-cols-3  items-center px-2  h-full ">
                <li class="   ">
                    <button href="" class="sm:hidden">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                      
                </li>
                <li class=" flex justify-center ">
                    <a class=" text-3xl tracking-widest" href="">ARCA</a>
                </li>
                <li class="      flex justify-end items-center  ">
                    <button id="button-search" class=" mr-[2px] hover:scale-105 duration-200 flex  p-1 rounded-full justify-center items-center " href="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                          </svg>
                      
                          
                    </button>
                    <input class=" ring-1 outline-none p-[1px]    ring-gray-300 duration-100   sm:h-4/6 sm:w-44 sm:opacity-100 sm:visible  h-0 w-0 opacity-0 invisible focus:ring-2 rounded-md " type="text" name="search" id="search">
                    <a href="" class=" ml-3 mr-1 hover:scale-105 duration-200 hover:bg-gray-100 p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                          </svg>
                       
                          
                    </a>
                </li>
            </ul>
        </nav>
    </section>
    <footer class=" hidden sm:block  bg-white">
        <nav class=" w-full flex justify-center items-center">
            <ul class=" w-full flex justify-around p-2 py-3">
                <li class=" p-1 hover:scale-105 duration-200">
                    <a class="{{request()->routeIs('home')? 'border-b-2 border-black':''}}" href="">Inicio</a>
                    </li>
                <li>
                    <a href="">Catálogo</a>
                    </li>
                <li>
                    <a href="">Productos</a>
                     </li>
                <li>
                    <a href="">Contacto</a>
                    </li>

            </ul>
        </nav>
    </footer>
    <main class=" bg-black min-h-dvh">
        @yield('contenido')
    </main>
    <footer class=" bg-black/90 h-24 text-white">
  

    </footer>
    <script defer>
        const $searchButton =document.querySelector('#button-search');
        const $search =document.querySelector('#search');

      /*   $searchButton.addEventListener('click',()=>{
            $search.classList.remove('invisible','h-0','w-0','opacity-0');
            
        }) */

    </script>
    
</body>
</html>