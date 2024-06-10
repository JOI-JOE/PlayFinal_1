@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <main class="l-main">
        <!-- ===== HOME ===== -->
        <section class="home" id="home">
            <div class="home__container bd-grid">
                <div class="home__sneaker">
                    <div class="home__shape"></div>
                    <img src="assets/img/imghome.png" alt="" class="home__img">
                </div>

                <div class="home__data">
                    <span class="home__new">New in</span>
                    <h1 class="home__title">YEEZY BOOST <br> SPLY - 350</h1>
                    <p class="home__description">Explore the new collection of sneakers</p>
                    <a href="#" class="button">Explore now</a>
                </div>
            </div>
        </section>

        <!-- ===== FEATURED ===== -->
        <section class="featured section" id="featured">
            <h2 class="section-title">FEATURED</h2>

            <div class="featured__container bd-grid">
                <article class="sneaker">
                    <div class="sneaker__sale">Sale</div>
                    <img src="assets/img/featured1.png" alt="" class="sneaker__img">
                    <span class="sneaker__name">Nike Jordan</span>
                    <span class="sneaker__preci">$149.99</span>
                    <a href="#" class="button-light">Add to Cart <i class='bx bx-right-arrow-alt button-icon'></i></a>
                </article>

                <article class="sneaker">
                    <div class="sneaker__sale">Sale</div>
                    <img src="assets/img/featured1.png" alt="" class="sneaker__img">
                    <span class="sneaker__name">Nike Jordan</span>
                    <span class="sneaker__preci">$149.99</span>
                    <a href="#" class="button-light">Add to Cart <i class='bx bx-right-arrow-alt button-icon'></i></a>
                </article>



                <article class="sneaker">
                    <div class="sneaker__sale">Sale</div>
                    <img src="assets/img/featured3.png" alt="" class="sneaker__img">
                    <span class="sneaker__name">Nike Free RN</span>
                    <span class="sneaker__preci">$149.99</span>
                    <a href="#" class="button-light">Add to Cart <i class='bx bx-right-arrow-alt button-icon'></i></a>
                </article>
            </div>
        </section>

        <!-- ===== COLLECTION ===== -->
        <section class="collection section">
            <div class="collection__container bd-grid">
                <div class="collection__card">
                    <div class="collection__data">
                        <h3 class="collection__name">Nike</h3>
                        <p class="collection__description">New collection 2020</p>
                        <a href="#" class="button-light">Buy now <i class='bx bx-right-arrow-alt button-icon'></i></a>
                    </div>

                    <img src="assets/img/collection1.png" alt="" class="collection__img">
                </div>

                <div class="collection__card">
                    <div class="collection__data">
                        <h3 class="collection__name">Addidas</h3>
                        <p class="collection__description">New collection 2020</p>
                        <a href="#" class="button-light">Buy now <i class='bx bx-right-arrow-alt button-icon'></i></a>
                    </div>

                    <img src="assets/img/collection2.png" alt="" class="collection__img">
                </div>
            </div>
        </section>

        <!-- ===== WOMEN SNEAKERS ===== -->
        <section class="women section" id="women">
            <h2 class="section-title">WOMEN SNEAKERS</h2>

            <div class="women__container bd-grid">
                <article class="sneaker">
                    <img src="assets/img/women1.png" alt="" class="sneaker__img">
                    <span class="sneaker__name">Nike Free RN</span>
                    <span class="sneaker__preci">$149.99</span>
                    <a href="#" class="button-light">Add to Cart <i class='bx bx-right-arrow-alt button-icon'></i></a>
                </article>

                <article class="sneaker">
                    <img src="assets/img/women2.png" alt="" class="sneaker__img">
                    <span class="sneaker__name">Nike Free TN</span>
                    <span class="sneaker__preci">$149.99</span>
                    <a href="#" class="button-light">Add to Cart <i class='bx bx-right-arrow-alt button-icon'></i></a>
                </article>

                <article class="sneaker">
                    <img src="assets/img/women3.png" alt="" class="sneaker__img">
                    <span class="sneaker__name">Nike GS Pink</span>
                    <span class="sneaker__preci">$149.99</span>
                    <a href="#" class="button-light">Add to Cart <i
                            class='bx bx-right-arrow-alt button-icon'></i></a>
                </article>

                <article class="sneaker">
                    <img src="assets/img/women4.png" alt="" class="sneaker__img">
                    <span class="sneaker__name">Nike Get 5</span>
                    <span class="sneaker__preci">$149.99</span>
                    <a href="#" class="button-light">Add to Cart <i
                            class='bx bx-right-arrow-alt button-icon'></i></a>
                </article>
            </div>
        </section>

        <!-- ===== OFFER ===== -->
        <section class="offer section">
            <div class="offer__container bd-grid">
                <div class="offer__data">
                    <h3 class="offer__title">50% OFF</h3>
                    <p class="offer__description">In Adidas Superstar sneakers</p>
                    <a href="#" class="button">Shop Now</a>
                </div>

                <img src="assets/img/offert.png" alt="" class="offer__img">
            </div>
        </section>

        <!-- ===== NEW COLLECTION ===== -->
        <section class="new section" id="new">
            <h2 class="section-title">NEW COLLECTION</h2>

            <div class="new__container bd-grid">
                <div class="new__mens">
                    <img src="assets/img/new1.png" alt="" class="new__mens-img">
                    <h3 class="new__title">Mens Shoes</h3>
                    <span class="new__preci">From $79.99</span>
                    <a href="#" class="button-light">View Collection <i
                            class='bx bx-right-arrow-alt button-icon'></i></a>
                </div>

                <div class="new__sneaker">
                    <div class="new__sneaker-card">
                        <img src="assets/img/new2.png" alt="" class="new__sneaker-img">
                        <div class="new__sneaker-overlay">
                            <a href="#" class="button">Add to Cart</a>
                        </div>
                    </div>

                    <div class="new__sneaker-card">
                        <img src="assets/img/new3.png" alt="" class="new__sneaker-img">
                        <div class="new__sneaker-overlay">
                            <a href="#" class="button">Add to Cart</a>
                        </div>
                    </div>

                    <div class="new__sneaker-card">
                        <img src="assets/img/new4.png" alt="" class="new__sneaker-img">
                        <div class="new__sneaker-overlay">
                            <a href="#" class="button">Add to Cart</a>
                        </div>
                    </div>

                    <div class="new__sneaker-card">
                        <img src="assets/img/new5.png" alt="" class="new__sneaker-img">
                        <div class="new__sneaker-overlay">
                            <a href="#" class="button">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== NEW COLLECTION ===== -->
        <section class="newsletter section">
            <div class="newsletter__container bd-grid">
                <div>
                    <h3 class="newsletter__title">Subscribe And Get <br> 10% OFF</h3>
                    <p class="newsletter__description">Get 10% discount for all products</p>
                </div>


                <form action="#" class="newsletter__subscribe">
                    <input type="text" class="newsletter__input" placeholder="@email.com">
                    <a href="#" class="button">Subscribe</a>
                </form>
            </div>
        </section>
    </main>
@endsection
