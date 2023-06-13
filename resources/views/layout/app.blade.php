<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="" href="../xSalah.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-WVkioqNdBmNc4bUkUX3sW5GAUx0E/w0a0tO75hmTwkUZ28P/XS3NnZeyl+G4b2n0T8zZtr56TVxy+htDZaasbQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;700&family=Roboto:wght@300;400&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Nunito:wght@400;500;700&family=Roboto:wght@300;400&display=swap"
        rel="stylesheet">
    <title>@yield('title')</title>

    <style>
        .active {
            color: #26292e;
        }
    </style>
</head>

<body style="margin: 0">
    <header>
        <nav>
            <ul
                style="color: #98a3a4;margin: 0; padding: 0; display: flex; justify-content: space-around; align-items: center;list-style: none; font-weight: 700;font-family: 'Nunito', sans-serif;">
                <img style="width: 80px" src="{{ asset('images/xSalah.png') }}" alt="logo"></li>
                <li>
                    <a class="nav-link{{ Request::is('/') ? ' active' : '' }}" href="/">Home</a>
                </li>
                @auth
                    <li>
                        <a class="nav-link{{ Request::is('product*') ? ' active' : '' }}"
                            href="{{ route('product.index') }}">Products</a>
                    </li>
                    <a class="nav-link dropdown-toggle{{ request()->is('category*') ? ' active' : '' }}" href=""
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categoriesApp as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                    <li>
                        <a class="nav-link{{ Request::is('contact*') ? ' active' : '' }}"
                            href="{{ route('contact.index') }}">Contact</a>
                    </li>
                    <li>
                        <a class="nav-link{{ Request::is('cart*') ? ' active' : '' }}" href="{{ route('cart.index') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span style="position: relative; right: 8px; bottom:10px; font-size: 12px"
                                class="bg-danger rounded-circle px-1 text-white">{{ $cartCount }}
                            </span>
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li>
                        <a class="nav-link{{ Request::is('login*') ? ' active' : '' }}"
                            href="{{ route('auth.create') }}">Login</a>
                    </li>
                    <li>
                        <a class="nav-link{{ Request::is('register*') ? ' active' : '' }}"
                            href="{{ route('register.create') }}">Register</a>
                    </li>
                @endguest
            </ul>
        </nav>
    </header>
    <div>
        @yield('content')
    </div>
    @yield('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <footer class="footer bg-dark" style="margin-top: 351px">
        <div class="container d-flex justify-content-center align-items-center py-3">
            <span class="text-light">
                &copy; {{ date('Y') }} Your Website Name. All rights reserved. | Created by xSalah |
                <a href="https://github.com/xSalah03" target="_blank"><i class="fa-brands fa-github text-secondary"
                        style="font-size: 18px"></i></a>
                <a href="https://www.instagram.com/xsalah03" target="_blank"><i
                        class="fa-brands fa-instagram text-danger" style="font-size: 18px"></i></a>
                <a href="https://www.facebook.com/xSalah.03" target="_blank"><i
                        class="fa-brands fa-facebook text-primary" style="font-size: 18px"></i></a>
            </span>
        </div>
    </footer>

</body>

</html>
