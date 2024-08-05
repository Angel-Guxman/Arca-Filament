@extends('layouts.customer')
@section('content')

<style>
    .carousel-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        width: 100%;
    }
    .carousel-container {
        display: flex;
        width: calc(100% - 80px);
        transition: transform 0.5s ease;
    }
    .carousel-item {
        flex: 0 0 25%;
        box-sizing: border-box;
        padding: 0 10px;
    }
    .carousel-item img {
        width: 100%;
        height: auto;
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
    }
    #prev {
        left: 10px;
    }
    #next {
        right: 10px;
    }
    .custom-size{
        width: 100%;
        height: 800px;
    }
</style>
    <main class="bg-black p-8">
        <h1 class="text-left text-white text-5xl ml-36 mb-12 mt-10">Catálogo</h1>

        <div class="text-white flex ml-36">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
            </svg>
            <p class="ml-2 mr-2">Filtrar y ordernar</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </div>

        <p class="text-right text-white -mt-6 mr-36"> 4 Catálogos</p>

        <div class="carousel-wrapper mt-16">
            <button id='prev' class='carousel-button'><</button>
            
            <div class="carousel-container">

                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Pulsera.png') }} alt="Pulseras">
                    <p class="text-white">Pulsera Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>
    
                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Pulsera.png') }} alt="Pulseras">
                    <p class="text-white">Pulsera Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>
    
                <div class="carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Pulsera.png') }} alt="Pulseras">
                    <p class="text-white">Pulsera Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

                <div class="carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Pulsera.png') }} alt="Pulseras">
                    <p class="text-white">Pulsera Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

                <div class="carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Pulsera.png') }} alt="Pulseras">
                    <p class="text-white">Pulsera Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>
            </div>
            <button id='next' class="carousel-button">></button>
        </div>

        <div class="carousel-wrapper mt-16">
            <button id='prev' class='carousel-button'><</button>
            
            <div class="carousel-container">

                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Collares.png') }} alt="Pulseras">
                    <p class="text-white">Collares Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Collares.png') }} alt="Pulseras">
                    <p class="text-white">Collares Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Collares.png') }} alt="Pulseras">
                    <p class="text-white">Collares Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Collares.png') }} alt="Pulseras">
                    <p class="text-white">Collares Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Collares.png') }} alt="Pulseras">
                    <p class="text-white">Collares Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>
            </div>
            <button id='next' class="carousel-button">></button>
        </div>

        <div>
            <img class=" mt-24 py-4 px-4 object-contain brightness-90 custom-size "
                src="{{ asset('images/Alessandro.png') }}" alt="" />
        </div>

        <div class="carousel-wrapper mt-24">
            <button id='prev' class='carousel-button'><</button>
            
            <div class="carousel-container">

                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Aretes.png') }} alt="Pulseras">
                    <p class="text-white">Aretes Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Aretes.png') }} alt="Pulseras">
                    <p class="text-white">Aretes Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Aretes.png') }} alt="Pulseras">
                    <p class="text-white">Aretes Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Aretes.png') }} alt="Pulseras">
                    <p class="text-white">Aretes Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>
                
                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Aretes.png') }} alt="Pulseras">
                    <p class="text-white">Aretes Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

                
                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Aretes.png') }} alt="Pulseras">
                    <p class="text-white">Aretes Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

            </div>
            <button id='next' class="carousel-button">></button>
        </div>

        <div class="carousel-wrapper mt-24">
            <button id='prev' class='carousel-button'><</button>
            
            <div class="carousel-container">

                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Anillos.png') }} alt="Pulseras">
                    <p class="text-white">Anillos Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Anillos.png') }} alt="Pulseras">
                    <p class="text-white">Anillos Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

                
                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Anillos.png') }} alt="Pulseras">
                    <p class="text-white">Anillos Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

                
                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Anillos.png') }} alt="Pulseras">
                    <p class="text-white">Anillos Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

                
                <div class=" carousel-item ">
                    <img class="w-100 h-80 mb-2" src={{asset ('images/Anillos.png') }} alt="Pulseras">
                    <p class="text-white">Anillos Jade</p>
                    <p class="text-white ml-14">ir a productos</p>
                </div>

            </div>
            <button id='next' class="carousel-button">></button>
        </div>

        <script>
            const carouselContainer = document.querySelector('.carousel-container');
            const nextButton = document.getElementById('next');
            const prevButton = document.getElementById('prev');
            let currentIndex = 0;
            const itemsPerPage = 4;
            const totalItems = document.querySelectorAll('.carousel-item').length;

            if(totalItems <= itemsPerPage) {
                nextButton.style.display = 'none';
                prevButton.style.display = 'none';
            }

            nextButton.addEventListener('click', () => {
                if(currentIndex < totalItems - itemsPerPage) {
                    currentIndex++;
                    carouselContainer.style.transform = `translateX(-${currentIndex * (100/ itemsPerPage)}%)`;
                }
            });

            prevButton.addEventListener('click', () => {
                if(currentIndex > 0 ) {
                    currentIndex--;
                    carouselContainer.style.transform = `translateX(-${currentIndex * (100/ itemsPerPage)}%)`;
                }
            });
        </script>

    </main>
@endsection
