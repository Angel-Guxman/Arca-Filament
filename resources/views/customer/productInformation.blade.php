@extends('layouts.customer')

@section('content')
    <style>
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

        .no-scroll {
            overflow: hidden;
        }


        @media (max-width: 767px) {


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

    <div id="notification-success"
        class="w-full max-w-[200px] fixed hidden   right-4   top-[200px] p-4 z-[12] bg-neutral-900   shadow" role="alert">
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
    <div id="notification-failed"
        class="w-full max-w-[200px] fixed hidden   right-4   top-[200px] p-4 z-[12] bg-neutral-900   shadow" role="alert">
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
    <div id="toast-message-cta"
        class="w-full max-w-xs fixed hidden right-4   p-4 z-[12] text-gray-400 bg-neutral-900  rounded-lg shadow"
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

    <div class="mx-auto mt-10">
        <div class=" flex  md:flex-row   flex-col     gap-3  items-stretch">

            <div class="     basis-7/12 relative p-2 m-[0_auto] overflow-hidden">
                <div class=" flex  aspect-video  overflow-x-scroll scroll-hidden   scroll-smooth  rounded-md snap-mandatory snap-x "
                    id="carousel-container">
                    @forelse ($product->images as $image)
                        <div class="  snap-start carousel-item  flex-grow flex-shrink-0  basis-[100%] "
                            data-description="{{ $image->description }}">
                            <div class="h-full w-full relative group ">
                                <img src="{{ asset($image->image) }}" id="{{ $image->id }}-img"
                                    class=" h-full w-full    object-cover object-center  " alt="{{ $image->description }}">
                                <div
                                    class="absolute text-white  select-none  left-0 right-0   backdrop-brightness-50  bottom-0   opacity-0 group-hover:opacity-100  transition-opacity p-2  md:text-base text-sm  line-clamp-2 backdrop-blur-sm">
                                    {{ $image->description }}
                                </div>
                                <div onclick="zoom({{ $image->id }})"
                                    class=" absolute cursor-pointer  select-none transition-opacity duration-300  backdrop-brightness-50 p-2    right-0 top-0  text-white  opacity-0 group-hover:opacity-100">
                                    <x-svgs.zoom></x-svgs.zoom>

                                </div>
                            </div>

                        </div>

                    @empty
                    @endforelse
                </div>
            </div>




            <div class="  basis-5/12 p-2 text-white ">

                <h1 class="md:text-4xl font-medium    capitalize  text-2xl  line-clamp-2 ">{{ $product->name }}</h1>
                <p class="md:text-xl text-lg   font-light py-3 text-neutral-300">$ {{ number_format($product->price) }} MXN
                </p>

                <div class="flex item-center  space-x-5 mb-6 cell-items">




                    <!-- Componente de detalle del producto -->
                    <div
                        class="flex justify-around  items-stretch  hover:outline-[1.5px] outline outline-1  outline-[#2f3336] hover:outline-white/70   gap-[12px]">
                        <button data-action="minus" data-id="{{ $product->id }}" class="    py-2 px-2">
                            <x-svgs.minus class="size-5"></x-svgs.minus>
                        </button>
                        <span class="text-sm block text-white    my-auto"
                            id="quantity-product-{{ $product->id }}">1</span>
                        <button data-action="plus" data-id="{{ $product->id }}" class="  py-2 px-2">
                            <x-svgs.plus class="size-5"></x-svgs.plus>
                        </button>
                    </div>
                    @php
                        $isFavorite = in_array($product->id, $favorites);
                        $class = $isFavorite
                            ? 'text-emerald-500 drop-shadow-[0_1px_10px_rgba(51,255,0)]'
                            : 'text-white drop-shadow-[0_1px_10px_rgba(255,255,255)]';
                    @endphp
                    @auth

                        <div class="  my-auto  cursor-pointer" onclick="addFavorite({{ $product->id }})">

                            <x-svgs.favorite-heart id="favorite-{{ $product->id }}" :$class>

                            </x-svgs.favorite-heart>
                        </div>
                    @endauth
                    @guest
                        <div class="  my-auto  cursor-pointer" onclick="alertToast('favorite')">

                            <x-svgs.favorite-heart id="favorite-{{ $product->id }}" :$class>

                            </x-svgs.favorite-heart>
                        </div>
                    @endguest



                </div>


                <div class=" flex sm:flex-row  mb-6   flex-col gap-4">


                    @auth
                        <button type="button" id="add-cart-{{ $product->id }}" data-product-id="{{ $product->id }}"
                            class=" button-primary py-2 px-4 lg:text-base text-sm disabled:cursor-not-allowed ">
                            Agregar al Carrito
                        </button>

                    @endauth

                    @guest
                        <button type="button" onclick="alertToast('cart')"
                            class="button-primary py-2 px-4  lg:text-base text-sm  ">
                            Agregar al Carrito
                        </button>
                    @endguest



                    <form action="{{ route('create-order') }}" data-form-product-id="{{ $product->id }}"
                        data-form-product-slug="{{ $product->slug }}" id="form-sale" method="GET">
                        <input type="hidden" id="input-product-slug" name="product_slug" value="">
                        <input type="hidden" id="input-product-quantity" name="quantity" value="">
                        <button type="submit" id="button-sale"
                            class="  disabled:cursor-not-allowed relative min-w-full   lg:text-base text-sm button-secondary">
                            Comprar
                        </button>

                    </form>
                </div>



                <hr class=" ">

                <p class="text-lg  pt-1" id="product-description"></p>
                {{--      <button class="bg-black text-white px-4 py-2 border"
                    onclick="notification.error('Producto agregado correctamente')">si</button>
                <button class="bg-black text-white px-4 py-2 border"
                    onclick="notification.success('Producto agregado correctamente')">si</button> --}}
            </div>

            <div id="zoomModal" class="zoom-modal">
                <span class="zoom-close ">&times;</span>
                <div class="zoom-modal-content">
                    <img id="zoomedImage" src="" alt="zoomed Image">
                </div>
            </div>

        </div>
    </div>

    <script defer>
        let processShopping = false;
        let process = false;
        let typeProcess = '';
        let timeoutId;
        let timeOutCart;
        const stock = @json($product->stock);
        const dom = {
            $: sel => document.querySelector(sel),
            $$: sel => document.querySelectorAll(sel)
        };
        const formSale = dom.$('#form-sale');
        formSale.addEventListener('submit', (e) => {
            e.preventDefault()
            const productId = formSale.dataset.formProductId;
            const prSlug = formSale.dataset.formProductSlug;
            if (!productId || !prSlug) {
                toast.error('no se envio el id o el slug');
                return
            }
            sale(productId, prSlug);
            formSale.submit();
        })

        function changeQuantity(id, type) {
            const element = dom.$(`#${id}`);
            const currentQuantity = parseInt(element.innerText, 10);
            if (type == 'plus' && currentQuantity + 1 <= stock) {
                element.innerText = currentQuantity + 1;
            } else if (type == 'minus' && currentQuantity - 1 >= 1) {
                element.innerText = currentQuantity - 1
            }
        }
        const validateForm = () => {
            if (!idProduct || !productSlug) {
                toast.error('no se envio el id o el slug');
                return
            }

            if (processShopping) {
                return
            }
        }

        function sale(idProduct, productSlug) {
            if (!idProduct || !productSlug) {
                toast.error('no se envio el id o el slug');
                return
            }

            if (processShopping) {
                return
            }
            processShopping = true;
            const button = document.getElementById('button-sale')
            button.disabled = true;
            const quantityProduct = document.getElementById(`quantity-product-${idProduct}`)
            const value = parseInt(quantityProduct.textContent, 10)
            if (isNaN(value) || value < 1) {
                toast.error('cantidad invalida');
                processShopping = false
                button.disabled = false;
                return
            }
            const productSlugForm = document.getElementById('input-product-slug');
            const quantity = document.getElementById('input-product-quantity');
            if (!productSlugForm || !quantity) {
                toast.error('cantidad o producto no encontrado');
                processShopping = false
                button.disabled = false;
                return
            }
            productSlugForm.value = productSlug;
            quantity.value = value
            processShopping = false
            button.disabled = false;
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
        async function addToCart(idProduct) {
            if (process) {
                return
            }
            const buttonAddCart = document.getElementById(`add-cart-${idProduct}`)
            if (buttonAddCart) {
                buttonAddCart.disabled = true;
            }
            const element = document.getElementById(`quantity-product-${idProduct}`);
            console.log(element);

            const currentQuantity = parseInt(element.innerText, 10);
            if (!idProduct || !element || !currentQuantity || currentQuantity < 1 || currentQuantity > stock || isNaN(
                    currentQuantity)) {
                buttonAddCart.disabled = false;
                return
            }
            process = true
            try {
                const response = await axios.post(`/cart/add-quantity/${idProduct}/${currentQuantity}`)

                if (response.data.success) {
                    if (timeOutCart) {
                        clearTimeout(timeOutCart)
                    }
                    cartCount()
                    const notification = document.getElementById('notification-success')
                    const product = response.data.product
                    const content = document.getElementById('notification-content')
                    content.textContent =
                        `${response.data.message}`
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
            } finally {

                setTimeout(() => {
                    if (buttonAddCart) {
                        buttonAddCart.disabled = false;
                    }
                    process = false;
                }, 2000)

            }


        }
        //function for change Favorite product
        //let processFavorite = false;
        async function addFavorite(idProduct) {
            if (process || !idProduct) {
                return
            }
            process = true;
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
                    process = false;
                }, 2000)
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

        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll("[data-product-id]").forEach(button => {
                button.addEventListener("click", () => {
                    const productId = button.dataset.productId;
                    addToCart(productId);
                });
            });
            document.querySelectorAll("[data-action]").forEach(button => {
                button.addEventListener("click", () => {
                    const action = button.dataset.action;
                    const productId = button.dataset.id;
                    changeQuantity(`quantity-product-${productId}`, action);
                });
            });
        });
    </script>
@endsection
