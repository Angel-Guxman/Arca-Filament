@extends('layouts.shopping')

@section('title', 'Checkout')

@section('content')
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
        {{-- Left Column --}}
        <div class="space-y-6 lg:col-span-2">
            <h1 class="text-3xl font-bold text-gray-200">Checkout</h1>

            {{-- Booking on Hold --}}
            <div class="flex items-start space-x-3 rounded-md border-l-4 border-green-500 bg-green-500/15 p-4 text-green-50">
                <div class="pt-1">
                    <svg class="h-6 w-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.21 3.03-1.742 3.03H4.42c-1.532 0-2.492-1.696-1.742-3.03l5.58-9.92zM10 13a1 1 0 110-2 1 1 0 010 2zm-1-4a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold">Your Booking is on Hold</p>
                    <p class="text-sm">We hold your booking until Feb 14, 12:00 AM. If your reserve change, we will get back
                        to you.</p>
                </div>
            </div>

            {{-- Book Information --}}
            <div class="rounded-lg border border-gray-200 text-white bg-neutral-950 p-6 shadow-sm">
                <h2 class="mb-4 text-xl font-semibold">Datos de dirección</h2>
                {{--    <div class="mb-6 flex items-center space-x-3 rounded-md bg-green-100 p-3 text-green-800">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>Congratulations! We have sent your book details to the vehicle owner.</span>
                </div> --}}
                <div class="grid grid-cols-1 gap-4 text-sm md:grid-cols-3">
                    <div>
                        <p class="text-gray-400">Full Name</p>
                        <p class="font-semibold">Ahmed Bin Ali</p>
                    </div>
                    <div>
                        <p class="text-gray-400">Email</p>
                        <p class="font-semibold">ahmedbinali@gmail.com</p>
                    </div>
                    <div>
                        <p class="text-gray-400">Phone Number</p>
                        <p class="font-semibold">+221402040785</p>
                    </div>
                </div>
            </div>

            {{-- Payment Detail --}}
            <div class="rounded-lg border border-gray-200 text-white bg-neutral-950 p-6 shadow-sm">
                <h2 class="mb-2 text-xl font-semibold">Payment Detail</h2>
                <p class="mb-6 text-sm text-gray-200">Please fill out the form below. Enter your card account details.</p>
                <div class="space-y-4">
                    <div>
                        <label for="card-number" class="block text-sm font-medium text-gray-400">Card Number</label>
                        <div class="relative mt-1">
                            <input type="text" id="card-number"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                value="1243 - 2133 - 9832 - 3200">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <span class="text-xs font-bold text-blue-600">VISA</span>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-3 text-black">
                        <div class="grid grid-cols-2 gap-4 md:col-span-2">
                            <div>
                                <label for="expire-date" class="block text-sm font-medium text-gray-400">Expire Date</label>
                                <div class="mt-1 flex space-x-2">
                                    <select
                                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option>12</option>
                                    </select>
                                    <select
                                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option>2030</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="cvc" class="block text-sm font-medium text-gray-400">CVC/CVV</label>
                            <input type="text" id="cvc"
                                class="mt-1 w-full rounded-lg text-black border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                value="453">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Cancellation Policy --}}
            <div class="flex items-start space-x-4 rounded-lg bg-gray-300/5 text-white/90 p-6">
                <div class="pt-1">
                    <svg class="size-6 text-yellow-500 " fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold ">Cancelation Policy</h3>
                    <p class="mt-1 text-sm  tracking-wider ">At Garazi, we understand that plans can change unexpectedly.
                        That's why we've crafted our cancellation policy to provide you with flexibility and peace of mind.
                        When you book a car with us, you have the freedom to modify or cancel your reservation without
                        incurring any cancellation fees up to 12 hours/days before your scheduled pick-up time.</p>
                    <a href="#" class="mt-2 inline-block text-sm font-semibold text-blue-600 hover:underline">See
                        more details</a>
                </div>
            </div>
        </div>

        {{-- Right Column (Summary) --}}
        <div class="lg:col-span-1">
            <div class="sticky top-8 space-y-6 rounded-lg border border-gray-200 text-white bg-neutral-950 p-6 shadow-sm">
                <div>
                    <h2 class="text-xl font-semibold">Summary</h2>
                    <div class="mt-4 space-y-3 text-sm">
                        <div class="flex justify-between"><span class="text-gray-400">Total Vehicles</span><span
                                class="font-medium">1 Vehicle</span></div>
                        <div class="flex justify-between"><span class="text-gray-400">Pickup Location</span><span
                                class="text-right font-medium">Jl. Raya Ponorogo - Trenggalek, Bancangan</span></div>
                        <div class="flex justify-between"><span class="text-gray-400">Pickup Date</span><span
                                class="font-medium">Mon, 4 Feb 2024 - 10:00</span></div>
                        <div class="flex justify-between"><span class="text-gray-400">Return Date</span><span
                                class="font-medium">Thu, 8 Feb 2024 - 10:00</span></div>
                    </div>
                </div>
                <hr>
                <div>
                    <h2 class="text-xl font-semibold">Price Details</h2>
                    <div class="mt-4 space-y-3 text-sm">
                        <div class="flex justify-between"><span class="text-gray-400">Trip Price</span><span
                                class="font-medium">USD 230/day</span></div>
                        <div class="flex justify-between"><span class="text-gray-400">Delivery fee</span><span
                                class="font-medium">USD 50</span></div>
                        <div class="flex justify-between"><span class="text-gray-400">Duration</span><span
                                class="font-medium">4 days</span></div>
                        <div class="flex justify-between"><span class="text-gray-400">Tax</span><span
                                class="font-medium">USD 0</span></div>
                    </div>
                </div>
                <hr>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-semibold">Total</span>
                    <span class="text-2xl font-bold text-blue-600">MXN 1,850.00</span>
                </div>
                <div class="text-sm">
                    <div class="flex items-start space-x-2">
                        <input type="checkbox" id="terms"
                            class="mt-1 h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" checked>
                        <label for="terms" class="text-gray-200">By clicking this, I agree to Garazi <a href="#"
                                class="font-semibold text-blue-600 hover:underline">Terms & Conditions</a> and <a
                                href="#" class="font-semibold text-blue-600 hover:underline">Privacy
                                Policy</a></label>
                    </div>
                </div>
                <button
                    class="w-full rounded-lg bg-blue-600 py-3 font-semibold text-white transition-colors hover:bg-blue-700">
                    Pay for My Booking
                </button>
            </div>
        </div>
    </div>
@endsection
