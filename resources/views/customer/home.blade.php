@extends('layouts.customer')
@section('contenido')
<section>
    <div class=" mx-10  py-12  h-[650px] grid grid-cols-1 sm:grid-cols-2 ">
        <section class=" md:grid hidden text-white  grid-cols-1 items-center justify-items-center ">
            <div class=" flex flex-col gap-4 ">

                <h1 class=" text-9xl ">Arca</h1>
                <h3 class=" text-3xl">Accesorios de Jade</h3>
                <a href="" class="text-xl border mx-auto p-2 hover:bg-white hover:text-black duration-200 hover:scale-105">Comprar</a>
            </div>
        </section>
        <img class=" py-10 md:border  object-contain brightness-90  h-full w-full   " src="{{asset('rename.png')}}" alt="">
     
    </div>
</section>
    
@endsection