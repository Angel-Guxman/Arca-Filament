@extends('layouts.customer')
@section('content')

<head>
    <!-- AOS Library -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<style>
    .historia-del-jade {
    color: #ffffff;
}

.historia-del-jade .section {
    margin-bottom: 40px;
}

.historia-del-jade .section h2 {
    font-size: 34px;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.historia-del-jade .section p {
    font-size: 16px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 100px;
    margin-right: 100px;
}

.historia-del-jade .section img {
    display: block;
    margin: 0 auto;
    width: 400px; 
    height: auto;
}
</style>

<div class="historia-del-jade">
    <div class="section" data-aos="">
        <h2 class="mt-10">Historia del Jade</h2>
        <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto estándar de la industria desde el año 1500. Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto estándar de la industria desde el año 1500. Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto estándar de la industria desde el año 1500. Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto estándar de la industria desde el año 1500.</p>
        <img src='{{ asset('images/vendor/img-tres.jpg')}}' alt="Jade">
    </div>
    <div class="section" data-aos="">
        <h2>Artesanía y Tradición</h2>
        <p>1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó.</p>
        <img src='{{ asset('images/vendor/img-tres.jpg')}}' alt="Jade">
    </div>
    <div class="section" data-aos="">
        <h2>Significado Cultural y Simbólico</h2>
        <p>1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó.</p>
        <img src='{{ asset('images/vendor/img-tres.jpg')}}' alt="Jade">
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

@endsection


{{-- fade
fade-up
fade-down
fade-left
fade-right
fade-up-right
fade-up-left
fade-down-right
fade-down-left
flip-up
flip-down
flip-left
flip-right
slide-up
slide-down
slide-left
slide-right
zoom-in
zoom-in-up
zoom-in-down
zoom-in-left
zoom-in-right
zoom-out
zoom-out-up
zoom-out-down
zoom-out-left
zoom-out-right --}}