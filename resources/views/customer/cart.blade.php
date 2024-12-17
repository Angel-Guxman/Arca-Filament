@extends('layouts.customer')
@section('content')
    @auth
        @livewire('customer.cart', ['cart' => $cart, 'cartItems' => $cartItems])
    @endauth
    @guest
        <section>
            <h2 class="  text-center font-medium text-2xl p-2 text-white">Para ver su Carrito Inicie Sesión</h2>
            <div class=" mx-auto w-fit p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class=" size-6" viewBox="0 0 16 16">
                    <path fill="white" fill-rule="evenodd"
                        d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M6.854 8.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293z" />
                </svg>
            </div>
            <div class=" flex  items-center gap-4 flex-col m-5 mt-0">
                <small class=" text-white"><i>
                        "Un pequeño detalle lo cambia todo"
                    </i> </small>

                <a href="  {{ route('login') }} "
                    class=" text-white border py-2 px-3 w-fit duration-200 hover:scale-[.99]  inline-block  hover:border-emerald-200 hover:text-emerald-100">
                    Iniciar Sesión
                </a>
            </div>

        </section>
    @endguest
    @endsection
