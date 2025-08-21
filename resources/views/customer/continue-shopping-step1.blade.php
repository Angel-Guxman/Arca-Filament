@extends('layouts.shopping')

@section('title', 'Detalles Personales')


<title> @section('title', 'Continuar Compra') </title>
@section('content')
    <div class="flex items-start space-x-3 rounded-md border-l-4 border-neutral-500 bg-neutral-500/15 p-4 text-neutral-50">
        <div class="pt-1">
            <svg class="h-6 w-6 text-neutral-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.21 3.03-1.742 3.03H4.42c-1.532 0-2.492-1.696-1.742-3.03l5.58-9.92zM10 13a1 1 0 110-2 1 1 0 010 2zm-1-4a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </div>
        <div>
            <p class="font-semibold">Revisa tus datos antes de continuar</p>
            <p class="text-sm">
                Antes de finalizar tu compra, asegúrate de que tu información personal y dirección de
                entrega sean correctas.
                Esto nos ayudará a que tu pedido llegue sin contratiempos.
            </p>
        </div>

    </div>
    <div class=" flex flex-col md:flex-row gap-4">
        <section class=" flex-shrink-0 basis-1/2">
            <form class="  " method="POST" id="form-step1" action="{{ route('store-order') }}">
                @csrf
                @method('POST')
                <div
                    class=" max-w-xl mx-auto mt-3 border p-4 py-6 rounded-lg bg-neutral-900 space-y-2 border-neutral-700/80">
                    <span class=" text-neutral-100 font-semibold text-xl pb-3 block ">Datos y Dirección de
                        Entrega</span>
                    <div class=" grid grid-cols-1 sm:grid-cols-2 ">

                        <input type="number" id="quantity" hidden readonly name="quantity" value="{{ $quantity }}"
                            required />
                        <input type="text" id="product_slug" hidden name="product_slug" value="{{ $product->slug }}"
                            required />
                    </div>


                    <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-semibold   text-neutral-200">Email
                                <span class=" text-red-400">*</span>
                            </label>
                            <input type="email" id="email" name="email"
                                class=" border outline-none text-sm cursor-not-allowed  block w-full py-2 px-2.5 bg-neutral-800 rounded-md border-neutral-700 placeholder-gray-400 text-white  focus:border-gray-400"
                                placeholder="name@example.com" required readonly value="{{ $user->email }}" />
                            @error('email')
                                <span class=" block text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-5">

                            <label for="phone" class="block mb-2 text-sm font-semibold   text-neutral-200">Telefono
                                <span class=" text-red-400">*</span>
                            </label>
                            <input type="tel" id="phone" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                placeholder="1234567890" min="0" name="phone" value="{{ $user->phone }}"
                                class=" border outline-none     text-sm      block w-full py-2 px-2.5 bg-neutral-800 rounded-md border-neutral-700 placeholder-gray-400 text-white  focus:border-gray-400"
                                required />
                            @error('phone')
                                <span class=" block text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
                        <div class="mb-5">
                            <label for="first_street" class="block mb-2 text-sm font-semibold  text-neutral-200">Primera
                                Calle
                                <span class=" text-red-400">*</span>
                            </label>
                            <input type="text" id="first_street" placeholder="Calle" name="first_street"
                                value="{{ $user->first_street }}"
                                class=" border outline-none     text-sm      block w-full py-2 px-2.5 bg-neutral-800 rounded-md border-neutral-700 placeholder-gray-400 text-white  focus:border-gray-400"
                                required />
                            @error('first_street')
                                <span class=" block text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-5">
                            <label for="second_street" class="block mb-2 text-sm font-semibold   text-neutral-200">Segunda
                                Calle
                                <span class=" text-neutral-400 text-xs font-light ml-1">(opcional)</span>

                            </label>
                            <input type="text" id="second_street" placeholder="Calle" name="second_street"
                                value="{{ $user->second_street }}"
                                class=" border outline-none      text-sm      block w-full py-2 px-2.5 bg-neutral-800 rounded-md border-neutral-700 placeholder-gray-400 text-white  focus:border-gray-400" />
                            @error('second_street')
                                <span class=" block text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
                        <div class="mb-5">
                            <label for="country" class="block mb-2 text-sm font-semibold  text-neutral-200">Pais
                                <span class=" text-red-400">*</span>
                            </label>
                            <input type="text" id="country" placeholder="México" readonly name="country"
                                value="{{ $user->country ?? 'México' }}"
                                class=" border outline-none     text-sm   cursor-not-allowed    block w-full py-2 px-2.5 bg-neutral-800 rounded-md border-neutral-700 placeholder-gray-400 text-white  focus:border-gray-400"
                                required />
                            @error('country')
                                <span class=" block text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-5">
                            <label for="post_code" class="block mb-2 text-sm font-semibold  text-neutral-200">Código Postal
                                <span class=" text-red-400">*</span>
                            </label>
                            <input type="number" oninput="this.value = this.value.replace(/[^0-9]/g, '');" id="post_code"
                                min="0" placeholder="12345" name="post_code" value="{{ $user->post_code }}"
                                class=" border outline-none      text-sm      block w-full py-2 px-2.5 bg-neutral-800 rounded-md border-neutral-700 placeholder-gray-400 text-white focus:border-gray-400"
                                required />
                            @error('post_code')
                                <span class=" block text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
                        <div class="mb-5">
                            <label for="interior_number" class="block mb-2 text-sm font-semibold  text-neutral-200">Numero
                                Interior
                                <span class=" text-neutral-400 text-xs font-light ml-1">(opcional)</span>
                            </label>
                            <input type="number" id="interior_number"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '');" min="0"
                                placeholder="123" name="interior_number" value="{{ $user->interior_number }}"
                                class=" border outline-none     text-sm      block w-full py-2 px-2.5 bg-neutral-800 rounded-md border-neutral-700 placeholder-gray-400 text-white  focus:border-gray-400" />
                            @error('interior_number')
                                <span class=" block text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-5">
                            <label for="outdoor_number" class="block mb-2 text-sm font-semibold  text-neutral-200">Numero
                                Exterior
                                <span class=" text-neutral-400 text-xs font-light ml-1">(opcional)</span>
                            </label>
                            <input type="number" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                id="outdoor_number" min="0" placeholder="12345" name="outdoor_number"
                                value="{{ $user->outdoor_number }}"
                                class=" border outline-none      text-sm      block w-full py-2 px-2.5 bg-neutral-800 rounded-md border-neutral-700 placeholder-gray-400 text-white focus:border-gray-400" />
                            @error('outdoor_number')
                                <span class=" block text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">

                        <div class="mb-5">
                            <label for="state" class="block mb-2 text-sm font-semibold   text-neutral-200">Estado
                                <span class=" text-red-400">*</span>
                            </label>
                            <select name="state" id="state" value="{{ $user->state }}"
                                class=" border outline-none     text-sm      block w-full py-2 px-2.5 bg-neutral-800 rounded-md border-neutral-700 placeholder-gray-400 text-white focus:border-gray-400"
                                required>
                                <option value="">Selecciona un Estado</option>
                                @foreach ($data as $index => $value)
                                    <option value="{{ $index }}">{{ $index }}</option>
                                @endforeach
                            </select>

                            @error('state')
                                <span class=" block text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="municipality" class="block mb-2 text-sm font-semibold text-neutral-200">Municipio
                                <span class=" text-red-400">*</span>
                            </label>
                            <select required name="municipality" id="municipality" value="{{ $user->municipality }}"
                                class=" border outline-none     text-sm      block w-full py-2 px-2.5 bg-neutral-800 rounded-md border-neutral-700 placeholder-gray-400 text-white  focus:border-gray-400">
                                <option value="">Selecciona un Municipio</option>
                            </select>

                            @error('municipality')
                                <span class=" block text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
                        <div class="mb-5">
                            <label for="address" class="block mb-2 text-sm font-semibold  text-neutral-200">Dirección
                                <span class=" text-red-400">*</span></label>
                            <textarea type="text" id="address" name="address"
                                class=" border outline-none   h-14   text-sm   max-h-14    block w-full p-2.5 bg-neutral-800 rounded-md border-neutral-700 placeholder-gray-400 text-white  focus:border-gray-400"
                                required>
                                {{ old('address', $user->address) }}
                            </textarea>
                            @error('address')
                                <span class=" block text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-5">
                            <label for="indications"
                                class="block mb-2 text-sm font-semibold   text-neutral-200">Indicaciones
                                <span class=" text-red-400">*</span></label>
                            <textarea id="indications" name="indications" required
                                class=" border outline-none   max-h-14     text-gray-900 text-sm      block w-full p-2.5 bg-neutral-800 rounded-md border-neutral-700 placeholder-gray-400 dark:text-white  focus:border-gray-400">
                                {{ old('indications', $user->indications) }}
                            </textarea>

                            @error('indications')
                                <span class=" block text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class=" flex ">
                        <button type="submit"
                            class="text-black w-full   focus:ring-4 focus:outline-none  text-sm  px-5 py-3 text-center bg-white/90 rounded-md    hover:bg-white/80 font-semibold   focus:ring-neutral-800 ">Continuar
                            compra</button>
                        {{--          <button type="button"
                            class="text-white   focus:ring-4 focus:outline-none  font-medium text-sm  px-5 py-1.5 text-center bg-neutral-800 border border-neutral-700 rounded-md hover:bg-neutral-700/50   focus:ring-neutral-800 ">Volver</button> --}}


                    </div>
                </div>

            </form>
        </section>
        <section class="  w-full flex-shrink-0 basis-1/2 ">
            <div class=" max-w-xl mx-auto">
                <div class=" bg-neutral-900 px-2.5 py-3 text-white mt-3 border border-neutral-700/80 rounded-lg ">
                    <span class=" font-semibold text-xl ">Resumen de Compra</span>
                    <span class=" block border-t-[0.6px] border-neutral-400 mt-2 "></span>
                    <span class="  font-semibold block  py-2">Producto</span>
                    <div class=" flex">
                        <ul
                            class="  basis-1/2 flex-shrink-0 list-disc text-sm  flex flex-col font-semibold justify-center space-y-2">
                            <li class=" line-clamp-1">{{ $product->name }}</li>
                            <li class=" line-clamp-1 ">Cantidad</li>
                        </ul>
                        <div
                            class=" basis-1/2 flex-shrink-0 text-sm  flex flex-col justify-center space-y-2 items-center ">


                            <span class=" block"> $ {{ number_format($product->price) }}</span>

                            <span class=" block">{{ $quantity }}</span>


                        </div>
                    </div>
                    <span class=" block border-t-[0.6px] border-neutral-400 mt-2 "></span>
                    <div class=" flex mt-2">
                        <div class="  basis-1/2 flex-shrink-0 ">
                            <span class="  font-semibold block  py-2">Total</span>

                        </div>
                        <div class=" basis-1/2 flex-shrink-0  flex justify-center items-center ">


                            $ {{ number_format($product->price * $quantity) }}


                        </div>
                    </div>



                </div>

            </div>
            <div class="">
                {{-- Mensajes de validación --}}
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-3 rounded mb-4 mt-4">
                        <strong>Por favor corrige los siguientes errores:</strong>
                        <ul class="list-disc list-inside mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Mensaje de error de negocio --}}
                @if (session('error'))
                    <div class="bg-red-600 text-white p-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Mensaje de éxito --}}
                @if (session('success'))
                    <div class="bg-green-500 text-white p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </section>
    </div>

    {{--  <span class="text-white"> {{ $user }}</span> --}}
@endsection
<script defer>
    const state = @json($user->state);
    const municipality = @json($user->municipality);
    const states = @json($data);
    const dom = {
        $: s => document.querySelector(s),
        $$: s => document.querySelectorAll(s),
    }
    document.addEventListener('DOMContentLoaded', function() {
        const stateSelect = dom.$('#state');
        const municipalitySelect = dom.$('#municipality');
        const form = dom.$('#form-step1');
        const required = ["state", "municipality", "address", "indications", "phone", "email", "first_street",
            "country", "post_code", "quantity", "product_slug"
        ];

        const requiredLabels = ["estado", "municipio", "dirección", "indicaciones", "telefono", "email",
            "primera calle",
            "pais", "codigo postal", "cantidad", "producto"
        ];
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(form);
            const iterable = formData.entries();
            const data = Object.fromEntries(iterable);
            let error = false;
            required.forEach(field => {
                if (!data[field]) {
                    notification.error(
                        `El campo ${requiredLabels[required.indexOf(field)]} es obligatorio`
                    );
                    error = true;

                }
            });
            if (error) {
                return;
            }
            form.submit();
        });

        function fillMunicipalities(stateKey) {
            municipalitySelect.innerHTML = '';
            municipalitySelect.innerHTML = '<option value="">Selecciona un Municipio</option>';
            if (!states[stateKey]) return;
            states[stateKey].forEach(m => {
                const option = document.createElement('option');
                option.value = m;
                option.textContent = m;
                municipalitySelect.appendChild(option);
            });
        }
        if (state) {
            stateSelect.value = state;
            fillMunicipalities(state);
            if (municipality) {
                municipalitySelect.value = municipality;
            }
        }
        stateSelect.addEventListener('change', function() {
            const selectedState = this.value;
            fillMunicipalities(selectedState);
        });
    });
</script>
