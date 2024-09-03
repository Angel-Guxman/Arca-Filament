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

        @media (max-width: 1024px) {
            .historia-del-jade .section h2 {
                font-size: 30px;
            }

            .historia-del-jade .section p {
                font-size: 15px;
                margin-left: 50px;
                margin-right: 50px;
            }

            .historia-del-jade .section img {
                width: 350px;
            }
        }

        @media (max-width: 767px) {

            .historia-del-jade .section h2 {
                font-size: 26px;
            }

            .historia-del-jade .section p {
                font-size: 14px;
                margin-left: 20px;
                margin-right: 20px;
            }

            .historia-del-jade .section img {
                width: 300px;
            }
        }
    </style>

    <div class="historia-del-jade">
        <div class="section" data-aos="">
            <h2 class="mt-10">Historia del Jade</h2>
            <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el
                texto estándar de la industria desde el año 1500. Lorem Ipsum es simplemente el texto de relleno de las
                imprentas y archivos de texto. Lorem Ipsum ha sido el texto estándar de la industria desde el año 1500.
                Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el
                texto estándar de la industria desde el año 1500. Lorem Ipsum es simplemente el texto de relleno de las
                imprentas y archivos de texto. Lorem Ipsum ha sido el texto estándar de la industria desde el año 1500.</p>
            <img src='{{ asset('images/vendor/img-tres.jpg') }}' alt="Jade">
        </div>
        <div class="section" data-aos="">
            <h2>Artesanía y Tradición</h2>
            <p>1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó.</p>
            <img src='{{ asset('images/vendor/img-tres.jpg') }}' alt="Jade">
        </div>
        <div class="section" data-aos="">
            <h2>Significado Cultural y Simbólico</h2>
            <p>1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó.</p>
            <img src='{{ asset('images/vendor/img-tres.jpg') }}' alt="Jade">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection
