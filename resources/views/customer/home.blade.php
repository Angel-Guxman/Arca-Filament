@extends('layouts.customer')
@section('content')
    <style>
        /*  .custom-size {
                width: 90%;
                height: 80%;
            } */
        /*    .coming:hover{
                box-shadow: 0px 0px 10px rgb(249, 249, 249);
                transition: 200ms;
             } */

        .arca-letter-animation {
            animation: animation-init 0.3s 1 cubic-bezier(.65, .05, .36, 1);

        }

        @keyframes animation-init {
            0% {
                transform: translateX(-30%)
            }

            100% {
                transform: translateY(0%)
            }

        }

        @media(prefers-reduced-motion:reduce) {
            .arca-letter-animation {
                animation: none;
            }

        }

        .animation-description {
            animation: animation-reveal linear both;
            animation-timeline: view();
            animation-range: entry 20% cover 30%;

        }

        .image-reveal {
            animation: animation-reveal linear both;
            animation-timeline: view();
            animation-range: entry 20% cover 30%;
        }

        @keyframes animation-reveal {
            0% {
                opacity: 0;
                translate: 0 100px;
            }

            100% {
                opacity: 1;
                translate: 0 0;
            }
        }

        .header-products-customer {
            display: flex;
            justify-content: center;
            font-weight: 600;
            font-size: 30px;
            margin-bottom: 10px;

        }

        /* nombre de la categoria */
        .product-category-carrusel {
            text-align: center;
            font-weight: 600;
            font-size: 40px;
            color: white;
            margin-bottom: 10px;

        }

        /* contenedor de la vista del viewport carrusel */
        .cont-viewport-products-customer {
            background-color: black;
            width: 90%;
            overflow: hidden;
            overflow-x: scroll;

        }

        .cont-viewport-products-customer::-webkit-scrollbar-thumb {
            --tw-bg-opacity: 0.9;
            /* background-color: rgb(109, 109, 251); */
            background-color: #d4d2d2;
            border-radius: 4px;
            /* Bordes redondeados */
        }

        .cont-viewport-products-customer::-webkit-scrollbar {
            display: none;
            /* Oculta la barra de desplazamiento en navegadores WebKit como Chrome y Safari */
        }

        /*  firefox */
        .cont-viewport-products-customer {
            scrollbar-width: none;
            -webkit-scrollbar-width: none;
        }

        .cont-viewport-products-customer {
            -ms-overflow-style: none;
            /* Oculta la barra de desplazamiento en IE y Edge */
        }

        .cont-viewport-products-customer:hover .icon-back-carrusel-products-customer {
            display: flex;
        }

        .cont-viewport-products-customer:hover .icon-next-carrusel-products-customer {
            display: flex;
        }

        .icon-back-carrusel-products-customer {
            z-index: 1;
            outline: color-mix(in srgb, #afaeae 60%, transparent) solid 0.2px;
            position: absolute;
            font-size: 40px;
            display: none;
            justify-content: center;
            align-items: center;
            top: 50%;
            left: 4%;
            background-color: color-mix(in srgb, #f1f6f7 65%, transparent);
            border-radius: 50%;
            color: color-mix(in srgb, #2c2e30 85%, transparent);
            height: min-content;
            padding: 5px;
            cursor: pointer;
        }

        .linea-notification-error {
            background-color: red;

            height: 2px;
            animation: loading 2500ms 1;
        }

        @keyframes loading {
            0% {
                width: 0%;
            }

            100% {
                width: 100%;
            }
        }

        .linea-notification-success {
            background-color: rgb(32, 212, 62);
            height: 2px;
            animation: loading 2500ms 1;
        }

        .icon-next-carrusel-products-customer {
            position: absolute;
            outline: color-mix(in srgb, #afaeae 60%, transparent) solid 0.2px;
            background-color: color-mix(in srgb, #f1f6f7 65%, transparent);
            font-size: 40px;
            cursor: pointer;
            display: none;
            justify-content: center;
            align-items: center;
            right: 4%;
            top: 50%;
            padding: 5px;

            color: color-mix(in srgb, #302c2c 85%, transparent);
            border-radius: 50%;

        }

        /* contenedor de las cards */
        .cont-carrusel-product {
            display: flex;
            gap: 35px;
        }

        /* carta del producto */
        .card-carrusel-product {

            margin-top: 4px;
            margin-bottom: 5px;
            background: black;

        }

        .product-name-card {
            background: rgb(255, 255, 255, 0.2);
            backdrop-filter: blur(7px);
        }

        .vendor-image {
            background: rgb(255, 255, 255, 0.2);
            backdrop-filter: blur(7px);
        }




        /* nombre del producto */
        .product-name-card {
            transition: 200ms;
            white-space: nowrap;
            width: 100%;
            text-overflow: ellipsis;
            overflow: hidden;
            color: white;
        }



        /* Estilizar la barra de desplazamiento */
        .product-description-card::-webkit-scrollbar {
            width: 3px;
            /* Grosor de la barra de desplazamiento */
        }

        .product-description-card::-webkit-scrollbar-thumb {
            --tw-bg-opacity: 0.9;
            /* background-color: rgb(109, 109, 251); */
            background-color: #d4d2d2;
            border-radius: 4px;
            /* Bordes redondeados */
        }

        .active~.answer {
            opacity: 1;
            visibility: visible;
            height: 100%;
            padding: 2px;
            transition: height 300ms linear, opacity 300ms linear, visibility 300ms linear;
        }

        .active {
            color: rgb(114, 142, 254);
            border: rgb(114, 142, 254) 1px solid;
        }

        .active .btn-open-closed {
            animation: rota 500ms linear both;
        }

        @keyframes rota {
            100% {
                transform: rotate(180deg);
            }
        }
    </style>
    <section class=" p-4">
        <div class=" md:mx-10 my-5 md:max-h-[500px]   relative       grid grid-cols-1 md:grid-cols-2 ">
            <section
                class="   md:max-h-[500px] md:static z-10 left-0 right-0 top-7 bottom-0    md:grid absolute text-white  grid-cols-1 items-center justify-items-center ">
                <div class=" flex flex-col gap-4 ">

                    <h1 class=" text-9xl mx-auto arca-letter-animation ">Arca</h1>
                    <h3 class=" text-3xl mx-auto  arca-letter-animation">Accesorios de Jade</h3>
                    <a href=""
                        class="  text-xl border    md:border-[#2f3336] mx-auto p-2 hover:bg-white hover:text-black duration-200 md:hover:scale-105 relative">

                        Comprar</a>
                </div>
            </section>
            <div class=" max-h-[400px]      ">
                <img class="  md:hover:brightness-105 brightness-75 opacity-95 md:opacity-100  md:brightness-100 md:border-[#2f3336]  md:border md:p-10  max-h-full w-auto mx-auto object-contain   "
                    src="{{ asset('images/image.png') }}" alt="" />
            </div>
        </div>
    </section>
    <section class=" grid md:grid-cols-1  gap-5   p-4 mb-14  mt-14">
        <div
            class=" text-white underline-offset-2 underline animation-description  flex flex-col text-center items-center  justify-center gap-2 mb-5 ">
            <h1 class=" text-2xl">Arca</h1>
            <h1 class=" text-2xl">
                Es una marca de joyeria fina 100% mexicana
            </h1>
            <h1 class="  text-2xl">
                caracterizada en el uso de la piedra preciosa jade</h1>
        </div>
        <div class=" mx-auto md:w-[600px] w-[300px] duration-200  animation-description     ">
            <div class=" md:w-[600px] w-[300px] h-[300px] relative  p-2 group  ">
                <img src="{{ asset('images/vendor/img-tres.jpg') }}"
                    class="  group-hover:brightness-75 rounded-md  h-full w-full" alt="">
                <span
                    class=" absolute z-10  top-1/2 text-center group-hover:opacity-100 opacity-0 duration-200  text-lg font-medium text-white  left-0 right-0 ">Lorem
                    ipsum dolor, sit amet consectetur adipisicing elit</span>
            </div>
            <div class=" grid grid-cols-2  md:h-[400px] ">
                <div class=" w-full p-2 md:h-[400px] relative group  ">

                    <img src="{{ asset('images/vendor/img-uno.jpg') }}"
                        class="  group-hover:brightness-75 rounded-md image-reveal h-full w-full " alt="">
                    <span
                        class=" absolute z-10 top-1/2 right-0 left-0 text-center group-hover:opacity-100 duration-200 opacity-0 md:text-lg text-xs md:font-medium text-white">Lorem
                        ipsum dolor, sit amet consectetur adipisicing elit</span>

                </div>
                <div class=" p-2 md:h-[400px] w-full relative group  ">

                    <img src="{{ asset('images/vendor/img-dos.jpg') }}"
                        class=" group-hover:brightness-75  rounded-md image-reveal h-full w-full " alt="">
                    <span
                        class=" absolute z-10 top-1/2 text-center   right-0 left-0 group-hover:opacity-100 duration-200 opacity-0 md:text-lg text-xs  md:font-medium text-white">Lorem
                        ipsum dolor, sit amet consectetur adipisicing elit</span>

                </div>

            </div>
        </div>

    </section>
    <section class=" animation-description   relative mb-28 mt-14">
        <div class="product-category-carrusel  py-4">
            Bracelets
        </div>
        <div class="  mx-auto  cont-viewport-products-customer">


            <span class="icon-back-carrusel-products-customer ">
                <i class='bx bx-chevron-left'></i>
            </span>
            <div class=" cont-carrusel-product">
                @for ($i = 0; $i < 10; $i++)
                    <a class=" relative group   md:min-w-[350px] md:min-h-[350px] h-[300px] min-w-[300px]   card-carrusel-product shadow-md  bg-black  "
                        href=''>

                        <img src="{{ asset('images/Pulsera.png') }}" alt=""
                            class="  hover:scale-[1.004]  img-products-customer group-hover:opacity-95  duration-300 rounded-md h-full w-full">

                        <h1
                            class=" absolute  z-10 bottom-0 text-center p-2  text-2xl font-medium left-0 right-0 group-hover:opacity-100  text-white  product-name-card  ">
                            Pulsera de Jade Azul
                        </h1>


                    </a>
                @endfor


            </div>
            <span class="icon-next-carrusel-products-customer">
                <i class='bx bx-chevron-right'></i>
            </span>

        </div>
        <div class="  flex justify-center py-4 ">
            <a href=""
                class=" text-lg text-white  mx-auto py-1 hover:text-emerald-100 duration-200   underline underline-offset-4   ">Ver
                Más</a>

        </div>


    </section>
    <section class=" animation-description  relative mb-28 mt-14">
        <div class="product-category-carrusel py-4">
            Necklaces
        </div>
        <div class="  mx-auto  cont-viewport-products-customer">


            <span class="icon-back-carrusel-products-customer ">
                <i class='bx bx-chevron-left'></i>
            </span>
            <div class=" cont-carrusel-product">
                @for ($i = 0; $i < 10; $i++)
                    <a class=" relative group  md:min-w-[350px] md:h-[350px]  h-[300px] min-w-[300px]   card-carrusel-product shadow-md  bg-black  "
                        href=''>

                        <img src="{{ asset('images/Collares.png') }}" alt=""
                            class=" hover:scale-[1.004]  img-products-customer group-hover:opacity-95  duration-200  rounded-md   h-full w-full">

                        <h1
                            class=" absolute  z-10 bottom-0 text-center p-2  text-2xl font-medium left-0 right-0 group-hover:opacity-100  text-white  product-name-card  ">
                            Pulsera de Jade Azul
                        </h1>


                    </a>
                @endfor


            </div>
            <span class="icon-next-carrusel-products-customer">
                <i class='bx bx-chevron-right'></i>
            </span>

        </div>
        <div class="  flex justify-center py-4 ">
            <a href=""
                class=" text-lg text-white  mx-auto py-1   underline underline-offset-4 hover:text-emerald-100 duration-200 ">Ver
                Más</a>

        </div>
    </section>
    <section class=" animation-description  mb-28 mt-14">
        <div class="product-category-carrusel py-4">
            Earrings
        </div>
        <div class="  mx-auto  cont-viewport-products-customer">


            <span class="icon-back-carrusel-products-customer ">
                <i class='bx bx-chevron-left'></i>
            </span>
            <div class=" cont-carrusel-product">
                @for ($i = 0; $i < 10; $i++)
                    <a class=" relative group  md:min-w-[350px] md:h-[350px] h-[300px] min-w-[300px]   card-carrusel-product shadow-md  bg-black  "
                        href=''>

                        <img src="{{ asset('images/Aretes.png') }}" alt=""
                            class=" hover:scale-[1.004]   img-products-customer group-hover:opacity-95  duration-300 rounded-md   h-full w-full">

                        <h1
                            class=" absolute  z-10 bottom-0 text-center p-2  text-2xl font-medium left-0 right-0 group-hover:opacity-100  text-white  product-name-card  ">
                            Pulsera de Jade Azul
                        </h1>


                    </a>
                @endfor


            </div>
            <span class="icon-next-carrusel-products-customer">
                <i class='bx bx-chevron-right'></i>
            </span>

        </div>
        <div class="  flex justify-center py-4 ">
            <a href=""
                class=" text-lg text-white  mx-auto py-1  underline underline-offset-4 hover:text-emerald-100 duration-200">Ver
                Más</a>

        </div>
    </section>
    <section class="  my-10 mb-20">
        <div class="md:w-[500px] w-[300px] mx-auto relative coming ">
            <img src="{{ asset('images/vendor/image.png') }}" class="  opacity-75 rounded-md  h-full w-full" alt="">
            <div class=" absolute top-1/3 right-0 left-0 flex flex-col items-center justify-center">

                <span class="  text-white  text-center font-medium text-3xl    p-2 ">Coming soon..</span>
                <span class="  text-white  text-center font-medium text-3xl    p-2 ">Conjuntos.</span>
            </div>
        </div>
    </section>
    <section class=" md:w-[600px] w-[350px] mx-auto my-10 mb-32">
        <h2 class=" mx-auto text-white font-medium text-xl  text-center">¿Cómo cuidar tu Joyería?</h2>
        <div class=" my-4  ">
            <div
                class="toggle flex justify-between  hover:text-emerald-200  text-white border p-2 hover:border-emerald-300 cursor-pointer">
                <div class=" flex items-center gap-2">
               <x-svgs.right></x-svgs.right>                                 
                    <h2>Jade</h2>
                </div>
                <div class=" btn-open-closed">
                    <x-svgs.arrow-down>
                    </x-svgs.arrow-down>
                    
                </div>
            </div>
            <p class="answer text-white opacity-0  invisible h-0">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti sapiente deleniti sint illo architecto
                laudantium amet ab sed quia? Mollitia, ratione. Voluptate, repellat dolorum. Quia libero laudantium earum
                reprehenderit voluptate.
            </p>
        </div>
        <div class=" my-4">

        <div class="toggle flex justify-between hover:text-emerald-200  text-white border p-2 hover:border-emerald-300 cursor-pointer">
            <div class=" flex items-center gap-2">
                <x-svgs.right></x-svgs.right>                                  
                <h2>Plata</h2>
            </div>
            <div class="btn-open-closed">
                <x-svgs.arrow-down>
                </x-svgs.arrow-down>
                  
            </div>
        </div>
        <p class="answer text-white opacity-0 invisible h-0">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti sapiente deleniti sint illo architecto laudantium amet ab sed quia? Mollitia, ratione. Voluptate, repellat dolorum. Quia libero laudantium earum reprehenderit voluptate.
        </p>
    </div>
<div class=" my-4">
        <div class="toggle flex justify-between border  text-white  p-2 hover:text-emerald-200 hover:border-emerald-300 cursor-pointer">
            <div class=" flex items-center gap-2">
               <x-svgs.right></x-svgs.right>                                  
                <h2>Piel</h2>
            </div>
            <div class="btn-open-closed">
                <x-svgs.arrow-down>
                </x-svgs.arrow-down>
                  
            </div>
        </div>
        <p class="answer text-white opacity-0 invisible h-0">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti sapiente deleniti sint illo architecto laudantium amet ab sed quia? Mollitia, ratione. Voluptate, repellat dolorum. Quia libero laudantium earum reprehenderit voluptate.
        </p>
</div>
<div class=" my-4 ">
        <div class="toggle flex justify-between  text-white border p-2 hover:border-emerald-200 hover:text-emerald-300 cursor-pointer">
            <div class=" flex items-center gap-2">
               <x-svgs.right></x-svgs.right>                 
                <h2>Latón</h2>
            </div>
            <div class="btn-open-closed">
             <x-svgs.arrow-down>
             </x-svgs.arrow-down>
            </div>
        </div>
        <p class="answer text-white opacity-0 invisible h-0">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti sapiente deleniti sint illo architecto laudantium amet ab sed quia? Mollitia, ratione. Voluptate, repellat dolorum. Quia libero laudantium earum reprehenderit voluptate.
        </p>
</div>

    </section>

    <script defer>
        document.addEventListener("DOMContentLoaded", function() {
            const backArrows = document.querySelectorAll(
                ".icon-back-carrusel-products-customer"
            );
            const nextArrows = document.querySelectorAll(
                ".icon-next-carrusel-products-customer"
            );
            const carruseles = document.querySelectorAll(
                ".cont-viewport-products-customer"
            );

            let scrollAmount = 0;
            const scrollStep = 500; // Ajusta este valor según el ancho de tus tarjetas

            // Agregar evento click a todos los botones de retroceso
            backArrows.forEach(function(backArrow) {
                backArrow.addEventListener("click", function() {
                    const carrusel = this.closest(".cont-viewport-products-customer");
                    carrusel.scrollTo({
                        top: 0,
                        left: (scrollAmount -= scrollStep),
                        behavior: "smooth",
                    });
                });
            });

            // Agregar evento click a todos los botones de avance
            nextArrows.forEach(function(nextArrow) {
                nextArrow.addEventListener("click", function() {
                    const carrusel = this.closest(".cont-viewport-products-customer");
                    carrusel.scrollTo({
                        top: 0,
                        left: (scrollAmount += scrollStep),
                        behavior: "smooth",
                    });
                });
            });
        });

        const toggles = Array.from(document.querySelectorAll('.toggle'));
        const answers = Array.from(document.querySelectorAll('.answers'));
        toggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                if (toggle.classList.contains('active')) {
                    toggle.classList.remove('active');
                } else {

                    toggles.forEach(t => {
                        t.classList.remove('active');
                    })
                    toggle.classList.add('active');
                }
            })
        })
    </script>
@endsection
