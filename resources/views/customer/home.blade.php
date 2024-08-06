@extends('layouts.customer')
@section('content')
    <style>
        /*  .custom-size {
                width: 90%;
                height: 80%;
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
            width: 100%;
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
            left: 2%;
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
            right: 2%;
            top: 50%;
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
            padding: 10px 0 10px 0;
            margin-top: 4px;
            margin-bottom: 5px;
            min-width: 500px;
            height: 500px;
            background: black;
        }


        .img-products-customer {
            height: 100%;
            width: 100%;
            mask-image: linear-gradient(black 80%, transparent);
        }

        /* nombre del producto */
        .product-name-card {

            white-space: nowrap;
            width: 100%;
            text-overflow: ellipsis;
            overflow: hidden;
            font-weight: 500;
            color: white;
            background: black;
            font-size: 18px;
        }

        /* descripcion del producto */
        .product-description-card {
            width: 100%;
            font-weight: 300;
            color: white;
            background: black;
            height: 100px;
            overflow-y: scroll;
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

        /* precio del producto */
        .product-price-card {
            font-weight: 400;
            color: white;
            background: black;
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
                        class=" button-purchase  text-xl border    md:border-[#2f3336] mx-auto p-2 hover:bg-white hover:text-black duration-200 md:hover:scale-105 relative">

                        Comprar</a>
                </div>
            </section>
            <div class=" max-h-[400px]      ">
                <img class="  md:hover:brightness-105 brightness-75 opacity-95 md:opacity-100  md:brightness-100 md:border-[#2f3336]  md:border md:p-10  max-h-full w-auto mx-auto object-contain   "
                    src="{{ asset('images/image.png') }}" alt="" />
            </div>
        </div>
    </section>
    <section class=" grid grid-cols-1 md:grid-cols-2 gap-3  p-4 mb-5  mt-14">
        <div
            class=" text-white underline-offset-2 underline animation-description  flex flex-col text-center items-center  justify-center gap-2 mb-3 ">
            <h1 class=" text-2xl">Arca</h1>
            <h1 class=" text-2xl">
                Es una marca de joyeria fina 100% mexicana
            </h1>
            <h1 class="  text-2xl">
                caracterizada en el uso de la piedra preciosa jade</h1>
        </div>
        <div class=" max-h-[400px]  max-w-[400px] mx-auto ">
            <img class=" image-reveal h-full w-full object-contain" src="{{ asset('images/alessandro-2.png') }}"
                alt="">
        </div>

    </section>
    <section class="  relative mb-8 mt-14">
        <div class="product-category-carrusel">
            Bracelets
        </div>
        <div class=" md:px-[15px] px-2  cont-viewport-products-customer">


            <span class="icon-back-carrusel-products-customer ">
                <i class='bx bx-chevron-left'></i>
            </span>
            <div class=" cont-carrusel-product">
                @for ($i = 0; $i < 10; $i++)
                    <a class=" relative group card-carrusel-product shadow-md  bg-black  " href=''>

                        <img src="{{ asset('images/Pulsera.png') }}" alt=""
                            class="   img-products-customer group-hover:opacity-70 duration-200 object-contain">

                        <h1
                            class=" absolute opacity-0 z-10 top-1/4 text-center  text-2xl font-medium left-0 right-0 group-hover:opacity-100  text-white   ">
                            Pulsera de Jade Azul
                        </h1>
                        <p
                            class=" z-10 absolute opacity-0 top-2/4   group-hover:opacity-100 text-center text-white    p-[2px] text-pretty ">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, cum aliquam facilis officia
                            dicta error, quia voluptatibus iste aperiam laudantium tempora impedit adipisci esse beatae
                            repudiandae reiciendis commodi minima dolorem!
                        </p>


                    </a>
                @endfor


            </div>
            <span class="icon-next-carrusel-products-customer">
                <i class='bx bx-chevron-right'></i>
            </span>

        </div>
    </section>
    <section class="  relative mb-8 mt-14">
        <div class="product-category-carrusel">
            Necklaces
        </div>
        <div class="md:px-[15px] px-2  cont-viewport-products-customer">


            <span class="icon-back-carrusel-products-customer ">
                <i class='bx bx-chevron-left'></i>
            </span>
            <div class=" cont-carrusel-product">
                @for ($i = 0; $i < 10; $i++)
                    <a class=" relative group card-carrusel-product shadow-md  bg-black  " href=''>

                        <img src="{{ asset('images/Collares.png') }}" alt=""
                            class="   img-products-customer group-hover:opacity-70 duration-200 object-contain">

                        <h1
                            class=" absolute opacity-0 z-10 top-1/4 text-center  text-2xl font-medium left-0 right-0 group-hover:opacity-100  text-white   ">
                            Pulsera de Jade Rosa
                        </h1>
                        <p
                            class=" z-10 absolute opacity-0 top-2/4 text-xl font-medium   group-hover:opacity-100 text-center text-white    p-[2px] text-pretty ">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, cum aliquam facilis officia
                            dicta error, quia voluptatibus iste aperiam laudantium tempora impedit adipisci esse beatae
                            repudiandae reiciendis commodi minima dolorem!
                        </p>


                    </a>
                @endfor


            </div>
            <span class="icon-next-carrusel-products-customer">
                <i class='bx bx-chevron-right'></i>
            </span>

        </div>
    </section>

    <section class="  relative mb-8 mt-14">
        <div class="product-category-carrusel">
            Earrings
        </div>
        <div class="md:px-[15px] px-2  cont-viewport-products-customer">


            <span class="icon-back-carrusel-products-customer ">
                <i class='bx bx-chevron-left'></i>
            </span>
            <div class=" cont-carrusel-product">
                @for ($i = 0; $i < 10; $i++)
                    <a class=" relative group card-carrusel-product shadow-md  bg-black  " href=''>

                        <img src="{{ asset('images/Aretes.png') }}" alt=""
                            class="   img-products-customer group-hover:opacity-70 duration-200 object-contain">

                        <h1
                            class=" absolute opacity-0 z-10 top-1/4 text-center  text-2xl font-medium left-0 right-0 group-hover:opacity-100  text-white   ">
                            Pulsera de Jade Rosa
                        </h1>
                        <p
                            class=" z-10 absolute opacity-0 top-2/4 text-xl font-medium   group-hover:opacity-100 text-center text-white    p-[2px] text-pretty ">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, cum aliquam facilis officia
                            dicta error, quia voluptatibus iste aperiam laudantium tempora impedit adipisci esse beatae
                            repudiandae reiciendis commodi minima dolorem!
                        </p>


                    </a>
                @endfor


            </div>
            <span class="icon-next-carrusel-products-customer">
                <i class='bx bx-chevron-right'></i>
            </span>

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
    </script>
@endsection
