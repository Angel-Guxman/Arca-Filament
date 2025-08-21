<div class="bg-neutral-900 rounded-lg border border-neutral-700/80 p-5 relative">
    <h2 class="text-xl font-semibold text-white mb-6">Cambiar Contraseña</h2>

    <form wire:submit.prevent="updateView" class="space-y-5">
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label for="current_password" class="block text-sm font-medium text-neutral-300 mb-1">
                    Contraseña Actual <span class="text-red-400">*</span>
                </label>
                <input type="password" id="current_password" name="current_password" wire:model="current_password"
                    class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200 focus:ring-2 focus:ring-neutral-400 focus:border-neutral-400 outline-none"
                    required />
                @error('current_password')
                    <span class="block text-red-400 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="new_password" class="block text-sm font-medium text-neutral-300 mb-1">
                    Nueva Contraseña <span class="text-red-400">*</span>
                </label>
                <input type="password" id="new_password" name="new_password" wire:model="new_password"
                    class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200 focus:ring-2 focus:ring-neutral-400 focus:border-neutral-400 outline-none"
                    required />
                @error('new_password')
                    <span class="block text-red-400 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="new_password_confirmation" class="block text-sm font-medium text-neutral-300 mb-1">
                    Confirmar Contraseña <span class="text-red-400">*</span>
                </label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                    wire:model="new_password_confirmation"
                    class="w-full p-2.5 bg-neutral-800 border border-neutral-700 rounded-md text-neutral-200 focus:ring-2 focus:ring-neutral-400 focus:border-neutral-400 outline-none"
                    required />
                @error('new_password_confirmation')
                    <span class="block text-red-400 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex justify-start gap-3 pt-2">
            <button type="submit" class="button-primary flex items-center gap-2">
                <x-svgs.save class="size-5" />
                <span>Guardar Cambios</span>
            </button>
        </div>
    </form>

    <div class="max-w-xl mx-auto mt-8 mb-4">
        <h3 class="text-neutral-200 font-medium text-sm mb-3">Otras Opciones</h3>
        <div class="flex gap-3">
            <a href="{{ route('profile') }}" class="button-primary flex items-center gap-2">
                <x-svgs.arrow-left class="size-5" />
                <span>Volver al perfil</span>
            </a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="button-primary flex items-center gap-2">
                    <x-svgs.logout class="size-5" />
                    <span>Cerrar Sesión</span>
                </button>
            </form>
        </div>
    </div>
</div>
