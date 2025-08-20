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
                    <div class=" last:border-b border-t  relative border-neutral-700 flex ml-20 py-3 space-x-4">
                        <div class="absolute top-2 right-2 p-1">
                            <x-svgs.close
                                class="size-7 text-neutral-400 hover:text-white cursor-pointer "></x-svgs.close>
                        </div>
                        <div class=" ">
                            <img class=" object-contain hover:opacity-100 opacity-95 duration-100   max-w-[170px] aspect-auto "
                                src="{{ asset($item->product->featured_image_url) }}" alt="{{ $item->product->name }}">


                        </div>
                        <div class="   w-full">
                            <span
                                class=" text-white/90 font-medium text-xl tracking-wider uppercase font-sans block">{{ $item->product->name }}</span>

                            <div
                                class="  text-sm w-fit px-2  text-white/80 font-light uppercase  py-1 rounded-md mt-3 font-sans flex items-center gap-x-1">
                                <x-svgs.tag class="size-4"></x-svgs.tag>

                                <span class="  block">{{ $item->product->category->name }}</span>

                            </div>
                            {{--   <span class="block   font-sans  mt-4 tracking-wider text-white">$
                                {{ number_format($item->price) }} MX</span> --}}
                            <div class="flex items-center justify-between pr-5   ">

                                <div class="flex items-center gap-x-3 mt-3 ">
                                    <div
                                        class=" flex justify-center items-center border border-neutral-700   gap-x-4 hover:border-neutral-500   w-fit">
                                        <span
                                            class="decrease-quantity text-white  cursor-pointer h-full hover:opacity-95  py-1.5 px-1"
                                            data-id="{{ $item->id }}">
                                            <x-svgs.minus class="size-5"></x-svgs.minus>
                                        </span>
                                        <span class="text-sm block text-white">{{ $item->quantity }}</span>
                                        <span class="increase-quantity cursor-pointer text-white  h-full py-1.5 px-1"
                                            data-id="{{ $item->id }}" data-stock="{{ $item->product->stock }}">
                                            <x-svgs.plus class="size-5"></x-svgs.plus>
                                        </span>
                                    </div>


                                </div>
                                <div class="  flex flex-col items-center">
                                    {{-- <span class="text-white">{{ json_encode($item->product) }}</span> --}}
                                    <span
                                        class=" block uppercase text-white  text-sm font-medium mt-4 tracking-wider">Subtotal</span>

                                    <span id="subtotal-{{ $item->id }}"
                                        class="block text-lg  font-sans  mt-2 tracking-wider text-white">$
                                        {{ number_format($item->subtotal) }} MXN</span>
                                </div>
                            </div>

                        </div>



                    </div>
                @endforeach


            </div>

            <div class=" lg:basis-2/6 hidden lg:block   ">


                <div
                    class="flex flex-col  bg-neutral-900  border-[0.5px] border-neutral-700 mx-auto sticky top-[200px]  p-4 w-fit h-fit gap-4">
                    <h2 class="text-white font-mono tracking-wide uppercase  text-center">Resumen del Pedido</h2>
                    <div class="   grid grid-cols-2 p-3  gap-y-3 text-white  text-sm  gap-x-10">
                        <span class="">Productos ({{ $cartItems->count() }})</span>
                        <span id="total-items" class=" text-end text-white/80">${{ number_format($totalItems) }}</span>
                        <span class="">Envio</span>
                        <span id="total-shipping"
                            class=" text-end text-white/80">${{ number_format($shipping) }}</span>
                    </div>
                    <div class=" flex justify-between items-center text-sm px-2 border-t border-neutral-700 ">

                        <span class=" pt-2 text-white">Total</span>
                        <span id="total" class=" pt-2 text-end text-white/90">${{ number_format($total) }}</span>
                    </div>
                    <div class="flex justify-center mt-4">
                        <a class="py-[6px] px-4 uppercase text-sm bg-neutral-800 hover:bg-neutral-700/70 text-white border-[0.5px] border-neutral-500   duration-200  "
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

    <script defer>
        const dom = {
            $: sel => document.querySelector(sel),
            $$: sel => document.querySelectorAll(sel)
        }
        const shipping = @json($shipping);
        console.log("el shipping")
        console.log(shipping)
        dom.$$('.increase-quantity').forEach(button => {
            button.addEventListener('click', async () => {
                const itemId = button.getAttribute('data-id');
                let quantityElement = button.previousElementSibling;
                let quantity = parseInt(quantityElement.innerText);
                const productStock = parseInt(button.getAttribute('data-stock'));
                if (quantity < productStock) {
                    let newQuantity = quantity + 1;
                    let response = await updateQuantity(itemId, newQuantity);
                    if (response.success) {
                        quantityElement.innerText = newQuantity;
                        dom.$(`#subtotal-${itemId}`).innerText = `$${response.totalItem}`;
                        dom.$(`#total-items`).innerText = `$${response.subtotal}`;
                        dom.$(`#total`).innerText = `$${response.total}`;
                    } else {
                        notification.error(response.message);
                    }
                }
            });
        });

        dom.$$('.decrease-quantity').forEach(button => {
            button.addEventListener('click', async () => {
                const itemId = button.getAttribute('data-id');
                let quantityElement = button.nextElementSibling;
                let quantity = parseInt(quantityElement.innerText);
                if (quantity > 1) {
                    let newQuantity = quantity - 1;
                    let response = await updateQuantity(itemId, newQuantity);
                    if (response.success) {
                        quantityElement.innerText = newQuantity;
                        dom.$(`#subtotal-${itemId}`).innerText = `$${response.totalItem}`;
                        dom.$(`#total-items`).innerText = `$${response.subtotal}`;
                        dom.$(`#total`).innerText = `$${response.total}`;
                    } else {
                        notification.error(response.message);
                    }
                }
            });
        });

        async function updateQuantity(itemId, quantity) {
            try {
                const response = await axios.post(`{{ route('cart-item.updateQuantity', ':id') }}`.replace(':id',
                    itemId), {
                    quantity: quantity
                }, )
                return response.data;
            } catch (error) {
                console.log(error);
                return {
                    success: false,
                    message: 'Ocurrio un error al actualizar la cantidad del producto.'
                };
            }

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
