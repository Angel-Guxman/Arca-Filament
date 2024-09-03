@extends('layouts.customer')

@section('content')
    <style>
        .carousel-container {
            position: relative;
            max-width: 90%;
            margin: 0 auto;
            padding: 10px;
            overflow-x: auto;
            display: flex;
            scroll-snap-type: x mandatory;
            scrolllbar-width: none;
            -ms-overflow-style: none;
            gap: 40px;
        }

        .carousel-container::-webkit-scrollbar {
            display: none;
        }

        .carousel-item {
            flex: none;
            width: calc(100% - 10px);
            scroll-snap-align: center;
            box-sizing: border-box;
            position: relative;
            display: inline-block;
        }

        .carousel-item img {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .image-title {
            position: absolute;
            bottom: 90px;
            left: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            display: none;
        }

        .carousel-item:hover .image-title {
            display: block;
        }

        .zoom-icon {
            display: none;
            position: absolute;
            top: 30px;
            right: 30px;
            cursor: pointer;
            z-index: 20;
        }

        .carousel-item:hover .zoom-icon {
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

        .heart-icon {
            transition: fill 0.3s ease, stroke 0.3s ease;
            display: block;
            margin: 5px auto 0 auto;
        }

        .heart-icon.active {
            fill: #077E51;
            stroke: #077E51;
        }

        .my-custom-line {
            border: none;
            border-top: 1px solid #ccc;
            margin: 40px 0;
        }

        .cell-items {
            margin-left: 0;
        }

        @media (max-width: 1024px) {
            .flex-col {
                flex-direction: column;
            }

            .w-full.md\:w-1\/2 {
                width: 100%;
                text-align: center;
                margin: 0;
            }

            .carousel-container {
                gap: 20px;
            }

            .carousel-item {
                width: 100%;
            }

            .carousel-item img {
                width: 100%;
            }

            .zoom-icon {
                top: 15px;
                right: 15px;
            }

            .heart-icon {
                margin: 5px auto 0 auto;
            }

            .container.mx-auto.mt-10 {
                margin-top: 0;
                padding-bottom: 20px;
            }

            .cell-items {
                justify-content: center;
            }

            .items-button {
                justify-content: center;
            }

        }

        @media (max-width: 767px) {
            .carousel-container {
                max-width: 100%;
                gap: 20px;
            }

            .carousel-item {
                width: 100%;
            }

            .zoom-icon {
                top: 15px;
                right: 15px;
            }

            .heart-icon {
                margin-top: 20px;
                width: 13%;
                height: 15%;
                padding-right: 30px;
            }

            button {
                margin-left: 10px;
            }

        }
    </style>

    <div class="mx-auto mt-28">
        <div class=" flex flex-col md:flex-row items-center">
            <div class="w-full md:w-1/2 relative group">
                <div class="carousel-container" id="carousel-container">
                    <div class="carousel-item" data-description="Esta pulsera de jade es valiosa">
                        <img src="images/Pulsera.png" alt="Pulsera Jade">
                        <div class="image-title">Pulsera</div>
                        <div class="zoom-icon">
                            <img src="https://img.icons8.com/ios-filled/50/000000/search.png" alt="Zoom Icon">
                        </div>
                    </div>

                    <div class="carousel-item" data-description="Este Collar de jade es valiosa">
                        <img src="images/Collares.png" alt="Pulsera Jade">
                        <div class="image-title">Collar</div>
                        <div class="zoom-icon">
                            <img src="https://img.icons8.com/ios-filled/50/000000/search.png" alt="Zoom Icon">
                        </div>
                    </div>

                    <div class="carousel-item" data-description="Esta Aretes de jade es valiosa">
                        <img src="images/Aretes.png" alt="Pulsera Jade">
                        <div class="image-title">Aretes</div>
                        <div class="zoom-icon">
                            <img src="https://img.icons8.com/ios-filled/50/000000/search.png" alt="Zoom Icon">
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 md:ml-10 mt-10 md:mt-0 text-white">
                <h1 class="text-5xl mb-4">Pulsera de Jade</h1>
                <p class="text-xl mb-6">$650.00 MXN</p>

                <div class="flex item-center mb-6 cell-items">
                    <div class=" flex   justify-around  items-center border  gap-[10px] ">
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
                </div>

                <div class="flex space-x-4 mb-6 items-button">
                    <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Agregar
                        Producto</button>
                    <button class="bg-white text-black px-4 py-2 rounded-lg hover:bg-gray-300">Regresar a Productos</button>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 heart-icon text-white cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>

                </div>


                <p class="text-lg" id="product-description"></p>

                <hr class=" my-custom-line">

                <p class="text-lg">
                    Esta pulsera de jade es un símbolo de buena suerte y protección, elaborada artesanalmente con piedra de
                    alta calidad.
                </p>

            </div>

            <div id="zoomModal" class="zoom-modal">
                <span class="zoom-close">&times;</span>
                <div class="zoom-modal-content">
                    <img id="zoomedImage" src="" alt="zoomed Image">
                </div>
            </div>

        </div>
    </div>

    <script>
        document.querySelectorAll('.carousel-item').forEach(container => {

            const zoomIcon = container.querySelector('.zoom-icon');
            const img = container.querySelector('img');
            const zoomModal = document.getElementById('zoomModal');
            const zoomedImage = document.getElementById('zoomedImage');
            const zoomClose = document.querySelector('.zoom-close');
            const descriptionElement = document.getElementById('product-description');

            zoomIcon.addEventListener('click', () => {
                zoomedImage.src = img.src;
                zoomModal.style.display = "block";
                document.body.classList.add('no-scroll');
            });

            zoomClose.addEventListener('click', () => {
                zoomModal.style.display = "none";
                document.body.classList.remove('no-scroll');
            });

            zoomModal.addEventListener('click', (e) => {
                if (e.target === zoomModal) {
                    zoomModal.style.display = "none";
                    document.body.classList.remove('no-scroll');
                }
            });
        });

        const carouselContainer = document.getElementById('carousel-container');
        const descriptionElement = document.getElementById('product-description');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const description = entry.target.getAttribute('data-description');
                    descriptionElement.textContent = description;
                }
            });
        }, {
            threshold: 0.5
        });

        document.querySelectorAll('.carousel-item').forEach(item => {
            observer.observe(item);
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
