<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- yield dùng để nhồi khoảng chống  --}}
    <title>@yield('title')</title>

    {{-- LINK TAILWIND --}}
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <section class="container max-w-screen-lg mx-auto flex items-center justify-between py-4 mb-8">
        <img src="https://i.redd.it/logo-breakdown-of-anthony-edwards-new-shoe-logo-very-well-v0-jll4yz59v9qb1.png?width=1080&format=png&auto=webp&s=96a8bffa2d539237770756c5bcaa34234d43c7f0"
            alt="logo" width="70" />
        <ul class="flex gap-8 font-medium text-xl">
            <li class="hover:text-amber-500"><a href="{{ url('admin') }}">Home</a></li>
            <li class="hover:text-amber-500"><a href="{{ url('admin/products') }}">Shop</a></li>
        </ul>
    </section>

    <h1 class="text-3xl font-bold text-center mb-8">@yield('title')</h1>
    <!-- End Navigation Bar -->

    <section class="container max-w-screen-lg mx-auto flex items-center justify-between py-4 mb-8">
        @yield('content')
    </section>
</body>

</html>
