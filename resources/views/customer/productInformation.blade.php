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

        .back-items {
            margin-left: 40%;
            margin-top: -12%;
            position: absolute;
        }

        .heart-icon {
            transition: fill 0.3s ease, stroke 0.3s ease;
        }

        .heart-icon.active {
            fill: #077E51;
            stroke: #077E51;
        }

        .heart-icon {
            cursor: pointer;
            transition: color 0.3s;
        }

        .heart-icon.favorited {
            color: #077E51;

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

            .back-items {
                margin-left: 80%;
                margin-top: -90%;
                position: absolute;
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

            .back-items {
                margin-left: 70%;
                margin-top: -110%;
                position: absolute;
            }

        }
    </style>

    <div class="mx-auto mt-28">
        <div class=" flex flex-col md:flex-row items-center">

        <div class="w-full md:w-1/2 relative group">
            <div class="carousel-container" id="carousel-container">
                <!-- Primer elemento del carrusel -->
                <div class="carousel-item" data-description="{{$product->description}}">
                    <div class="zoom-container">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <div class="zoom-icon">
                            <img src="https://img.icons8.com/ios-filled/50/000000/search.png" alt="Zoom Icon">
                        </div>
                    </div>
                    <div class="image-title">{{ $product->name }}</div>
                </div>
        
                <!-- Segundo elemento del carrusel -->
                <div class="carousel-item" data-description="{{$product->description}}">
                    <div class="zoom-container">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <div class="zoom-icon">
                            <img src="https://img.icons8.com/ios-filled/50/000000/search.png" alt="Zoom Icon">
                        </div>
                    </div>
                    <div class="image-title">{{ $product->name }}</div>
                </div>
        
                <!-- Tercer elemento del carrusel -->
                <div class="carousel-item" data-description="{{$product->description}}">
                    <div class="zoom-container">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <div class="zoom-icon">
                            <img src="https://img.icons8.com/ios-filled/50/000000/search.png" alt="Zoom Icon">
                        </div>
                    </div>
                    <div class="image-title">{{ $product->name }}</div>
                </div>
            </div>
        </div>
        



            <div class="w-full md:w-1/2 md:ml-10 mt-10 md:mt-0 text-white">
                <div class="back-items">
                    <a href="{{ route('catalogue') }}"
                        class="   flex justify-center gap-1 items-center group hover:text-emerald-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-[16px]  text-white group-hover:text-emerald-100">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                        </svg>
                        <span class="  block text-white  group-hover:text-emerald-100 text-xl">regresar</span>
                    </a>
                </div>

                <h1 class="text-5xl mb-4">{{ $product->name }}</h1>
                <p class="text-xl mb-6">$ {{ $product->price }} MXN</p>

                <div class="flex item-center mb-6 cell-items">


                    <div class=" flex   justify-around  items-center border  gap-[10px] ">

                        <!-- Componente de detalle del producto -->
                        <div class="flex justify-around items-center border gap-[10px]">
                            <a href="javascript:void(0);" class="decrease-quantity group h-full py-2 px-1"
                                data-id="{{ $product->id }}">
                                <x-svgs.minus></x-svgs.minus>
                            </a>
                            <span class="text-sm block text-white" id="quantity-{{ $product->id }}">1</span>
                            <a href="javascript:void(0);" class="increase-quantity group h-full py-2 px-1"
                                data-id="{{ $product->id }}" data-stock="{{ $product->stock }}">
                                <x-svgs.plus></x-svgs.plus>
                            </a>
                        </div>


                    </div>
                </div>

                <div class="flex space-x-4 mb-6 items-button">
                    <form action="{{ route('cart.add', ['productId' => $product->id]) }}" method="POST">
                        @csrf
                        <button type="button" onclick="addToCart({{ $product->id }})"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                            Agregar al Carrito
                        </button>
                    </form>

                    <button class="bg-white text-black px-4 py-2 rounded-lg hover:bg-gray-300"
                        onclick="window.location.href='{{ route('cart') }}'">Comprar</button>

                    <svg data-product-id="{{ $product->id }}" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="size-6 heart-icon text-white cursor-pointer {{ in_array($product->id, session('favorites', [])) ? 'favorited' : '' }}"
                        onclick="toggleFavorite(event)">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
                </div>

                <hr class=" my-custom-line">

                <p class="text-lg " id="product-description"></p>
            </div>

            <div id="zoomModal" class="zoom-modal">
                <span class="zoom-close ">&times;</span>
                <div class="zoom-modal-content">
                    <img id="zoomedImage" src="" alt="zoomed Image">
                </div>
            </div>

        </div>
    </div>

    <script>
        document.querySelectorAll('.increase-quantity').forEach(button => {
            button.addEventListener('click', () => {
                const itemId = button.getAttribute('data-id');
                let quantityElement = document.querySelector(`#quantity-${itemId}`);
                let quantity = parseInt(quantityElement.innerText);
                const productStock = parseInt(button.getAttribute('data-stock'));

                if (quantity < productStock) {
                    quantity++;
                    quantityElement.innerText = quantity; // Actualiza la cantidad localmente
                    updateQuantity(itemId, quantity); // Enviar al servidor para actualizar
                }
            });
        });

        document.querySelectorAll('.decrease-quantity').forEach(button => {
            button.addEventListener('click', () => {
                const itemId = button.getAttribute('data-id');
                let quantityElement = document.querySelector(`#quantity-${itemId}`);
                let quantity = parseInt(quantityElement.innerText);

                if (quantity > 1) {
                    quantity--;
                    quantityElement.innerText = quantity; // Actualiza la cantidad localmente
                    updateQuantity(itemId, quantity); // Enviar al servidor para actualizar
                }
            });
        });

        function updateQuantity(itemId, quantity) {
            // Aquí podrías hacer una llamada a la API para actualizar la cantidad en la base de datos
            fetch(`/product/update-quantity/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        quantity: quantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log("Cantidad actualizada exitosamente");
                    } else {
                        alert(data.message); // Muestra un mensaje de error si algo sale mal
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }







        // Función para actualizar el subtotal del producto en la interfaz
        function updateSubtotal(itemId, quantity) {
            // Obtener el precio unitario del producto
            const priceElement = document.querySelector(`.cart-item-${itemId} .product-price`);
            const price = parseFloat(priceElement.innerText.replace('$', '').replace(',', '')); // Eliminar $ y coma

            const subtotal = price * quantity;

            // Actualizar el subtotal del producto
            const subtotalElement = document.querySelector(`.cart-item-${itemId} .subtotal`);
            subtotalElement.innerText = `$${subtotal.toFixed(2)}`; // Mostrar con dos decimales

            // Actualizar el total del carrito
            updateCartTotal();
        }

        // Función para actualizar el total del carrito
        function updateCartTotal() {
            let total = 0;

            document.querySelectorAll('.cart-item').forEach(item => {
                const subtotalText = item.querySelector('.subtotal').innerText;
                const subtotal = parseFloat(subtotalText.replace('$', '').replace(',', ''));
                total += subtotal;
            });

            // Mostrar el total actualizado
            const totalElement = document.querySelector('.cart-total');
            totalElement.innerText = `$${total.toFixed(2)}`;
        }

        function toggleFavorite(event) {
            const productId = event.target.getAttribute('data-product-id');
            const icon = event.target;

            fetch('/favorites/toggle', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        product_id: productId
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (data.action === 'added') {
                            icon.classList.add('favorited');
                            showNotification(data.message || 'Producto agregado a favoritos.');
                        } else {
                            icon.classList.remove('favorited');
                            showNotification(data.message || 'Producto eliminado de favoritos.');
                        }
                    } else {
                        console.error(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function showNotification(message) {
            const notification = document.createElement('div');
            notification.classList.add('p-4', 'notification', 'text-emerald-300', 'border',
                'border-emerald-100', 'bg-black', 'rounded', 'fixed', 'top-36', 'right-2', 'z-10');
            notification.textContent = message;

            // Agrega la notificación al cuerpo del documento
            document.body.appendChild(notification);

            // Remueve la notificación después de 3 segundos
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        function addToCart(productId) {
            fetch("{{ route('cart.add', ['productId' => '__PRODUCT_ID__']) }}".replace('__PRODUCT_ID__', productId), {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        productId: productId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Crea la notificación
                        const notification = document.createElement('div');
                        notification.classList.add('p-4', 'notification', 'text-emerald-300', 'border',
                            'border-emerald-100', 'bg-black', 'rounded', 'fixed', 'top-36', 'right-2', 'z-10');
                        notification.textContent = data.message; // Usa el mensaje del backend

                        // Agrega la notificación al cuerpo del documento
                        document.body.appendChild(notification);

                        // Remueve la notificación después de 3 segundos
                        setTimeout(() => {
                            notification.remove();
                        }, 3000);

                    } else {
                        alert(data.message || "Hubo un problema al agregar el producto.");
                    }
                })
                .catch(error => console.error('Error:', error));
        }

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
    </script>
@endsection
