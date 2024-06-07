    <!-- ===== HEADER ===== -->
    <header class="l-header" id="header">
        <!-- nav -->
        <nav class="nav bd-grid">
            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bxs-grid'></i>
            </div>

            <a href="{{ url('') }}" class="nav__logo">MOON</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#home" class="nav__link active">Home</a></li>
                    <li class="nav__item"><a href="#featured" class="nav__link">Fetured</a></li>
                    <li class="nav__item"><a href="#women" class="nav__link">Women</a></li>
                    <li class="nav__item"><a href="#new" class="nav__link">New</a></li>
                    <li class="nav__item"><a href="{{ url('products') }}" class="nav__link">Shop</a></li>
                </ul>
            </div>

            <div class="nav__shop">

                <a href="{{ url('cart/detail') }}">
                    <i class='bx bx-shopping-bag'></i>
                </a>
            </div>
            @if (!is_logged())
                <a class="nav__item button-light" href="{{ url('auth/login') }}">Login</a>
            @endif

            @if (is_logged())
                <a class="nav__item button-light" href="{{ url('auth/logout') }}">Logout</a>
            @endif
        </nav>
    </header>
