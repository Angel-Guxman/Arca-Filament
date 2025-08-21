<div class="h-auto w-[350px] md:w-[300px] mb-10  sm:w-[320px]  lg:w-[300px] relative  bg-gray-950    ">
    @if ($product->stock <= 0)
        <div class=" absolute inset-0   backdrop-brightness-50  z-10">
            <div class=" ">
                <span class="  block text-gray-100  p-2 w-fit   text-sm font-medium backdrop-blur-sm   bg-emerald-700">
                    Producto
                    Agotado</span>
            </div>

        </div>
    @endif

    <div
        class="lg:h-[220px] lg:w-[300px] h-[240px] sm:h-[220px] sm:w-[320px]  w-[350px] md:w-[300px] md:h-[220px]  relative group ">
        <a href="{{ route('productInformation', ['slug' => $product->slug]) }} "
            class=" lg:h-[220px] lg:w-[300px]  h-[240px] w-[350px] md:w-[300px] md:h-[220px] sm:h-[220px] sm:w-[320px] ">
            <img src="{{ asset($product->images[0]->image) }}" id="{{ $product->id }}-img" alt="{{ $product->name }}"
                class=" capitalize h-full w-full object-cover    ">
        </a>
        <div onclick="zoom({{ $product->id }})"
            class="zoom-container  bg-neutral-200 z-10 absolute hidden cursor-pointer hover:bg-neutral-300  group-hover:block top-0 p-2 opacity-50 right-0 size-fit ">

            <x-svgs.zoom></x-svgs.zoom>
        </div>
    </div>
    <span class="text-white mt-1 font-light line-clamp-1 mx-2">{{ $product->name }}</span>
    <div class=" flex justify-between items-center mx-2">
        <p class="text-white mt-1 font-medium truncate w-[250px] ">$ {{ number_format($product->price) }} MXN</p>
        <button type="button" class="  active:scale-90 transition-transform transform"
            @auth onclick="addFavorite({{ $product->id }})" @endauth @guest
onclick="alertToast('favorite')" @endguest>


            <x-svgs.favorite-heart id="favorite-{{ $product->id }}" :$class>

            </x-svgs.favorite-heart>
        </button>
    </div>
    <div class="">
        @auth
            <button type="button" id="add-cart-{{ $product->id }}" onclick="addToCart({{ $product->id }})"
                class=" text-black bg-white mt-2  disabled:cursor-not-allowed  font-medium border hover:text-gray-800  w-full py-2 hover:bg-neutral-300  duration-200">
                Agregar al Carrito
            </button>

        @endauth
        @guest
            <button onclick="alertToast('cart')"
                class=" inline-block text-center text-black bg-white mt-2  font-medium border hover:text-gray-800  w-full py-2 hover:bg-neutral-300  duration-200">
                Agregar al Carrito
            </button>
        @endguest

    </div>
</div>
