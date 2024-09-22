<div>
    <style>
        .grid-cont {
            display: grid;
            grid-template-columns: 1fr;
        }

        @media (min-width: 1024px) {
            .grid-cont {
                grid-template-columns: 3fr 1fr;
            }
        }
    </style>
    <h1 class=" text-4xl text-white p-4 md:ml-14 ml-0 md:text-start text-center mt-4    ">Carrito de compras</h1>

    @if (count($cartItems) > 0)
        <section class=" grid-cont  lg:grid-cols-2  ">
            <div>
                <div class=" border-b border-t  grid grid-cols-3 gap-1 p-2 ">
                    <div class="">
                        <span class=" text-white text-center w-full block py-3 ">Producto</span>
                        <div class=" mx-auto h-[100px] w-[100px] md:h-[150px] md:w-[150px]  object-contain">
                            <img class=" h-full w-full " src="{{ asset('images/Anillos.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="   flex    items-center justify-center">
                        <div class="  flex flex-col gap-3     truncate    ">

                            <span class=" block  text-center max-w-[240px] w-auto  truncate   text-white  ">
                                Pulsera de Jade dojdo sjfefp asj dajp adisaodv dapmdp dvdccdo
                            </span>


                            <span class=" block text-white w-full text-center  ">
                                $350.30
                            </span>
                            <div class="  flex justify-center items-center gap-2  w-fit mx-auto ">
                                <div class=" flex   justify-around  items-center border mx-auto gap-[10px] ">
                                    <a href="" class=" group  h-full py-2 px-1 ">
                                        <x-svgs.minus></x-svgs.minus>
                                    </a>
                                    <span class=" text-sm block text-white">
                                        1000
                                    </span>
                                    <a href="" class=" group h-full py-2 px-1">
                                        <x-svgs.plus></x-svgs.plus>
                                    </a>
                                </div>
                                <div class="  p-1 ">
                                    <a href="" class=" block group   p-1  rounded-full hover:bg-gray-500/30    ">
                                        <x-svgs.trash></x-svgs.trash>
                                    </a>
                                </div>
                            </div>



                        </div>
                    </div>
                    <footer class="    flex flex-wrap justify-center items-center">
                        <section class=" flex flex-col gap-2 text-center">
                            <span class=" block text-white">Subtotal</span>
                            <span class=" block text-white">$7478.20</span>
                        </section>
                    </footer>
                </div>
                <div class=" border-b border-t  grid grid-cols-3 gap-1 p-2 ">
                    <div class="">
                        <span class=" text-white text-center w-full block py-3 ">Producto</span>
                        <div class=" mx-auto h-[100px] w-[100px] md:h-[150px] md:w-[150px]  object-contain">
                            <img class=" h-full w-full " src="{{ asset('images/Anillos.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="   flex    items-center justify-center">
                        <div class="  flex flex-col gap-3     truncate    ">

                            <span class=" block  text-center max-w-[240px] w-auto  truncate   text-white  ">
                                Pulsera de Jade dojdo sjfefp asj dajp adisaodv dapmdp dvdccdo
                            </span>


                            <span class=" block text-white w-full text-center  ">
                                $350.30
                            </span>
                            <div class="  flex justify-center items-center gap-2  w-fit mx-auto ">
                                <div class=" flex   justify-around  items-center border mx-auto gap-[10px] ">
                                    <a href="" class=" group  h-full py-2 px-1 ">
                                        <x-svgs.minus></x-svgs.minus>
                                    </a>
                                    <span class=" text-sm block text-white">
                                        1000
                                    </span>
                                    <a href="" class=" group h-full py-2 px-1">
                                        <x-svgs.plus></x-svgs.plus>
                                    </a>
                                </div>
                                <div class="  p-1 ">
                                    <a href="" class=" block group   p-1  rounded-full hover:bg-gray-500/30    ">
                                        <x-svgs.trash></x-svgs.trash>
                                    </a>
                                </div>
                            </div>



                        </div>
                    </div>
                    <footer class="    flex flex-wrap justify-center items-center">
                        <section class=" flex flex-col gap-2 text-center">
                            <span class=" block text-white">Subtotal</span>
                            <span class=" block text-white">$7478.20</span>
                        </section>
                    </footer>
                </div>





            </div>


            <div class=" flex justify-center    p-4 ">
                <div class=" flex flex-col  mt-10 border p-10 w-fit h-fit  gap-4">
                    <h2 class=" text-white">Detalles del Pedido</h2>
                    <div class=" flex  text-white gap-2  justify-center items-center">
                        <h3>Total</h3> <span>$900</span>
                    </div>
                    <div class=" flex justify-center ">
                        <a class=" py-[6px] px-2 bg-white text-black border  hover:scale-105 duration-200  "
                            href="">
                            Pagar Pedido
                        </a>
                    </div>

                </div>
            </div>


        </section>
    @else
        <section class=" text-white font-medium text-lg md:text-start text-center  md:ml-14 p-2 ml-0">
            Empieza Añadiendo Productos a tu carrito
            <div class="  mt-4  flex md:justify-start justify-center ">
                <a class=" p-2  border text-white block w-fit text-sm hover:border-emerald-200 hover:text-emerald-200 duration-150 hover:scale-[.99] "
                    href="{{ route('catalogue') }}">ir a
                    productos</a>
            </div>
        </section>
    @endif


</div>
