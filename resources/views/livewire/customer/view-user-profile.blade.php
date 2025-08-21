<div class="bg-neutral-900 rounded-lg border border-neutral-700/80 p-5 relative">
    <button type="button" wire:click="updateEdit" class="absolute top-2 right-2 button-primary">
        <x-svgs.pencil class=" size-5" />
    </button>
    <h2 class="text-xl font-semibold text-white mb-6">Información del Perfil</h2>

    <div class="space-y-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-neutral-300 mb-1">Nombre</label>
                <div class="p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200">
                    {{ $user->name }}
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-neutral-300 mb-1">Apellido</label>
                <div class="p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200">
                    {{ $user->last_name }}
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-neutral-300 mb-1">Correo Electrónico</label>
                <div class="p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200">
                    {{ $user->email }}
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-neutral-300 mb-1">Teléfono</label>
                <div class="p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200">
                    {{ $user->phone ?? 'N/A' }}
                </div>
            </div>
        </div>

        <div class="pt-4 border-t border-neutral-700 pb-4">
            <h3 class="text-base font-medium text-white mb-4">Dirección</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-neutral-300 mb-1">Calle Principal</label>
                    <div class="p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200">
                        {{ $user->first_street ?? 'N/A' }}
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-neutral-300 mb-1">Calle Secundaria</label>
                    <div class="p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200">
                        {{ $user->second_street ?? 'N/A' }}
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-neutral-300 mb-1">Número Interior</label>
                    <div class="p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200">
                        {{ $user->interior_number ?? 'N/A' }}
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-neutral-300 mb-1">Número Exterior</label>
                    <div class="p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200">
                        {{ $user->exterior_number ?? 'N/A' }}
                    </div>
                </div>


                <div>
                    <label class="block text-sm font-medium text-neutral-300 mb-1">Estado</label>
                    <div class="p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200">
                        {{ $user->state ?? 'N/A' }}
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-neutral-300 mb-1">Municipio</label>
                    <div class="p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200">
                        {{ $user->municipality ?? 'N/A' }}
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-neutral-300 mb-1">Código Postal</label>
                    <div class="p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200">
                        {{ $user->post_code ?? 'N/A' }}
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-neutral-300 mb-1">Indicaciones</label>
                    <div class="p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200">
                        {{ $user->indications ?? 'N/A' }}
                    </div>
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-neutral-300 mb-1">Dirección Completa</label>
                    <div
                        class="p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200 max-h-20 overflow-y-auto">
                        {{ $user->address ?? 'N/A' }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class=" max-w-xl mx-auto mt-5    mb-5 ">
        <h3 class=" text-neutral-200  font-medium text-sm mb-2 ">Otras Opciones</h3>
        <div class=" flex gap-3  w-full  ">

            <form wire:submit.prevent="updatePassword" class="   ">
                @csrf

                <button type="submit" class="button-primary flex items-center gap-2" aria-current="page">
                    <x-svgs.reset class="size-5" />
                    Cambiar contraseña</button>

            </form>
            <div class="  ">
                <form action="{{ route('logout') }}" class="    " method="POST">
                    @csrf
                    <button type="submit" class=" button-primary flex items-center gap-2 " aria-current="page">
                        <x-svgs.logout class="size-5" />
                        Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </div>

</div>
