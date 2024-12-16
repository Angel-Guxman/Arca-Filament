
<div>
    <style>
        .grid-cont {
            display: grid;
            grid-template-columns: 1fr;
        }

        @media (min-width: 1024px) {
            .grid-cont {
                grid-template-columns: 3fr 1fr;
            }
        }

        .hidden {
            display: none;
        }
    </style>

    <h1 class="text-4xl text-white p-4 md:ml-14 ml-0 md:text-start text-center mt-4">Carrito de compras</h1>

    @if (count($cartItems) > 0)
        <section class="grid-cont lg:grid-cols-2">
            <div>
                @foreach ($cartItems as $item)
                <div class=" border-b border-t  grid grid-cols-3 gap-1 p-2 ">
                    <div class="">
                        <span class=" text-white text-center w-full block py-3 ">{{ $item->product->name }}</span>
                        <div class=" mx-auto h-[100px] w-[100px] md:h-[150px] md:w-[150px]  object-contain">
                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <div class="flex flex-col gap-3 truncate">
                            <span class="block text-center max-w-[240px] w-auto truncate text-white">{{ $item->product->name }}</span>
                            <span class="block text-white w-full text-center">$ {{ number_format($item->price) }}</span>
                            <div class="flex justify-center items-center gap-2 w-fit mx-auto">
                                <div class="flex justify-around items-center border mx-auto gap-[10px]">
                                    <a href="javascript:void(0);" class="decrease-quantity group h-full py-2 px-1" data-id="{{ $item->id }}">
                                        <x-svgs.minus></x-svgs.minus>
                                    </a>
                                    <span class="text-sm block text-white">{{ $item->quantity }}</span>
                                    <a href="javascript:void(0);" class="increase-quantity group h-full py-2 px-1" data-id="{{ $item->id }}" data-stock="{{ $item->product->stock }}">
                                        <x-svgs.plus></x-svgs.plus>
                                    </a>
                                </div>
                                <form id="deleteForm-{{ $item->id }}" action="{{ route('cart.remove', ['cartItemId' => $item->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <div class="p-1">
                                    <a href="javascript:void(0);" onclick="submitDeleteForm({{ $item->id }})" class="block group p-1 rounded-full hover:bg-gray-500/30">
                                        <x-svgs.trash></x-svgs.trash>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="flex flex-wrap justify-center items-center">
                        <section class="flex flex-col gap-2 text-center">
                            <span class="block text-white">Subtotal</span>
                            <span class="block text-white">$7478.20</span>
                        </section>
                    </footer>
                </div>
            @endforeach
            
            </div>

            <div class="flex justify-center p-4">
                <div class="flex flex-col mt-10 border p-10 w-fit h-fit gap-4">
                    <h2 class="text-white">Detalles del Pedido</h2>
                    <div class="flex text-white gap-2 justify-center items-center">
                        <h3>Total</h3> <span>$900</span>
                    </div>
                    <div class="flex justify-center">
                        <a class="py-[6px] px-2 bg-white text-black border hover:scale-105 duration-200" href="">
                            Pagar Pedido
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="text-white font-medium text-lg md:text-start text-center md:ml-14 p-2 ml-0">
            Empieza Añadiendo Productos a tu carrito
            <div class="mt-4 flex md:justify-start justify-center">
                <a class="p-2 border text-white block w-fit text-sm hover:border-emerald-200 hover:text-emerald-200 duration-150 hover:scale-[.99]" href="{{ route('catalogue') }}">ir a productos</a>
            </div>
        </section>
    @endif

    @if (session('success'))
        <div class="notification p-4 text-emerald-300 bg-black border border-emerald-100 rounded absolute right-2 top-24 z-10">
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
        const productStock = parseInt(button.getAttribute('data-stock')); // Obtener el stock del atributo data-stock

        if (quantity < productStock) {
            quantity++;
            quantityElement.innerText = quantity; // Actualiza la interfaz inmediatamente
            updateQuantity(itemId, quantity); // Enviar la solicitud al servidor
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
            quantityElement.innerText = quantity; // Actualiza la interfaz inmediatamente
            updateQuantity(itemId, quantity); // Enviar la solicitud al servidor
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
        body: JSON.stringify({ quantity })
    })
    .then(response => response.json())
    .then(data => {
        if (!data.success) {
            alert(data.message); // Si hay error, informa al usuario
        }
        // La interfaz ya fue actualizada antes de la llamada, así que no hacemos nada aquí.
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


        document.addEventListener("DOMContentLoaded", function() {
            const notification = document.querySelector('.notification');
            if (notification) {
                setTimeout(() => {
                    notification.classList.add('hidden'); // La clase .hidden debe estar definida para ocultar la notificación
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
