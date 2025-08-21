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
                    <div class=" last:border-b border-t  relative border-neutral-700 flex ml-20 py-3 space-x-4"
                        id="item-{{ $item->id }}">
                        <div class="absolute top-2 right-2 p-1 delete-item" data-id="{{ $item->id }}">

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
                                        <button
                                            class="decrease-quantity text-white disabled:cursor-not-allowed  cursor-pointer h-full hover:opacity-95  py-1.5 px-1"
                                            data-id="{{ $item->id }}">
                                            <x-svgs.minus class="size-5"></x-svgs.minus>
                                        </button>
                                        <span class="text-sm block text-white">{{ $item->quantity }}</span>
                                        <button
                                            class="increase-quantity  cursor-pointer text-white disabled:cursor-not-allowed  h-full py-1.5 px-1"
                                            data-id="{{ $item->id }}" data-stock="{{ $item->product->stock }}">
                                            <x-svgs.plus class="size-5"></x-svgs.plus>
                                        </button>
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
                        <span id="cart-items-count" class="">Productos ({{ $cartItems->count() }})</span>
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
                        <form action="{{ route('create-order-cart') }}">
                            <button
                                class="py-[6px] px-4 uppercase text-sm bg-neutral-800 hover:bg-neutral-700/70 text-white border-[0.5px] border-neutral-500   duration-200  "
                                type="submit">
                                Continuar
                            </button>
                        </form>
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
                <a class=" button-primary" href="{{ route('catalogue') }}">ir a
                    productos</a>
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
        dom.$$('.increase-quantity').forEach(button => {
            button.addEventListener('click', async (e) => {
                button.disabled = true;
                const itemId = button.getAttribute('data-id');
                let quantityElement = button.previousElementSibling;
                let quantity = parseInt(quantityElement.innerText);
                const productStock = parseInt(button.getAttribute('data-stock'));
                if (quantity < productStock) {
                    let newQuantity = quantity + 1;
                    let response = await updateQuantity(itemId, newQuantity);
                    if (response.success) {
                        notification.success(response.message);
                        quantityElement.innerText = newQuantity;
                        dom.$(`#subtotal-${itemId}`).innerText = `$${response.totalItem}`;
                        dom.$(`#total-items`).innerText = `$${response.subtotal}`;
                        dom.$(`#total`).innerText = `$${response.total}`;
                    } else {
                        notification.error(response.message);
                    }
                }
                setTimeout(() => {
                    button.disabled = false;
                }, 1000);
            });
        });

        dom.$$('.decrease-quantity').forEach(button => {
            button.addEventListener('click', async (e) => {
                button.disabled = true;
                const itemId = button.getAttribute('data-id');
                let quantityElement = button.nextElementSibling;
                let quantity = parseInt(quantityElement.innerText);
                if (quantity > 1) {
                    let newQuantity = quantity - 1;
                    let response = await updateQuantity(itemId, newQuantity);
                    if (response.success) {
                        notification.success(response.message);
                        quantityElement.innerText = newQuantity;
                        dom.$(`#subtotal-${itemId}`).innerText = `$${response.totalItem}`;
                        dom.$(`#total-items`).innerText = `$${response.subtotal}`;
                        dom.$(`#total`).innerText = `$${response.total}`;
                    } else {
                        notification.error(response.message);
                    }
                }
                setTimeout(() => {
                    button.disabled = false;
                }, 1000);
            });
        });

        dom.$$('.delete-item').forEach(button => {
            button.addEventListener('click', async (e) => {
                const itemId = button.getAttribute('data-id');
                let response = await deleteItem(itemId);
                if (response.success) {
                    notification.success(response.message);
                    dom.$(`#item-${itemId}`).remove();
                    dom.$(`#total-items`).innerText = `$${response.subtotal}`;
                    dom.$(`#total`).innerText = `$${response.total}`;
                    dom.$(`#cart-items-count`).innerText = `Productos (${response.cartCount})`;
                    if (response.cartCount >= 100) {
                        dom.$(`#cart-count`).innerHTML = `<small>+99</small>`;
                    } else if (response.cartCount === 0) {
                        dom.$(`#cart-count`).classList.add('hidden')
                        window.location.reload();
                    } else {
                        dom.$(`#cart-count`).innerText = `${response.cartCount}`;
                    }

                } else {
                    notification.error(response.message);
                }
            });
        });

        async function deleteItem(itemId) {
            try {
                const response = await axios.delete(`{{ route('cart-item.delete', ':id') }}`.replace(':id', itemId));
                return response.data;
            } catch (error) {
                console.log(error);
                return {
                    success: false,
                    message: 'Ocurrio un error al eliminar el producto.'
                };
            }
        }

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

        document.addEventListener("DOMContentLoaded", function() {
            const notification = document.querySelector('.notification');
            if (notification) {
                setTimeout(() => {
                    notification.classList.add(
                        'hidden'); // La clase .hidden debe estar definida para ocultar la notificación
                }, 3000);
            }
        });
    </script>
</div>
