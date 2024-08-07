@extends('layouts.customer')
@section('content')
    <style>
        .carousel-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            overflow: hidden;
        }

        .carousel-container {
            display: flex;
            width: calc(100% - 70px);
            transition: transform 0.5s ease;
        }

        .carousel-item {
            flex: 0 0 25%;
            padding: 0 40px;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            max-width: 100%;
        }

        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #444;
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
            z-index: 10;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .carousel-wrapper:hover .carousel-button {
            opacity: 1;
        }

        #prev {
            left: 10px;
            border-radius: 50px;
        }

        #next {
            right: 10px;
            border-radius: 50px;
        }

        .custom-size {
            width: 100%;
            height: 800px;
        }
        .filter {
            border: 1px solid white;
            width: 200px;
            height: 28px;
            transition: border-color 0.3s ease;
        }

        .filter:hover {
        border-color: #A7F3D0; 
    }

    </style>

    <h1 class="text-left text-white text-5xl ml-36 mb-12 mt-10">Catálogo</h1>

    <button class="text-white flex ml-36 hover:text-emerald-200 cursor-pointer filter">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
        </svg>
        <p class="ml-2 mr-2">Filtrar y ordernar</p>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>
    </button>

    <p class="text-right text-white -mt-6 mr-36"> 4 Catálogos</p>

    <div class="carousel-wrapper mt-16">
        <button id='prev' class='carousel-button'><</button>
                <div class="carousel-container">
                    @for ($i = 0; $i < 5; $i++)
                        <a class=" carousel-item " href=''>
                            <img class="w-100 h-80 mb-2" src={{ asset('images/Pulsera.png') }} alt="Pulseras">
                            <p class="text-white">Pulsera Jade</p>
                            <p class="text-white ml-14">ir a productos</p>
                        </a>
                    @endfor
                </div>
                <button id='next' class="carousel-button">></button>
    </div>

    <div class="carousel-wrapper mt-16">
        <button id='prev' class='carousel-button'><</button>

                <div class="carousel-container">
                    @for ($i = 0; $i < 5; $i++)
                        <a class=" carousel-item " href=''>
                            <img class="w-100 h-80 mb-2" src={{ asset('images/Collares.png') }} alt="Pulseras">
                            <p class="text-white">Collares Jade</p>
                            <p class="text-white ml-14">ir a productos</p>
                        </a>
                    @endfor
                </div>
                <button id='next' class="carousel-button">></button>
    </div>

    <div>
        <img class=" mt-24 py-4 px-4 object-contain brightness-90 custom-size " src="{{ asset('images/Alessandro.png') }}"
            alt="" />
    </div>

    <div class="carousel-wrapper mt-24">
        <button id='prev' class='carousel-button'><</button>

                <div class="carousel-container">
                    @for ($i = 0; $i < 5; $i++)
                        <a class=" carousel-item " href=''>
                            <img class="w-100 h-80 mb-2" src={{ asset('images/Aretes.png') }} alt="Pulseras">
                            <p class="text-white">Aretes Jade</p>
                            <p class="text-white ml-14">ir a productos</p>
                        </a>
                    @endfor

                </div>
                <button id='next' class="carousel-button">></button>
    </div>

    <div class="carousel-wrapper mt-24">
        <button id='prev' class='carousel-button'><</button>

                <div class="carousel-container">
                    @for ($i = 0; $i < 5; $i++)
                        <a class=" carousel-item " href=''>
                            <img class="w-100 h-80 mb-2" src={{ asset('images/Anillos.png') }} alt="Pulseras">
                            <p class="text-white">Anillos Jade</p>
                            <p class="text-white ml-14">ir a productos</p>
                        </a>
                    @endfor
                </div>
                <button id='next' class="carousel-button">></button>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const carousels = document.querySelectorAll('.carousel-wrapper');

            carousels.forEach(carousel => {
                const carouselContainer = carousel.querySelector('.carousel-container');
                const nextButton = carousel.querySelector('#next');
                const prevButton = carousel.querySelector('#prev');
                let currentIndex = 0;
                const itemsPerPage = 4;
                const totalItems = carousel.querySelectorAll('.carousel-item').length;

                const updateButtonVisibility = () => {
                    if (totalItems <= itemsPerPage) {
                        nextButton.style.display = 'none';
                        prevButton.style.display = 'none';
                    }else {
                        nextButton.style.display = 'flex';
                        prevButton.style.display = 'flex';
                    }
                };

                updateButtonVisibility();


                nextButton.addEventListener('click', () => {
                    if (currentIndex < totalItems - itemsPerPage) {
                        currentIndex++;
                        carouselContainer.style.transform =
                            `translateX(-${currentIndex * (100 / itemsPerPage)}%)`;
                    }
                });

                prevButton.addEventListener('click', () => {
                    if (currentIndex > 0) {
                        currentIndex--;
                        carouselContainer.style.transform =
                            `translateX(-${currentIndex * (100 / itemsPerPage)}%)`;
                    }
                });
            });
        });
    </script>
@endsection
