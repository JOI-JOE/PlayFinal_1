<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ==== CSS ==== -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}">
    
    <!-- ==== BOX ICONS ==== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>MOON</title>
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
                    <li class="nav__item"><a href="#home" class="nav__link active">Home</a></li>
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