@extends('layouts.master')

@section('title')
    Detail-Product
@endsection

@section('content')
    <style>
        .quantity-box {
            margin-bottom: 20px
        }

        input[type="number"] {
            /* -moz-appearance: textfield; */
            text-align: center;
            font-size: 40px;
            border: none;
            background-color: #ffffff;
            color: #202030;
        }

        /* input::-webkit-outer-spin-button,
                    input::-webkit-inner-spin-button {
                        -webkit-appearance: none;
                        margin: 0;
                    } */

        button {
            color: #ffffff;
            background-color: #3264fe;
            border: none;
            font-size: 40px;
            cursor: pointer;
        }

        #decrement {
            padding: 10px 3px 10px 20px;
            border-radius: 45px 0 0 45px;
        }

        #increment {
            padding: 10px 20px 10px 3px;
            border-radius: 0 45px 45px 0;
        }
    </style>
    <main class="l-main">
        <section class="featured section" id="shop">
            <h2 class="section-title">Detail Product </h2>

            <div class="featured__container bd-grid">
                <img src="{{ asset($product['img_thumbnail']) }}" alt="" class="
                ">
                <article class="sneaker">
                    <div class="bd-grid">
                        <span class="sneaker__name">{{ $product['name'] }}</span>
                        <span class="sneaker__preci">${{ number_format($product['price_regular'], 2) }}</span>
                        <p style="margin-bottom: 30px ;font-size:20px">{{ $product['overview'] }}</p>
                        <p style="margin-bottom: 30px">{{ $product['content'] }}</p>
                        {{-- increase quantity --}}

                        <form action="{{ url('cart/add') }}" method="GET">
                            <div class="quantity-box">
                                <button id="decrement"> - </button>
                                <input type="number" min="0" max="100" name="quantity" step="1"
                                    value="1" id="my-input">
                                <button id="increment"> + </button>
                            </div>

                            <input type="hidden" name="productID" value="{{ $product['id'] }}">
                            <button class="button">Add To Cart <i class='bx bx-right-arrow-alt button-icon'></i></button>
                        </form>
                    </div>
                </article>
            </div>
        </section>
    </main>
@endsection
