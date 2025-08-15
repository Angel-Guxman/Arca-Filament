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
            flex-wrap: wrap;
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

        .carousel-item.shift-right {
            margin-left: 280px;
            /* Ajusta este valor según el tamaño que necesites */
            transition: margin-left 0.5s ease;
        }

        .carousel-item {
            flex: 0 0 25%;
            padding: 0 40px;
            scroll-snap-align: start;
            box-sizing: border-box;
            margin-bottom: 40px;
        }

        .product-image {
            width: 100%;

            height: 200px;

            object-fit: cover;

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

        #filter-modal {
            opacity: 0;
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        #filter-modal.show {
            animation: modal-fade-in 0.5s forwards;
        }

        #filter-modal.hide {
            animation: modal-fade-out 0.5s forwards;
        }

        .carousel-wrapper.shift-right {
            transform: translateX(280px);
            transition: transform 0.5s ease;
        }

        .hamburger-menu {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 10px;
            margin-right: 0px;
            margin-top: 10px;
            color: white;
        }

        .hamburger-menu svg {
            fill: white;
            width: 30px;
            height: 30px;
            cursor: pointer;
        }

        .dashboard-menu {
            display: none;
            position: absolute;
            right: 0px;
            background: #2d2d2d;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            padding: 10px;
            width: 200px;
            top: 122px;
        }

        .dashboard-menu.show {
            display: block;
        }

        .dashboard-menu a {
            display: block;
            padding: 10px;
            color: white;
            text-decoration: none;
            border-bottom: 1px solid #3d3d3d;
            transition: background 0.3s ease;
        }

        .dashboard-menu a:hover {
            background: #1d1d1d;
        }

        .dashboard-menu a:last-child {
            border-bottom: none;
        }

        .no-scroll {
            overflow: hidden;
        }

        .heart-icon {
            cursor: pointer;
            transition: color 0.3s;
        }

        .heart-icon.favorited {
            color: #077E51;

        }

        .notification {
            position: fixed;
            top: 6rem;
            right: 2rem;
            z-index: 1000;
        }

        @media (max-width: 1024px) {
            .carousel-item {
                flex: 0 0 50%;
                padding: 0 50px;
            }

            .carousel-container {
                width: 100%;
            }

            .dashboard-menu {
                top: 121px;
                right: 0px;
            }

            .hamburger-menu {
                margin-left: 10px;
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

            .dashboard-menu {
                top: 105px;
                right: 0px;
            }

            .hamburger-menu {
                margin-left: 10px;
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

    <div class="hamburger-menu" id="hamburger-menu">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 7.5h16.5m-16.5 7.5h16.5" />
        </svg>
    </div>

    <div class="dashboard-menu" id="dashboard-menu">
        @foreach ($categories as $category)
            <a href="{{ route('customer.show', $category->id) }}">{{ $category->name }}</a>
        @endforeach
    </div>



    <h1 class="text-left text-white text-5xl ml-36 mb-12 mt-10 container-Catalog">Aretes</h1>

    <div class="relative inline-block mb-24">
        <button class="text-white flex  hover:text-emerald-200 cursor-pointer filter" id="filter-button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
            </svg>
            <p class="ml-2 mr-2">Filtrar y ordenar</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </button>

        <div id="filter-modal" class="absolute hidden bg-black rounded-lg shadow-lg mt-2 p-4"
            style="width: 209px; z-index: 1000; top: 18px; left: 29%;">
            <form id="price-filter-form">
                <label for="min-price" class="block mb-2 text-sm text-white">Precio Mínimo:</label>
                <input type="number" id="min-price" name="min-price" step="1" min="0" required
                    class="w-full p-1 border rounded mb-2 text-sm">
                <label for="max-price" class="block mb-2 text-sm text-white">Precio Máximo:</label>
                <input type="number" id="max-price" name="max-price" step="1" min="0" required
                    class="w-full p-1 border rounded mb-4 text-sm">
                <button type="submit" class="bg-emerald-500 text-white px-4 py-2 rounded text-sm w-full">Filtrar</button>
            </form>
        </div>
    </div>

    <p class="text-right text-white -mt-6 mr-24 container-Products"> {{ count($products) }} Productos</p>

    <div class="carousel-wrapper">
        @foreach ($products as $product)
            <div class="carousel-item">
                <div class="zoom-container">
                    <a href="{{ route('productInformation', ['id' => $product->id]) }}">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    </a>
                    <div class="zoom-icon">
                        <img src="https://img.icons8.com/ios-filled/50/000000/search.png" alt="Zoom Icon">
                    </div>
                </div>
                <div class="product-info flex items-center justify-between">
                    <p class="text-white">{{ $product->name }}</p>
                    <svg data-product-id="{{ $product->id }}" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="size-6 heart-icon text-white cursor-pointer {{ in_array($product->id, session('favorites', [])) ? 'favorited' : '' }}"
                        onclick="toggleFavorite(event)">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
                </div>
                <p class="text-white mt-2">$ {{ $product->price }} MXN</p>
                <div class="container-add">
                    <form action="{{ route('cart.add', ['productId' => $product->id]) }}" method="POST">
                        @csrf
                        <button type="button" onclick="addToCart({{ $product->id }})"
                            class="text-black border py-2 px-3 duration-200 hover:scale-[.99]">
                            Agregar al Carrito
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    @if (session('status'))
        <div
            class="p-4 notification text-emerald-300 border border-emerald-100 bg-black top-2 rounded right-2 z-10 absolute">
            {{ session('status') }}
        </div>
    @endif

    <div id="zoomModal" class="zoom-modal">
        <span class="zoom-close">&times;</span>
        <div class="zoom-modal-content">
            <img id="zoomedImage" src="" alt="Zoomed Image">
        </div>
    </div>

    <script>
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
                        // Crea la notificación
                        const notification = document.createElement('div');
                        notification.classList.add('p-4', 'notification', 'text-emerald-300', 'border',
                            'border-emerald-100', 'bg-black', 'rounded', 'fixed', 'top-2', 'right-2', 'z-10');
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
                'border-emerald-100', 'bg-black', 'rounded', 'fixed', 'top-2', 'right-2', 'z-10');
            notification.textContent = message;

            // Agrega la notificación al cuerpo del documento
            document.body.appendChild(notification);

            // Remueve la notificación después de 3 segundos
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }


        document.getElementById('hamburger-menu').addEventListener('click', function() {
            if (event.target.tagName === 'svg' || event.target.closest('svg')) {
                const dashboardMenu = document.getElementById('dashboard-menu');
                dashboardMenu.classList.toggle('show');
            }
        });

        document.addEventListener('click', function(event) {
            const dashboardMenu = document.getElementById('dashboard-menu');
            const hamburgerMenu = document.getElementById('hamburger-menu');

            if (!hamburgerMenu.contains(event.target) && !dashboardMenu.contains(event.target)) {
                dashboardMenu.classList.remove('show');
            }
        });

        document.getElementById('filter-button').addEventListener('click', function() {
            const modal = document.getElementById('filter-modal');
            const carouselWrapper = document.querySelector('.carousel-wrapper');

            if (modal.classList.contains('show')) {
                modal.classList.remove('show');
                modal.classList.add('hide');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 500);
            } else {
                modal.classList.remove('hidden');
                modal.classList.remove('hide');
                modal.classList.add('show');
            }
        });

        document.getElementById('price-filter-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const minPrice = parseFloat(document.getElementById('min-price').value);
            const maxPrice = parseFloat(document.getElementById('max-price').value);

            let found = false;

            document.querySelectorAll('.carousel-item').forEach(item => {
                const priceText = item.querySelector('p.text-white.mt-2').innerText;
                const price = parseFloat(priceText.replace('$', '').replace('MXN', '').trim());

                if (price >= minPrice && price <= maxPrice) {
                    found = true;
                    item.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    item.classList.add('highlight');
                    setTimeout(() => item.classList.remove('highlight'), 3000);
                    return false;
                }
            });

            if (!found) {
                alert('No se encontraron productos en el rango de precios especificado.');
            }

            const modal = document.getElementById('filter-modal');
            const carouselWrapper = document.querySelector('.carousel-wrapper');

            modal.classList.remove('show');
            modal.classList.add('hide');
            setTimeout(() => {
                modal.classList.add('hidden');
                // Restaurar la posición del carrusel
                carouselWrapper.classList.remove('shift-right');
            }, 500);

            // Limpiar los campos de entrada
            document.getElementById('min-price').value = '';
            document.getElementById('max-price').value = '';
        });

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
    </script>
@endsection
