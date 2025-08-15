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



            .zoom-icon {
                display: none;
                position: absolute;
                top: 10px;
                right: 10px;
                cursor: pointer;
                z-index: 20;

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


        <div class=" flex justify-between mx-4    md:mx-10 mt-2  items-center ">

            <h1 class=" text-white text-3xl p-3 lg:text-5xl   ">Catálogo</h1>

            <div id="notification-failed"
                class="w-full max-w-[200px] fixed hidden   right-4   top-[200px] p-4 z-[12] bg-neutral-900   shadow"
                role="alert">
                <div class="flex items-center gap-1  ">
                    <div class="   rounded-full  ">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>


                    </div>
                    <span id="notification-content-failed" class=" flex-1 text-xs font-semibold text-gray-300 "> </span>
                </div>


            </div>
            <div id="notification-success"
                class="w-full max-w-[200px] fixed hidden   right-4   top-[200px] p-4 z-[12] bg-neutral-900   shadow"
                role="alert">
                <div class="flex items-center gap-1  ">
                    <div class="   rounded-full  ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5    text-green-500   ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>

                    </div>
                    <span class=" flex-1 text-xs font-semibold text-gray-300 ">Agregado Correctamente</span>
                </div>

                <div class=" text-sm font-normal flex flex-col gap-2 mt-2  pl-3">
                    <span id="notification-content" class=" line-clamp-1 text-xs font-semibold text-white">
                    </span>
                    <div class="  aspect-video   ">
                        <img id="notification-img" src="" alt=""
                            class="   h-full w-full object-cover object-center">
                    </div>

                </div>


            </div>
            <div id="toast-message-cta"
                class="w-full max-w-xs fixed hidden right-4  mt-20 p-4 z-[12] text-gray-400 bg-neutral-900  rounded-lg shadow"
                role="alert">
                <div class="flex">

                    <div class="ms-3 text-sm font-normal">
                        <span id="title-toast-notification" class="mb-1 text-sm font-semibold text-white"></span>
                        <div id="content-toast-notification" class="mb-2 text-sm font-normal">
                        </div>
                        <a href="{{ route('login') }}"
                            class="inline-flex px-2.5 py-1.5 text-xs font-medium text-center text-white bg-emerald-500 rounded-lg hover:bg-emerald-600 focus:ring-4 focus:outline-none focus:ring-emerald-800">Iniciar
                            Sesión</a>
                    </div>
                    <button type="button" onclick="closeAlert()"
                        class="ms-auto -mx-1.5 -my-1.5 bg-neutral-800 justify-center items-center flex-shrink-0 text-gray-500 hover:text-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-neutral-700 inline-flex h-8 w-8"
                        data-dismiss-target="#toast-message-cta" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class=" relative">
                <div class="   cursor-pointer bg-gray-950 hover:bg-gray-900 border-[.3px] border-gray-700    rounded-full p-2  "
                    id="hamburger-menu" onclick="filterForCategory()">
                    <x-svgs.hamburger-button class=" text-indigo-100 size-8"></x-svgs.hamburger-button>
                </div>
                <div class=" bg-gray-950 absolute right-[17px] mt-2    max-h-[250px] overflow-y-scroll  scroll-hidden  z-[11]  w-[200px]  hidden"
                    id="menu-category">
                    @foreach ($categories as $category)
                        @if (request('category') && request('category') === $category->name)
                            <a class="block p-2 text-white no-underline  border-b border-gray-700  duration-300 last:border-b-0  hover:bg-gray-900"
                                href="{{ route('catalogue') }}?category={{ $category->name }} ">{{ $category->name }}</a>
                        @else
                            <a class="block p-2 text-indigo-100 no-underline border-b border-gray-700  duration-300 last:border-b-0 hover:bg-gray-900"
                                href="{{ route('catalogue') }}?category={{ $category->name }} ">{{ $category->name }}</a>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
        <div class=" flex justify-between items-center mr-4 md:mr-10">


            <div class="relativ ml-4 md:ml-10 my-6  ">
                <button
                    class="text-indigo-100 flex gap-1 items-center outline outline-[.3px] bg-gray-950 hover:outline-[1px] outline-gray-700 p-1   cursor-pointer "
                    onclick="filterForPrice()">
                    <x-svgs.settings>

                    </x-svgs.settings>
                    <p class=" text-sm ">Filtrar por precio</p>
                    <x-svgs.arrow-down>
                    </x-svgs.arrow-down>
                </button>

                <div
                    class="absolute hidden z-10 container-filter-price w-[200px] border-gray-700   bg-gray-950 border-[.3px] shadow-lg mt-2 p-4">
                    <form method="GET" class="">
                        <label for="min-price" class="block mb-2 text-sm text-white">Precio mínimo:</label>
                        <input type="number" id="min-price" value="{{ request('min-price') }}" name="min-price"
                            step="1" min="0" required
                            class="w-full outline-none p-1 bg-gray-200    mb-2 text-sm">
                        <label for="max-price" class="block mb-2 text-sm text-white">Precio máximo:</label>
                        <input type="number" id="max-price" value="{{ request('max-price') }}" name="max-price"
                            step="1" min="0" required
                            class="w-full outline-none bg-gray-200  p-1   mb-4 text-sm">
                        <button type="submit"
                            class="       tracking-wider bg-emerald-800/10  hover:bg-emerald-800/20 text-emerald-500/80 border-[.3px] border-emerald-800   mt-2 font-semibold  py-2  text-sm w-full">Filtrar</button>
                    </form>
                </div>
            </div>

            <p
                class=" text-indigo-100 text-sm  font-semibold  bg-gray-950 tracking-widest px-3 cursor-default select-none border-[0.3px] border-gray-700 py-2  ">
                {{ $products->total() }} productos
            </p>
        </div>

        <div
            class=" grid  mt-2   grid-cols-1 sm:grid-cols-2   lg:grid-cols-3 xl:gap-2 xl:grid-cols-4 gap-5    justify-items-center  ">
            @foreach ($products as $product)
                @php
                    $isFavorite = in_array($product->id, $favorites);
                    $class = $isFavorite
                        ? 'text-emerald-500 drop-shadow-[0_1px_10px_rgba(51,255,0)]'
                        : 'text-white drop-shadow-[0_1px_10px_rgba(255,255,255)]';
                @endphp

                <x-customer.product-card :$product :$class>
                </x-customer.product-card>
            @endforeach
        </div>
        <div class="  flex justify-center items-center my-5 ">
            {{ $products->links() }}
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

        <script defer>
            let process = false;
            let typeProcess = ''
            let timeoutId;
            let timeOutCart;
            async function cartCount() {
                const cartCount = document.getElementById('cart-count')
                if (!cartCount) {
                    console.log('sin un contador');
                    return
                }
                try {
                    const response = await axios.get('/cart-count')
                    if (response.data.success) {
                        let count = response.data.count;
                        if (count >= 100) {
                            cartCount.innerHTML = `  <small >+99</small>`;
                        } else {
                            cartCount.textContent = `  <small >${count}</small>`;
                        }
                        cartCount.classList.remove('hidden')
                    }
                } catch (error) {
                    console.log('ocurrio un error en el contador');

                    console.log(error);
                }

            }

            //function for add to cart
            async function addToCart(id) {
                if (!id || process) {
                    return
                }


                const buttonAddCart = document.getElementById(`add-cart-${id}`)
                if (buttonAddCart) {
                    buttonAddCart.classList.add('cursor-not-allowed')
                }

                process = true
                try {
                    const response = await axios.post(`/cart/add/${id}`)
                    if (response.data.success) {

                        if (timeOutCart) {
                            clearTimeout(timeOutCart)
                        }
                        cartCount()
                        const notificationFailed = document.getElementById('notification-failed')

                        if (notificationFailed && !notificationFailed.classList.contains('hidden')) {
                            notificationFailed.classList.add('hidden')
                        }
                        const notification = document.getElementById('notification-success')
                        const product = response.data.product
                        const content = document.getElementById('notification-content')
                        content.textContent =
                            `${product.name}`
                        const img = document.getElementById('notification-img')
                        img.src = `{{ asset('${product.images[0].image}') }}`
                        notification.classList.remove('hidden')
                        timeOutCart = setTimeout(() => {
                            notification.classList.add('hidden')
                        }, 2500)
                    } else {
                        if (timeOutCart) {
                            clearTimeout(timeOutCart)
                        }
                        const notificationSuccess = document.getElementById('notification-success')

                        if (notificationSuccess && !notificationSuccess.classList.contains('hidden')) {
                            notificationSuccess.classList.add('hidden')
                        }
                        const notification = document.getElementById('notification-failed')
                        const content = document.getElementById('notification-content-failed')
                        if (response.data.message) {
                            content.textContent =
                                `${response.data.message}`
                        } else {
                            content.textContent = 'No se pudo Agregar el Producto'
                        }
                        notification.classList.remove('hidden')
                        timeOutCart = setTimeout(() => {
                            notification.classList.add('hidden')
                        }, 2500)


                    }
                } catch (error) {
                    console.log('hubo un error al agregar el producto al carrito');
                    console.log(error);
                    if (timeOutCart) {
                        clearTimeout(timeOutCart)
                    }
                    const notification = document.getElementById('notification-failed')
                    const content = document.getElementById('notification-content-failed')
                    content.textContent = 'Hubo un error al agregar el producto'
                    notification.classList.remove('hidden')
                    timeOutCart = setTimeout(() => {
                        notification.classList.add('hidden')
                    }, 2500)
                } finally {
                    if (buttonAddCart) {
                        buttonAddCart.classList.remove('cursor-not-allowed')
                    }
                    process = false

                }


            }
            //function for alert toast

            function closeAlert() {
                /*  process = false; */
                const alert = document.getElementById('toast-message-cta');
                alert.classList.add('hidden')
            }

            function alertToast(type) {
                if (type === typeProcess) {
                    return
                } else if (type === 'cart') {
                    typeProcess = 'cart'
                    const alert = document.getElementById('toast-message-cta');
                    if (timeoutId) { //
                        clearTimeout(timeoutId);
                    }

                    const title = document.getElementById('title-toast-notification')
                    title.textContent = '¡Inicia sesión primero!'
                    const content = document.getElementById('content-toast-notification')
                    content.textContent = 'Por favor, inicia sesión para agregar este producto al carrito.'
                    alert.classList.remove('hidden');
                    timeoutId = setTimeout(() => {
                        alert.classList.add('hidden');
                        typeProcess = ''
                    }, 5000);

                } else if (type === "favorite") {
                    typeProcess = 'favorite'
                    const alert = document.getElementById('toast-message-cta');
                    if (timeoutId) { //si hay notificacion
                        clearTimeout(timeoutId);
                    }
                    const title = document.getElementById('title-toast-notification')
                    title.textContent = '¡Inicia sesión primero!'
                    const content = document.getElementById('content-toast-notification')
                    content.textContent = 'Por favor, inicia sesión para agregar este producto a tus favoritos.'
                    alert.classList.remove('hidden');
                    timeoutId = setTimeout(() => {
                        alert.classList.add('hidden');
                        typeProcess = ''
                    }, 5000);


                }
            }
            //function for add to favorite
            async function addFavorite(idProduct) {
                if (process || !idProduct) {
                    return
                }
                process = true;
                const btnCart = document.getElementById(`add-cart-${idProduct}`);
                if (btnCart) {
                    btnCart.disabled = true;
                }
                const heart = document.getElementById(`favorite-${idProduct}`);
                const heartSelect = heart.classList.contains('text-emerald-500');

                const datos = {
                    idProduct
                }
                try {
                    const response = await axios.post('/favorites/toggle', datos);
                    if (response.data.success) {
                        if (response.data.message === "Favorite removed") {
                            heart.classList.replace('text-emerald-500', 'text-white');
                            heart.classList.replace('drop-shadow-[0_1px_10px_rgba(51,255,0)]',
                                'drop-shadow-[0_1px_10px_rgba(255,255,255)]');
                        } else if (response.data.message === "Favorite added") {
                            heart.classList.replace('text-white', 'text-emerald-500');
                            heart.classList.replace('drop-shadow-[0_1px_10px_rgba(255,255,255)]',
                                'drop-shadow-[0_1px_10px_rgba(51,255,0)]');
                        }
                    }

                } catch (error) {
                    console.log("hubo un error");
                    console.log(error);

                } finally {
                    setTimeout(() => {
                        if (btnCart) {
                            btnCart.disabled = false;
                        }
                        process = false;
                    }, 2500);
                }






            }
            //filter for category
            function filterForCategory() {
                const menuCategory = document.querySelector('#menu-category');
                if (menuCategory.classList.contains("hidden")) {
                    menuCategory.classList.remove("hidden");
                    setTimeout(() => {
                        document.body.addEventListener('click', closeContainerCategory);
                    }, 0);
                } else {
                    menuCategory.classList.add("hidden");
                    document.body.removeEventListener('click', closeContainerCategory);
                }

            }

            function closeContainerCategory(e) {
                const menuCategory = document.querySelector('#menu-category');
                if (!menuCategory.contains(e.target)) {
                    menuCategory.classList.add('hidden');
                    document.body.removeEventListener('click', closeContainerCategory);
                }
            }
            //filter for price
            function filterForPrice() {
                const container = document.querySelector('.container-filter-price')
                if (container.classList.contains("hidden")) {

                    container.classList.remove('hidden')
                    setTimeout(() => {
                        document.body.addEventListener('click', closeContainer);
                    }, 0);
                } else {
                    container.classList.add('hidden')
                    document.body.removeEventListener('click', closeContainer);
                }
            }

            //function for close filter price container
            function closeContainer(e) {
                const container = document.querySelector('.container-filter-price')
                if (!container.contains(e.target)) {
                    container.classList.add("hidden")
                    document.body.removeEventListener("click", closeContainer)
                }
            }


            //funcion for zoom
            function zoom(idProducto) {
                console.log(idProducto);
                const imagenconId = `${idProducto}-img`
                const img = document.getElementById(`${imagenconId}`);
                const zoomModal = document.getElementById('zoomModal');
                const zoomedImage = document.getElementById('zoomedImage');
                const zoomClose = document.querySelector('.zoom-close');
                zoomedImage.src = img.src;
                zoomModal.style.display = "block";
                document.body.classList.add('no-scroll');
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


            }
        </script>
    @endsection
