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
            transition: transform 0.5s ease;
            margin-bottom: 80px;
        }

        .carousel-container {
            display: flex;
            width: calc(100% - 70px);
            transition: transform 0.5s ease;
            overflow-x: auto;
            overflow-y: hidden;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
        }

        .carousel-item {
            flex: 0 0 25%;
            padding: 0 40px;
            scroll-snap-align: start;
            box-sizing: border-box;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            max-width: 100%;
        }

        .filter {
            border: 1px solid white;
            width: 200px;
            height: 28px;
            transition: border-color 0.3s ease;
            margin: 0 150px;
            box-sizing: border-box;
        }

        .filter:hover {
            border-color: #A7F3D0;
        }

        .container-add {
            background: white;
            width: 100%;
            height: 100%;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            margin-top: 6%;
        }

        .zoom-container {
            position: relative;
            display: inline-block;
            overflow: visible;
        }

        .zoom-icon {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            z-index: 20;
        }

        .zoom-container:hover .zoom-icon {
            display: block;
        }

        .zoom-icon img {
            width: 25px;
            height: 25px;
            filter: invert(100%);
        }

        .zoom-modal {
            display: none;
            position: fixed;
            z-index: 1050;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .zoom-modal-content {
            position: relative;
            margin: auto;
            padding: 20px;
            max-width: 90%;
            max-height: 90%;
        }

        .zoom-modal-content img {
            width: 100%;
            height: auto;
        }

        .zoom-close {
            position: absolute;
            top: 10px;
            right: 20px;
            color: white;
            font-size: 35px;
            font-weight: bold;
            cursor: pointer;
        }

        .product-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .heart-icon {
            transition: fill 0.3s ease, stroke 0.3s ease;
        }

        .heart-icon.active {
            fill: #077E51;
            stroke: #077E51;
        }

        @keyFrames modal-fade-in {
            from {
                opacity: 0;
                transform: translatey(-20px);
            }

            to {
                opacity: 1;
                transform: translatey(0);
            }
        }

        @keyframes modal-fade-out {
            from {
                opacity: 1;
                transform: translatey(0);
            }

            to {
                opacity: 0;
                transform: translatey(-20px);
            }
        }

        .carousel-wrapper.shift-right {
            transform: translateX(280px);
            transition: transform 0.5s ease;
        }

        .no-scroll {
            overflow: hidden;
        }

        @media (max-width: 1024px) {
            .carousel-item {
                flex: 0 0 50%;
                padding: 0 50px;
            }

            .carousel-container {
                width: 100%;
            }


            .container-Catalog {
                margin-top: 90px;
                margin-left: 90px;
            }

            .filter {
                width: calc(100% - 20px);
                margin: 0 -50px;
                margin-left: 70px;
            }

            .container-Products {
                margin-top: -30px;
                margin-right: 55px;
            }

            .zoom-modal-content {
                max-width: 90%;
                max-height: 80%;
                margin-top: 20%
            }

            .zoom-close {
                font-size: 30px;
                top: 15%;
                right: 10px;
            }
        }

        @media (max-width: 767px) {
            .carousel-item {
                flex: 0 0 50%;
                padding: 0 10px;
            }

            .carousel-container {
                width: 100%;
            }


            .container-Catalog {
                margin-top: 90px;
                margin-left: 90px;
            }

            .filter {
                width: calc(100% - 20px);
                margin: 0 -50px;
                margin-left: 70px;
            }

            .container-Products {
                margin-top: -30px;
                margin-right: 12px;
            }

            .zoom-modal-content {
                max-width: 90%;
                max-height: 80%;
                margin-top: 50%;
            }

            .zoom-close {
                font-size: 30px;
                top: 20%;
                right: 10px;
            }
        }
    </style>

    <h1 class="text-left text-white text-5xl ml-36 mb-12 mt-10 container-Catalog">Favoritos</h1>

    @php
        $order = request('order', 'asc');

        $products = [
            ['name' => 'Pulsera Jade', 'price' => '$ 456.00 MXN', 'image' => 'images/Pulsera.png'],
            ['name' => 'Collares Jade', 'price' => '$ 544.00 MXN', 'image' => 'images/Collares.png'],
            ['name' => 'Aretes Jade', 'price' => '$ 874.00 MXN', 'image' => 'images/Aretes.png'],
            ['name' => 'Anillos Jade', 'price' => '$ 354.00 MXN', 'image' => 'images/Anillos.png'],
            ['name' => 'benito Jade', 'price' => '$ 354.00 MXN', 'image' => 'images/Aretes.png'],
        ];

        usort($products, function ($a, $b) use ($order) {
            $nameA = strtolower($a['name']);
            $nameB = strtolower($b['name']);
            return $order === 'asc' ? strcmp($nameA, $nameB) : strcmp($nameA, $nameB);
        });

        $repetitions = 4;
        $totalProducts = count($products) * $repetitions;
    @endphp

    <p class="text-right text-white -mt-6 mr-24 container-Products"> {{ $totalProducts }} Productos</p>

    @foreach ($products as $index => $product)
        <div class="carousel-wrapper mt-24">
            <div class="carousel-container">
                @for ($i = 0; $i < $repetitions; $i++)
                    <div class="carousel-item">
                        <a href="{{ route('productInformation', ['id' => $index]) }}" class="zoom-container">
                            <img class="w-100 h-80 mb-2" src='{{ asset($product['image']) }}' alt="{{ $product['name'] }}">
                            <div class="zoom-icon">
                                <img src="https://img.icons8.com/ios-filled/50/000000/search.png" alt="Zoom Icon">
                            </div>
                        </a>
                        <div class="product-info flex items-center justify-between">
                            <p class=" text-white">{{ $product['name'] }}</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 heart-icon text-white cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </div>
                        <p class=" text-white mt-2"> {{ $product['price'] }}</p>
                        <div class="container-add">
                            <a href="{{ route ('cart')}}">
                                <p class="text-black">Agregar Producto</p>
                            </a>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    @endforeach

    <div id="zoomModal" class="zoom-modal">
        <span class="zoom-close">&times;</span>
        <div class="zoom-modal-content">
            <img id="zoomedImage" src="" alt="Zoomed Image">
        </div>
    </div>

    <script>
        document.querySelectorAll('.zoom-container').forEach(container => {

            const zoomIcon = container.querySelector('.zoom-icon');
            const img = container.querySelector('img');
            const zoomModal = document.getElementById('zoomModal');
            const zoomedImage = document.getElementById('zoomedImage');
            const zoomClose = document.querySelector('.zoom-close');

            zoomIcon.addEventListener('click', () => {
                zoomedImage.src = img.src;
                zoomModal.style.display = "block";
                document.body.classList.add('no-scroll');
            });

            zoomClose.addEventListener('click', () => {
                zoomModal.style.display = "none";
                document.body.classList.remove(
                    'no-scroll');
            });

            zoomModal.addEventListener('click', (e) => {
                if (e.target === zoomModal) {
                    zoomModal.style.display = "none";
                    document.body.classList.remove(
                        'no-scroll');
                }
            });
        });


        window.onload = function() {
            document.querySelectorAll('.heart-icon').forEach(icon => {
                icon.addEventListener('click', function() {
                    this.classList.toggle('active');
                });
            });
        };
    </script>
@endsection
