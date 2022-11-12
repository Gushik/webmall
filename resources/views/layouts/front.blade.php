<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- all css here -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/icofont.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bundle.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{--    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>--}}
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- header start -->
<header>
    <div class="header-top-wrapper-2 border-bottom-2">
        <div class="header-info-wrapper pl-200 pr-200">
            <div class="header-contact-info">
                <ul>
                    <li><i class="pe-7s-call"></i> +38 067 822 15 99</li>
                    <li><i class="pe-7s-mail"></i> <a
                            href="https://mail.google.com/mail/?view=cm&fs=1&to=roztoka@gmail.com">roztoka@gmail.com</a>
                    </li>
                </ul>
            </div>


            <div class="electronics-login-register">
                <ul>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Вхід') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Реєстрація') }}</a>
                            </li>
                        @endif
                    @else
                        <li><a href="{{route('auth.user',  Auth::user()->id)}}"><i
                                    class="pe-7s-users"></i>{{ Auth::user()->name }}</a></li>

                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            {{ __('| Вийти') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>


                        @if (Auth::user()->role_id == 1)
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('voyager.dashboard') }}">
                                    {{ __('Адмін панель') }}
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->role_id == 2)
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('shops.create') }}">
                                    Зареєструвати магазин
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->role_id == 3)
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('voyager.dashboard') }}">
                                    Перейти до магазину
                                </a>
                            </li>
                        @endif


                    @endguest
                    <li><a href="#"><i class="pe-7s-flag"></i>UA</a></li>
                    <li><a class="border-none" href="#"><span>₴</span>UAH</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container">
            {{--повідомлення про успішну оплату товарів--}}
            @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                </div>
            @endif
            {{--повідомлення про помилку--}}
            @if(session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
            @endif
        </div>
    </div>
    <div class="header-bottom pt-40 pb-30 clearfix">
        <div class="header-bottom-wrapper pr-200 pl-200">
            <div class="logo-3">
                <a href="{{route('home')}}">
                    <img src="{{asset('assets/img/logo/logo3.png')}}" alt="Roztoka">
                </a>
            </div>
            {{--Пошук--}}
            <div class="categories-search-wrapper">
                <div class="categories-wrapper">
                    <form action="{{route('products.search')}}" method="get">
                        @csrf
                        <input name="query" placeholder="Я шкуаю..." type="text">
                        <button type="submit"> Знайти</button>
                    </form>
                </div>
            </div>
            {{--Пошук--}}
            {{--Kошик--}}
            <div class="categories-cart same-style">
                <div class="same-style-icon">
                    <a href="{{ route('cart.index') }}"><i class="pe-7s-cart"></i></a>
                </div>
                <div class="same-style-text">
                    <a href="{{ route('cart.index') }}">В кошику -
                        @auth
                            {{Cart::session(auth()->id())->getContent()->count()}}
                        @endauth
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->


@yield('content')


<footer class="footer-area">
    <div class="footer-middle black-bg-2 pt-35 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="footer-services-wrapper mb-30">
                        <div class="footer-services-icon">
                            <i class="pe-7s-car"></i>
                        </div>
                        <div class="footer-services-content">
                            <h3>Free Shipping</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="footer-services-wrapper mb-30">
                        <div class="footer-services-icon">
                            <i class="pe-7s-shield"></i>
                        </div>
                        <div class="footer-services-content">
                            <h3>Money Guarentee</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="footer-services-wrapper mb-30">
                        <div class="footer-services-icon">
                            <i class="pe-7s-headphones"></i>
                        </div>
                        <div class="footer-services-content">
                            <h3>Online Support</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom  black-bg pt-25 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="copyright f-right mrg-5">
                        <p>
                            Copyright ©
                            <a href="https://lutsk.itstep.org/">StepIT Lutsk</a> 2022 . All Right Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- all js here -->
<script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/ajax-mail.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>
