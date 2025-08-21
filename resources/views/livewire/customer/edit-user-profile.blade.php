<div class="bg-neutral-900 rounded-lg border border-neutral-700/80 p-5 relative">
    <button type="button" wire:click="updateView" class="absolute top-2 right-2 button-primary">
        <x-svgs.user-data class=" size-5" />
    </button>
    <h2 class="text-xl font-semibold text-white mb-6">Editar Perfil</h2>

    <form wire:submit.prevent="updateView" class="space-y-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="name" class="block text-sm font-medium text-neutral-300 mb-1">
                    Nombre <span class="text-red-400">*</span>
                </label>
                <input type="text" id="name" wire:model="name" required
                    class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-white placeholder-neutral-500 focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition"
                    placeholder="Tu nombre" />
                @error('name')
                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="last_name" class="block text-sm font-medium text-neutral-300 mb-1">
                    Apellido <span class="text-red-400">*</span>
                </label>
                <input type="text" id="last_name" wire:model="last_name" required
                    class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-white placeholder-neutral-500 focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition"
                    placeholder="Tu apellido" />
                @error('last_name')
                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-neutral-300 mb-1">
                    Correo Electrónico <span class="text-red-400">*</span>
                </label>
                <input type="email" id="email" wire:model="email" required
                    class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-white placeholder-neutral-500 focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition"
                    placeholder="tu@email.com" />
                @error('email')
                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-neutral-300 mb-1">
                    Teléfono
                </label>
                <input type="tel" id="phone" wire:model="phone"
                    class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-white placeholder-neutral-500 focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition"
                    placeholder="+52 123 456 7890" {{ $user->phone ? 'required' : '' }} />
                @error('phone')
                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="pt-4 border-t border-neutral-700">
            <h3 class="text-base font-medium text-white mb-4">Dirección</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="first_street" class="block text-sm font-medium text-neutral-300 mb-1">
                        Calle Principal
                    </label>
                    <input type="text" id="first_street" wire:model="first_street"
                        class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-white placeholder-neutral-500 focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition"
                        placeholder="Av. Principal" {{ $user->first_street ? 'required' : '' }} />
                    @error('first_street')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="second_street" class="block text-sm font-medium text-neutral-300 mb-1">
                        Calle Secundaria
                    </label>
                    <input type="text" id="second_street" wire:model="second_street"
                        class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-white placeholder-neutral-500 focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition"
                        placeholder="Calle lateral" {{ $user->second_street ? 'required' : '' }} />
                    @error('second_street')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="interior_number" class="block text-sm font-medium text-neutral-300 mb-1">
                        Número Interior
                    </label>
                    <input type="text" id="interior_number" wire:model="interior_number"
                        class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-white placeholder-neutral-500 focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition"
                        placeholder="123" {{ $user->interior_number ? 'required' : '' }} />
                    @error('interior_number')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="outdoor_number" class="block text-sm font-medium text-neutral-300 mb-1">
                        Número Exterior
                    </label>
                    <input type="text" id="outdoor_number" wire:model="outdoor_number"
                        class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-white placeholder-neutral-500 focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition"
                        placeholder="123" {{ $user->outdoor_number ? 'required' : '' }} />
                    @error('outdoor_number')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>



                <div>
                    <label for="state" class="block text-sm font-medium text-neutral-300 mb-1">
                        Estado <span class="text-red-400">*</span>
                    </label>
                    <select id="state" wire:model.live="state" required
                        class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition">
                        <option value="">Selecciona un Estado</option>
                        @foreach ($data as $index => $value)
                            <option value="{{ $index }}">{{ $index }}</option>
                        @endforeach
                    </select>
                    @error('state')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="municipality" class="block text-sm font-medium text-neutral-300 mb-1">
                        Municipio <span class="text-red-400">*</span>
                    </label>
                    <select id="municipality" wire:model="municipality" required
                        class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition">
                        <option value="">Selecciona un Municipio</option>
                        @foreach ($municipios as $municipio)
                            <option value="{{ $municipio }}">{{ $municipio }}</option>
                        @endforeach
                    </select>
                    @error('municipality')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="country" class="block text-sm font-medium text-neutral-300 mb-1">
                        Pais <span class="text-red-400">*</span>
                    </label>
                    <input type="text" id="country" wire:model="country" maxlength="5" required
                        class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-white placeholder-neutral-500 focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition"
                        placeholder="México" />
                    @error('country')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="post_code" class="block text-sm font-medium text-neutral-300 mb-1">
                        Código Postal <span class="text-red-400">*</span>
                    </label>
                    <input type="text" id="post_code" wire:model="post_code" maxlength="5" required
                        class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-white placeholder-neutral-500 focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition"
                        placeholder="00000" />
                    @error('post_code')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="sm:col-span-2">
                    <label for="address" class="block text-sm font-medium text-neutral-300 mb-1">
                        Dirección Completa
                    </label>
                    <textarea type="text" id="address" wire:model="address"
                        class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-white placeholder-neutral-500 focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition max-h-20 overflow-y-auto"
                        placeholder="Colonia, Ciudad, Estado" {{ $user->address ? 'required' : '' }}></textarea>
                    @error('address')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>


                <div class="sm:col-span-2">
                    <label for="indications" class="block text-sm font-medium text-neutral-300 mb-1">
                        Indicaciones Adicionales
                    </label>
                    <textarea id="indications" wire:model="indications"
                        class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-white placeholder-neutral-500 focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition max-h-20 overflow-y-auto"
                        placeholder="Ej: Casa blanca de dos pisos, portón negro, etc."></textarea>
                    @error('indications')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-between items-center pt-4 border-t border-neutral-700">
                <button type="submit" class="button-primary flex items-center gap-2">
                    Guardar Cambios
                </button>

            </div>
    </form>


</div>
</div>


</div>
