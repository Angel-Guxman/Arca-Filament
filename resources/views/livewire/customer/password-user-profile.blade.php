<div>
    <form class="max-w-xl mx-auto mt-10 mb-2     " wire:submit.prevent="updateView">
        <div>



            <div class="mb-5">
                <label for="current_password" class="block mb-2 text-sm font-medium  text-white">Contraseña Actual
                    <span class=" text-red-400">*</span>
                </label>
                <input type="password" id="current_password" name="current_password" wire:model="current_password"
                    class=" border outline-none      text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-emerald-500 focus:border-gray-400"
                    placeholder="Albert" required />
                @error('current_password')
                    <span class=" block text-red-400 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="new_password" class="block mb-2 text-sm font-medium text-white">Nueva
                    Contraseña
                    <span class=" text-red-400">*</span>
                </label>
                <input type="password" id="new_password" name="new_password" wire:model="new_password"
                    class=" border outline-none      text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-emerald-500 focus:border-gray-400"
                    placeholder="" required />
                @error('new_password')
                    <span class=" block text-red-400 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="new_password_confirmation" class="block mb-2 text-sm font-medium  text-white">Confirmar
                    contraseña
                    <span class=" text-red-400">*</span>
                </label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                    wire:model="new_password_confirmation"
                    class=" border outline-none      text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-emerald-500 focus:border-gray-400"
                    placeholder="Albert" required />
                @error('new_password_confirmation')
                    <span class=" block text-red-400 text-xs">{{ $message }}</span>
                @enderror
            </div>



            <div class=" flex justify-start gap-2 flex-wrap">
                <button type="submit"
                    class="text-white   focus:ring-4 focus:outline-none  font-medium text-sm  px-5 py-2.5 text-center bg-slate-950/50 border border-gray-400 hover:bg-slate-900/50  hover:scale-[1.02] duration-[150ms] focus:ring-emerald-800 hover:border-emerald-300/80 hover:text-emerald-100">Guardar
                    Contraseña</button>

            </div>


        </div>
    </form>
    <div class=" max-w-xl mx-auto mt-3    mb-10 ">
        <h3 class=" text-gray-400  font-medium text-sm mb-2 ">Otras Opciones</h3>
        <div class=" flex gap-3  w-full  ">

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
