<div>
    <div class=" fixed  top-0 bottom-0 left-0 right-0 backdrop-brightness-50">

    </div>
    <div class=" relative     h-full w-full z-20  ">
        <div class=" absolute    bg-white min-h-[85px] right-0 -z-10 left-0">

        </div>
        <div class="  w-fit mx-auto  ">
            <form class="max-w-md mx-auto">

                <div class="relative py-2    ">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4  text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" wire:model.live="search" placeholder="Buscar productos..."
                        class="block w-full p-3 ps-9 text-sm   outline-gray-800 outline-1 focus:outline  border  border-gray-700   bg-gray-50     text-gray-700 "
                        required />
                    <div class="absolute inset-y-0 end-2.5 flex items-center">
                        <button type="submit"
                            class="text-white    bottom-0 bg-gray-800 hover:bg-gray-900  focus:outline-none  text-sm px-3 py-2 ">Search</button>
                    </div>
                    <div class=" absolute -right-10 inset-y-0 flex items-center">
                        <x-svgs.x></x-svgs.x>
                    </div>
                </div>
            </form>
            @if ($search !== '')
                <ul class=" pt-2 bg-white pb-1 max-h-60 overflow-y-scroll ">
                    <h3 class=" p-1 text-gray-700 mx-2 my-1 border-b-2">Productos</h3>
                    @forelse($products as $product)
                        <a href=""
                            class=" px-1 text-sm hover:bg-gray-200/70  m-2 block text-gray-700   p-1     opacity-80">{{ $product->name }}</a>
                    @empty
                        <a class=" px-1 m-2 block text-gray-700 border rounded p-1  opacity-80">No se encontraron
                            usuarios.</a>
                    @endforelse
                </ul>
            @else
            @endif


        </div>


    </div>
</div>
