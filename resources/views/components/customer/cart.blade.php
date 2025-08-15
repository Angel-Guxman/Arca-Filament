<div>
    @if (count($cartItems) > 0)
        <h2
            class="text-4xl text-white font-semibold tracking-wider mb-4 font-sants p-4 md:ml-14 ml-0 md:text-start text-center mt-4">
            Carrito
            <span class="  font-normal">
                de compras
            </span>
        </h2>
        <section class=" flex">
            <div class="   lg:basis-4/6">
                @foreach ($cartItems as $item)
                    <div class=" last:border-b border-t  border-neutral-700 flex ml-20 py-3  gap-4 ">
                        <div class=" basis-2/6">
                            <img class=" object-contain hover:opacity-100 opacity-95 duration-100   w-full aspect-auto "
                                src="{{ asset($item->product->featured_image_url) }}" alt="{{ $item->product->name }}">


                        </div>
                        <div class=" basis-4/6">
                            <span
                                class=" text-white/90 font-light text-xl uppercase font-sans block">{{ $item->product->name }}</span>
                            <span class="block   font-sans  mt-4 tracking-wider text-white">$
                                {{ number_format($item->price) }} MX</span>
                            <div class="flex items-center gap-x-3 mt-3 ">
                                <div class=" flex justify-center items-center  gap-x-4   w-fit">
                                    <span
                                        class="decrease-quantity text-white  cursor-pointer h-full outline outline-[0.5px] hover:opacity-95 hover:bg-neutral-800 hover:outline-[1px] py-1.5 px-1"
                                        data-id="{{ $item->id }}">
                                        <x-svgs.minus></x-svgs.minus>
                                    </span>
                                    <span class="text-sm block text-white">{{ $item->quantity }}</span>
                                    <span
                                        class="increase-quantity hover:bg-neutral-800 cursor-pointer text-white  outline  h-full py-1.5 px-1  outline-[0.5px] hover:outline-[1px]  "
                                        data-id="{{ $item->id }}" data-stock="{{ $item->product->stock }}">
                                        <x-svgs.plus></x-svgs.plus>
                                    </span>
                                </div>

                                <div class="p-1">
                                    <button onclick="submitDeleteForm({{ $item->id }})"
                                        class="block group   cursor-pointer p-1 rounded-full ">
                                        <x-svgs.trash></x-svgs.trash>
                                    </button>
                                </div>
                            </div>
                            <div class="">
                                <span
                                    class=" block uppercase text-white  text-sm font-medium mt-2 tracking-wider">Subtotal</span>

                                <span class="block text-lg  font-sans  mt-2 tracking-wider text-white">$
                                    {{ number_format($item->price) }} MX</span>
                            </div>
                        </div>



                    </div>
                @endforeach

            </div>

            <div class=" lg:basis-2/6 hidden lg:block   ">


                <div class="flex flex-col  bg-neutral-900 mx-auto sticky top-[200px]  p-4 w-fit h-fit gap-4">
                    <h2 class="text-white font-mono tracking-wide uppercase  text-center">Resumen del Pedido</h2>
                    <div class="   grid grid-cols-2 p-3  gap-y-3 text-white  text-sm  gap-x-10">
                        <span class="">Productos ({{ $cartItems->count() }})</span> <span
                            class=" text-end text-white/80">$900</span>
                        <span class=" pt-2">Total</span> <span class=" pt-2 text-end text-white/80">$900</span>
                    </div>
                    <div class="flex justify-center">
                        <a class="py-[6px] px-4 uppercase text-sm bg-black text-white outline outline-[0.3px] hover:outline-[1px]  "
                            href="">
                            Continuar
                        </a>
                    </div>
                </div>


            </div>
        </section>
    @else
        <div class=" h-auto max-w-[500px] mx-auto">
            <img src="{{ asset('images/resources/cart-empty.png') }}" class=" h-full w-full" alt="si">
        </div>
        <h1 class="text-2xl font-medium text-white   text-center ">Tu Carrito esta
            <span class=" text-emerald-200">Vacío!</span>
        </h1>
        <section class="     text-center  p-2 ">
            <span class="text-gray-400">

                Empieza Añadiendo Productos a tu carrito
            </span>


            <div class="mt-4 flex  justify-center">
                <a class="p-2 border text-white block w-fit text-sm hover:bg-white hover:text-black duration-200 hover:scale-[.999]"
                    href="{{ route('catalogue') }}">ir a productos</a>
            </div>
        </section>
    @endif

    @if (session('success'))
        <div
            class="notification p-4 text-emerald-300 bg-black border border-emerald-100 rounded absolute right-2 top-24 z-10">
            {{ session('success') }}
            <div class="linea-notification-success"></div>
        </div>
    @endif

    @if (session('error'))
        <div class="notification p-4 text-red-300 bg-black border border-red-100 rounded absolute right-2 top-24 z-10">
            {{ session('error') }}
            <div class="linea-notification-error"></div>
        </div>
    @endif

    <script>
        document.querySelectorAll('.increase-quantity').forEach(button => {
            button.addEventListener('click', () => {
                const itemId = button.getAttribute('data-id');
                let quantityElement = button.previousElementSibling;
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
                let quantityElement = button.nextElementSibling;
                let quantity = parseInt(quantityElement.innerText);

                if (quantity > 1) {
                    quantity--;
                    quantityElement.innerText = quantity; // Actualiza la cantidad localmente
                    updateQuantity(itemId, quantity); // Enviar al servidor para actualizar
                }
            });
        });

        function updateQuantity(itemId, quantity) {
            fetch(`/cart/update-quantity/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        quantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Actualiza el subtotal de este artículo en la interfaz
                        const subtotalElement = document.querySelector(`.cart-item-${itemId} .subtotal`);
                        if (subtotalElement) {
                            subtotalElement.innerText = `$${data.subtotal}`; // Actualiza el subtotal
                        }

                        // Actualiza el total del carrito en la interfaz
                        const totalElement = document.querySelector('.cart-total');
                        if (totalElement) {
                            totalElement.innerText = `$${data.total}`; // Actualiza el total
                        }
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




        document.addEventListener("DOMContentLoaded", function() {
            const notification = document.querySelector('.notification');
            if (notification) {
                setTimeout(() => {
                    notification.classList.add(
                        'hidden'); // La clase .hidden debe estar definida para ocultar la notificación
                }, 3000);
            }
        });

        function submitDeleteForm(itemId) {
            const form = document.getElementById(`deleteForm-${itemId}`);
            if (form) {
                form.submit();
            }
        }
    </script>
</div>
