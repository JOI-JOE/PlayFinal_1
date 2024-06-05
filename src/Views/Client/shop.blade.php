<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="{{ asset('assets/client/Css/style.css') }}">
        
        <!-- ===== BOX ICONS ===== -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        
        <title>Responsive Ecommerce Website Sneakers</title>
    </head>
    <body>

      <!-- ===== HEADER ===== -->
    <header class="l-header" id="header">
        <!-- nav -->
        <nav class="nav bd-grid">
            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bxs-grid'></i>
            </div>

            <a href="#" class="nav__logo">MOON</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="{{ url('') }}" class="nav__link active">Home</a></li>
                    <li class="nav__item"><a href="#featured" class="nav__link">Fetured</a></li>
                    <li class="nav__item"><a href="#women" class="nav__link">Women</a></li>
                    <li class="nav__item"><a href="#new" class="nav__link">New</a></li>
                    <li class="nav__item"><a href="{{ url('products') }}" class="nav__link">Shop</a></li>
                </ul>
            </div>

            <div class="nav__shop">
                <i class='bx bx-shopping-bag'></i>
            </div>
        </nav>
    </header>

        <main class="l-main">
            <section class="featured section" id="shop">
                <h2 class="section-title">All Products</h2>
    
                <div class="featured__container bd-grid">
                    <article class="sneaker">
                        <img src="{{ asset('assets/client/img/featured1.png') }}" alt="" class="sneaker__img">
                        <span class="sneaker__name">Nike Jordan</span>
                        <span class="sneaker__preci">$149.99</span>
                        <a href="#" class="button-light">Add to Cart <i class='bx bx-right-arrow-alt button-icon'></i></a>
                    </article>
    
                    <article class="sneaker">
                        <img src="assets/img/featured2.png" alt="" class="sneaker__img">
                        <span class="sneaker__name">Nike Free RN</span>
                        <span class="sneaker__preci">$149.99</span>
                        <a href="#" class="button-light">Add to Cart <i class='bx bx-right-arrow-alt button-icon'></i></a>
                    </article>
    
                    <article class="sneaker">
                        <img src="assets/img/featured3.png" alt="" class="sneaker__img">
                        <span class="sneaker__name">Nike Free RN</span>
                        <span class="sneaker__preci">$149.99</span>
                        <a href="#" class="button-light">Add to Cart <i class='bx bx-right-arrow-alt button-icon'></i></a>
                    </article>

                    <article class="sneaker">
                        <img src="assets/img/new2.png" alt="" class="sneaker__img">
                        <span class="sneaker__name">Nike Sply</span>
                        <span class="sneaker__preci">$7.99</span>
                        <a href="#" class="button-light">Add to Cart <i class='bx bx-right-arrow-alt button-icon'></i></a>
                    </article>

                    <article class="sneaker">
                        <img src="assets/img/new3.png" alt="" class="sneaker__img">
                        <span class="sneaker__name">Nike Sply</span>
                        <span class="sneaker__preci">$7.99</span>
                        <a href="#" class="button-light">Add to Cart <i class='bx bx-right-arrow-alt button-icon'></i></a>
                    </article>

                    <article class="sneaker">
                        <img src="assets/img/new4.png" alt="" class="sneaker__img">
                        <span class="sneaker__name">Nike Sply</span>
                        <span class="sneaker__preci">$7.99</span>
                        <a href="#" class="button-light">Add to Cart <i class='bx bx-right-arrow-alt button-icon'></i></a>
                    </article>

                    <article class="sneaker">
                        <img src="assets/img/new5.png" alt="" class="sneaker__img">
                        <span class="sneaker__name">Nike Sply</span>
                        <span class="sneaker__preci">$7.99</span>
                        <a href="#" class="button-light">Add to Cart <i class='bx bx-right-arrow-alt button-icon'></i></a>
                    </article>
                </div>

                <div class="sneaker__pages bd-grid">
                    <div>
                        @for($i = 1; $i <= $totalPage; $i++)
                            <span class="sneaker__pag"><?= $i ?></span>
                        @endfor
                        <span class="sneaker__pag">&#8594;</span>
                    </div>
                </div>
            </section>
        </main>

        <!--===== FOOTER =====-->
         <footer class="footer section">
        <div class="footer__container bd-grid">
            <div class="footer__box">
                <h3 class="footer__title">MOON</h3>
                <p class="footer__description">New collection of shoes 2023</p>
            </div>

            <div class="footer__box">
                <h3 class="footer__title">EXPLORE</h3>
                <ul>
                    <li><a href="#home" class="footer__link">Home</a></li>
                    <li><a href="#featured" class="footer__link">Featured</a></li>
                    <li><a href="#women" class="footer__link">Women</a></li>
                    <li><a href="#new" class="footer__link">New</a></li>
                </ul>
            </div>

            <div class="footer__box">
                <h3 class="footer__title">SUPPORT</h3>
                <ul>
                    <li><a href="#" class="footer__link">Prodcut Help</a></li>
                    <li><a href="#" class="footer__link">Customer Care</a></li>
                    <li><a href="#" class="footer__link">Athorized</a></li>
                </ul>
            </div>

            <div class="footer__box">
                <a href="#" class="footer__social"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="footer__social"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="footer__social"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="footer__social"><i class="bx bxl-google"></i></a>
            </div>
        </div>

        <p class="footer__copy">&#169; 2023 NGODANGHAU. All right reserved</p>
    </footer>

        <!--===== MAIN JS =====-->
        <script src="assets/JS/main.js"></script>
        
    </body>
</html>