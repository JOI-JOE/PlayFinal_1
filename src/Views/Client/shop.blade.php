@extends('layouts.master')

@section('title')
    Shop
@endsection

@section('content')
    <main class="l-main">
        <section class="featured section" id="shop">
            <h2 class="section-title">All Products</h2>

            <div class="featured__container bd-grid">
                @foreach ($products as $product)
                    <article class="sneaker">
                        <a href="{{ url('products/' . $product['id']) }}">
                            <img src="{{ asset($product['img_thumbnail']) }}" alt="" class="sneaker__img">
                        </a>

                        <a href="{{ url('products/' . $product['id']) }}">
                            <span class="sneaker__name">{{ $product['name'] }}</span>
                        </a>
                        <span class="sneaker__preci">${{ number_format($product['price_regular'], 2) }}</span>

                        <a href="{{ url('cart/add') }}?quantity=1&productID={{ $product['id'] }}" class="button-light">Add
                            to
                            Cart <i class='bx bx-right-arrow-alt button-icon'>
                            </i>
                        </a>
                    </article>
                @endforeach
            </div>

            <div class="sneaker__pages bd-grid">
                <div>
                    <span class="sneaker__pag">1</span>
                    <span class="sneaker__pag">2</span>
                    <span class="sneaker__pag">3</span>
                    <span class="sneaker__pag">4</span>
                    <span class="sneaker__pag">&#8594;</span>
                </div>
            </div>
        </section>
    </main>
@endsection
