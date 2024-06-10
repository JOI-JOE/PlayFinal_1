@extends('layouts.master')

@section('title')
    Cart
@endsection

@section('content')
    <main>
        <div class="container mx-auto mt-10">
            <div class="sm:flex shadow-md my-10">
                <div class="  w-full  sm:w-3/4 bg-white px-10 py-10">
                    <div class="flex justify-between border-b pb-8">
                        <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                        <h2 class="font-semibold text-2xl">Count Items</h2>
                    </div>
                    {{-- item product --}}
                    @if (!empty($_SESSION['cart']) || !empty($_SESSION['cart-' . $_SESSION['user']['id']]))
                        @php
                            $cart = $_SESSION['cart'] ?? $_SESSION['cart-' . $_SESSION['user']['id']];
                        @endphp
                        @foreach ($cart as $item)
                            <div class="md:flex items-strech py-8 md:py-10 lg:py-8 border-t border-gray-50">
                                <div class="md:w-4/12 2xl:w-1/4 w-full">
                                    <img src="{{ asset($item['img_thumbnail']) }}" alt="Black Leather Purse"
                                        class="h-full object-center object-cover md:block hidden" />
                                    <img src="{{ asset($item['img_thumbnail']) }}" alt="Black Leather Purse"
                                        class="md:hidden w-full h-full object-center object-cover" />
                                </div>
                                <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                                    <div class="flex items-center justify-between w-full">
                                        <p class="text-base font-black leading-none text-gray-800">{{ $item['name'] }}
                                        </p>

                                        <p class="py-2 px-4 border border-gray-200 mr-6 focus:outline-none ">
                                            @php
                                                $url = url('cart/quantityDec') . '?productID=' . $item['id'];

                                                if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                                    $url .= '&cartID=' . $_SESSION['cart_id'];
                                                }
                                            @endphp
                                            <a href="{{ $url }}" class="font-base text-xl">-</a>
                                            <input type="text" value="{{ $item['quantity'] }}"
                                                class="w-12 text-center font-semibold text-xl">
                                            @php
                                                $url = url('cart/quantityInc') . '?productID=' . $item['id'];

                                                if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                                    $url .= '&cartID=' . $_SESSION['cart_id'];
                                                }
                                            @endphp
                                            <a href="{{ $url }}" class="font-semibold text-xl">+</a>
                                        </p>
                                    </div>
                                    <p class="text-xs leading-3 text-gray-600 pt-2">Height: 10 inches</p>
                                    <p class="text-xs leading-3 text-gray-600 py-4">Color: Black</p>
                                    <p class="w-96 text-xs leading-3 text-gray-600">Composition: 100% calf leather</p>
                                    <div class="flex items-center justify-between pt-5">
                                        <div class="flex itemms-center">
                                            <p class="text-xs leading-3 underline text-gray-800 cursor-pointer">Add to
                                                favorites
                                            </p>
                                            @php
                                                $url = url('cart/remove') . '?productID=' . $item['id'];
                                                if (isset($_SESSION['user'])) {
                                                    if (!empty($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                                        $url .= '&cartID=' . $_SESSION['cart_id'];
                                                    }
                                                }
                                            @endphp
                                            <a href="{{ $url }}" onclick="return confirm('Are you sure?')"
                                                class="text-xs leading-3 underline text-red-500 pl-5 cursor-pointer">Remove</a>
                                            </a>
                                        </div>
                                        <p class="text-xl font-black leading-none text-gray-800">
                                            <!-- Calculate the price based on whether the regular price is set or the sale price -->
                                            <!-- If regular price is set, use that, otherwise use the sale price -->
                                            <!-- Format the price to 2 decimal places -->
                                            ${{ $item['quantity'] * ($item['price_regular'] ?: $item['price_sale']) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif


                    <div class="md:flex items-strech py-8 md:py-10 lg:py-8 border-t border-gray-50">
                        <div class="md:w-4/12 2xl:w-1/4 w-full">
                            {{-- <img src="https://i.ibb.co/6gzWwSq/Rectangle-20-1.png" alt="Black Leather Purse" --}}
                            {{-- class="h-full object-center object-cover md:block hidden" /> --}}
                        </div>

                    </div>

                    <a href="#" class="flex font-semibold text-indigo-600 text-sm mt-10">
                        <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                            <path
                                d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                        </svg>
                        Continue Shopping
                    </a>
                </div>
                <div id="summary" class=" w-full   sm:w-1/4   md:w-1/2     px-8 py-10">
                    <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                    {{-- count tiem  --}}
                    <div class="flex justify-between mt-10 mb-5">
                        <span class="font-semibold text-xl uppercase">TOTAL</span>
                        <span class="font-bold text-xl text-red-500">
                            ${{ $_SESSION['total_item'] }}
                        </span>
                    </div>
                    {{-- <div>
                        <label class="font-medium inline-block mb-3 text-sm uppercase">
                            Shipping
                        </label>
                        <select class="block p-2 text-gray-600 w-full text-sm">
                            <option>Standard shipping - $10.00</option>
                        </select>
                    </div> --}}
                    {{-- FORM SHIPPING --}}
                    <form action="{{ url('order/checkout') }} " method="POST">
                        <div class="mt-10">
                            <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">
                                Name
                            </label>
                            <input type="text" id="promo" placeholder="Enter your name"
                                value="{{ $_SESSION['user']['name'] ?? null }}" name="user_name"
                                class="p-2 text-sm w-full outline outline-2 outline-gray-300" />
                        </div>
                        <div class="my-10">
                            <label for="email" class="font-semibold inline-block mb-3 text-sm uppercase">
                                Email
                            </label>
                            <input type="email" id="email" placeholder="Enter your email"
                                value="{{ $_SESSION['user']['email'] ?? null }}" name="user_email"
                                class="p-2 text-sm w-full outline outline-2 outline-gray-300" />
                        </div>
                        <div class="my-10">
                            <label for="phone" class="font-semibold inline-block mb-3 text-sm uppercase">
                                Phone
                            </label>
                            <input type="tel" id="phone" placeholder="Enter your phone"
                                value="{{ $_SESSION['user']['phone'] ?? null }}" name="user_phone"
                                class="p-2 text-sm w-full outline outline-2 outline-gray-300" />
                        </div>
                        <div class="my-10">
                            <label for="address" class="font-semibold inline-block mb-3 text-sm uppercase">
                                Address
                            </label>
                            <input type="text" id="address" placeholder="Enter your address"
                                value="{{ $_SESSION['user']['address'] ?? null }} " name="user_address"
                                class="p-2 text-sm w-full outline outline-2 outline-gray-300" />

                        </div>
                        <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase">
                            Apply
                        </button>
                    </form>
                    {{-- END FORM SHIPPING --}}

                    <div class="border-t mt-8">
                        <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                            <span>Total cost</span>
                            <span>$600</span>
                        </div>
                        <button
                            class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">
                            Checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
