<div>
    <form class="max-w-xl mx-auto mt-10 mb-2         " wire:submit.prevent="updateEdit">
        <div>
            <div class=" grid sm:grid-cols-2 grid-cols-1 gap-2">

                <div class="mb-5">
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                    <p type="text" id="name" name="name"
                        class=" border outline-none     text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="Albert Einstein" required>
                        {{ $user->name }}
                    </p>
                </div>

                <div class="mb-5">
                    <label for="last_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
                    <p type="text" id="last_name" name="last_name"
                        class=" border outline-none     text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="Albert Einstein" required>
                        {{ $user->last_name }}
                    </p>
                </div>
            </div>
            <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
                <div class="mb-5">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <p type="email" id="email" name="email"
                        class=" border outline-none    text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="name@example.com" required>
                        {{ $user->email }}
                    </p>
                </div>


                <div class="mb-5">
                    <label for="phone"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                    <p type="text" id="phone" name="phone"
                        class=" border outline-none     text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="N/A" required>
                        {{ $user->phone ?? 'N/A' }}
                    </p>
                </div>
            </div>

            <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
                <div class="mb-5">
                    <label for="first_street"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primera
                        Calle</label>
                    <p type="text" id="first_street" name="first_street" value="{{ $user->first_street }}"
                        class=" border outline-none    text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="name@example.com" required>
                        {{ $user->first_street ?? 'N/A' }}
                    </p>
                </div>


                <div class="mb-5">
                    <label for="second_street"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Segunda
                        Calle</label>
                    <p type="text" id="second_street" name="second_street"
                        class=" border outline-none     text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="N/A" required>
                        {{ $user->second_street ?? 'N/A' }}
                    </p>
                </div>
            </div>
            <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
                <div class="mb-5">
                    <label for="interior_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero
                        Interior
                    </label>
                    <p type="text" id="interior_number" name="interior_number"
                        class=" border outline-none    text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="name@example.com" required>
                        {{ $user->interior_number ?? 'N/A' }}
                    </p>
                </div>


                <div class="mb-5">
                    <label for="address"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
                    <p type="text" id="address" name="address"
                        class=" border outline-none     text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="N/A" required>
                        {{ $user->address ?? 'N/A' }}
                    </p>
                </div>
            </div>

            <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
                <div class="mb-5">
                    <label for="state"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                    <P type="text" id="state" name="state"
                        class=" border outline-none     text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="N/A" required>
                        {{ $user->state ?? 'N/A' }}
                    </P>
                </div>


                <div class="mb-5">
                    <label for="city"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Municipio</label>
                    <p type="text" id="city" name="city"
                        class=" border outline-none    text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="name@example.com" required>
                        {{ $user->municipality ?? 'N/A' }}
                    </p>
                </div>



            </div>
            <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
                <div class="mb-5">
                    <label for="post_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código
                        Postal</label>
                    <p type="text" id="post_code" name="post_code"
                        class=" border outline-none    text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="name@example.com" required>
                        {{ $user->post_code ?? 'N/A' }}

                    </p>
                </div>


                <div class="mb-5">
                    <label for="indications"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Indicaciones</label>
                    <p type="text" id="indications" name="indications" value="{{ $user->indications }}"
                        class=" border outline-none     text-gray-900 text-sm      block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 dark:text-white focus:ring-emerald-500 focus:border-gray-400"
                        placeholder="N/A" required>
                        {{ $user->indications ?? 'N/A' }}
                    </p>
                </div>
            </div>

            <div class=" flex justify-start gap-2 flex-wrap">
                <button type="submit"
                    class="text-white   focus:ring-4 focus:outline-none  font-medium text-sm  px-5 py-2.5 text-center bg-slate-950/50 border border-gray-400 hover:bg-slate-900/50  hover:scale-[1.02] duration-[150ms] focus:ring-emerald-800 hover:border-emerald-300/80 hover:text-emerald-100">Editar</button>


            </div>


        </div>
    </form>
    <div class=" max-w-xl mx-auto mt-3    mb-10 ">
        <h3 class=" text-gray-400  font-medium text-sm mb-2 ">Otras Opciones</h3>
        <div class=" flex gap-3  w-full  ">

            <form wire:submit.prevent="updatePassword" class="   ">
                @csrf

                <button type="submit"
                    class="inline-block py-2.5 px-5 text-sm font-medium  bg-slate-950/50 hover:bg-slate-900/50 hover:border-emerald-300/80  hover:scale-[1.02] duration-[150ms]  border-gray-400 text-white focus:ring-emerald-800  border  hover:text-emerald-100  "
                    aria-current="page">Cambiar contraseña</button>

            </form>
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
