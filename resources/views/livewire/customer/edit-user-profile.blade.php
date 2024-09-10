<div>
    <form class="max-w-xl mx-auto mt-10 mb-2     " wire:submit.prevent="updateView">
        <div>

            <div class=" grid sm:grid-cols-2 grid-cols-1 gap-2">

                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                        <span class=" text-red-400">*</span>
                    </label>
                    <input type="text" id="name" name="name" wire:model="name"
                        class=" border outline-none     text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="Albert" required />
                    @error('name')
                        <span class=" block text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido
                        <span class=" text-red-400">*</span>
                    </label>
                    <input type="text" id="last_name" wire:model="last_name" name="last_name"
                        class=" border outline-none     text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="Einstein" required />
                    @error('last_name')
                        <span class=" block text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                        <span class=" text-red-400">*</span>
                    </label>
                    <input type="email" id="email" wire:model="email" name="email"
                        class=" border outline-none    text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="name@example.com" required />
                    @error('email')
                        <span class=" block text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-5">
                    <label for="phone"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                    <input type="tel" id="phone" name="phone" wire:model="phone"
                        class=" border outline-none     text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        {{ $user->phone ? 'required' : '' }} />
                    @error('phone')
                        <span class=" block text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
                <div class="mb-5">
                    <label for="first_street"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primera
                        Calle</label>
                    <input type="text" id="first_street" wire:model="first_street" name="first_street"
                        class=" border outline-none    text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        {{ $user->first_street ? 'required' : '' }} />
                    @error('first_street')
                        <span class=" block text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-5">
                    <label for="second_street"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Segunda
                        Calle</label>
                    <input type="text" id="second_street" wire:model="second_street" name="second_street"
                        class=" border outline-none     text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        {{ $user->second_street ? 'required' : '' }} />
                    @error('first_street')
                        <span class=" block text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
                <div class="mb-5">
                    <label for="interior_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero
                        Interior
                    </label>
                    <input type="text" id="interior_number" wire:model="interior_number" name="interior_number"
                        class=" border outline-none    text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        {{ $user->interior_number ? 'required' : '' }} />
                    @error('interior_number')
                        <span class=" block text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-5">
                    <label for="address"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
                    <input type="text" id="address" wire:model="address" name="address"
                        class=" border outline-none     text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        {{ $user->address ? 'required' : '' }} />
                    @error('address')
                        <span class=" block text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">

                <div class="mb-5">
                    <label for="state"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                    <select name="state" id="state" wire:model.live="state"
                        class=" border outline-none     text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        {{ $user->state ? 'required' : '' }}>
                        <option value="">Selecciona un Estado</option>
                        @foreach ($data as $index => $value)
                            <option value="{{ $index }}">{{ $index }}</option>
                        @endforeach
                    </select>
                    {{--    <input type="text" id="state" name="state" wire:model="state"
                        
                        class=" border outline-none     text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="N/A" {{ $user->state ? 'required' : '' }} /> --}}
                    @error('city')
                        <span class=" block text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="municipality"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Municipio</label>
                    <select name="municipality" id="municipality" wire:model="municipality"
                        class=" border outline-none    text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400">
                        <option value={{ null }}>Selecciona un Municipio</option>
                        @foreach ($municipios as $municipio)
                            <option value="{{ $municipio }}">{{ $municipio }}</option>
                        @endforeach
                    </select>
                    {{--     <input type="text" id="municipality" name="municipality" wire:model="municipality"
                        class=" border outline-none    text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="name@example.com" {{ $user->city ? 'required' : '' }} /> --}}
                    @error('municipality')
                        <span class=" block text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
                <div class="mb-5">
                    <label for="post_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código
                        Postal</label>
                    <input type="text" id="post_code" wire:model="post_code" name="post_code"
                        class=" border outline-none    text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        {{ $user->post_code ? 'required' : '' }} />
                    @error('post_code')
                        <span class=" block text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-5">
                    <label for="indications"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Indicaciones</label>
                    <input type="text" id="indications" name="indications" wire:model="indications"
                        class=" border outline-none     text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        {{ $user->indications ? 'required' : '' }} />
                    @error('indications')
                        <span class=" block text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class=" flex justify-start gap-2 flex-wrap">
                <button type="submit"
                    class="text-white   focus:ring-4 focus:outline-none  font-medium text-sm  px-5 py-2.5 text-center bg-slate-950/50 border border-gray-400 hover:bg-slate-900/50  hover:scale-[1.02] duration-[150ms] focus:ring-emerald-800 hover:border-emerald-300/80 hover:text-emerald-100">Guardar</button>


            </div>


        </div>
    </form>
    <div class=" max-w-xl mx-auto mt-3    mb-10 ">
        <h3 class=" text-gray-400  font-medium text-sm mb-2 ">Otras Opciones</h3>
        <div class=" flex gap-3  w-full  ">
            <div class="  ">
                <form class="    " wire:submit.prevent="changeToView">
                    @csrf
                    <button type="submit"
                        class="text-white   focus:ring-4 focus:outline-none  font-medium text-sm  px-5 py-2.5 text-center bg-slate-950/50 border border-gray-400 hover:bg-slate-900/50  hover:scale-[1.02] duration-[150ms] focus:ring-emerald-800 hover:border-emerald-300/80 hover:text-emerald-100"
                        aria-current="page">Volver</button>
                </form>
            </div>

            <div class="  ">
                <form action="{{ route('logout') }}" class="    " method="POST">
                    @csrf
                    <button type="submit"
                        class="inline-block py-2.5 px-5 text-sm font-medium  bg-slate-950/50 hover:bg-slate-900/50 hover:border-red-400/70  hover:scale-[1.02] duration-[150ms]  border-gray-400 text-white  border  hover:text-red-100  "
                        aria-current="page">Cerrar
                        Sesión</button>
                </form>
            </div>
        </div>
    </div>


</div>
