<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/assets/css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="/assets/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="/assets/css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/assets/css/style.css"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/style-home.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +380 99 23 33 469</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> Луцьк</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                <li><a href="{{route('my_account')}}"><i class="fa fa-user-o"></i> Мій кабінет</a></li>
                @auth
                    <li>
                        <form action=" {{ url('/logout') }} " method="POST">
                            @csrf
                            <input type="submit" value="Вийти"/>
                        </form>
                    </li>
                @else

                    <li>
                        <a class="popup-open" href="#">Логін</a>
                        <div class="popup-black">
                            <div class="popup">
                                @include('auth.login')

                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{url('/register')}}">Зареєструватися</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{route('home')}}" class="logo">
                            <img src="/assets/img/photo_r25.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{route('products.search')}}" method="GET">
{{--                            <select class="input-select">--}}

{{--                                @foreach($categories as $category)--}}
{{--                                    <optgroup label="{{$category->name}}">--}}
{{--                                        @php--}}
{{--                                            $children = $category->children;--}}
{{--                                        @endphp--}}
{{--                                        @if($children->isNotEmpty())--}}

{{--                                            @foreach ($children as $child)--}}

{{--                                                <option value="">--}}
{{--                                                    {{$child->name}}--}}
{{--                                                </option>--}}

{{--                                            @endforeach--}}

{{--                                        @endif--}}

{{--                                        @endforeach--}}

{{--                                    </optgroup>--}}
{{--                            </select>--}}
                            <input name="input" placeholder="Я шукаю...">
                            <button class="search-btn">Пошук</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Список бажань</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>

                                <a href="{{ route('cart.index') }}">Кошик <br>

                                    @auth
                                        {{Cart::session(auth()->id())->getContent()->count()}}
                                    @else
                                       0
                                    @endauth

                                </a>
                            </a>
{{--                            <div class="cart-dropdown">--}}
{{--                                <div class="cart-list">--}}
{{--                                    <div class="product-widget">--}}
{{--                                        <div class="product-img">--}}
{{--                                            <img src="assets/img/product01.png" alt="">--}}
{{--                                        </div>--}}
{{--                                        <div class="product-body">--}}
{{--                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>--}}
{{--                                            <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>--}}
{{--                                        </div>--}}
{{--                                        <button class="delete"><i class="fa fa-close"></i></button>--}}
{{--                                    </div>--}}

{{--                                    <div class="product-widget">--}}
{{--                                        <div class="product-img">--}}
{{--                                            <img src="assets/img/product02.png" alt="">--}}
{{--                                        </div>--}}
{{--                                        <div class="product-body">--}}
{{--                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>--}}
{{--                                            <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>--}}
{{--                                        </div>--}}
{{--                                        <button class="delete"><i class="fa fa-close"></i></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="cart-summary">--}}
{{--                                    <small>3 Item(s) selected</small>--}}
{{--                                    <h5>SUBTOTAL: $2940.00</h5>--}}
{{--                                </div>--}}
{{--                                <div class="cart-btns">--}}
{{--                                    <a href="#">View Cart</a>--}}
{{--                                    <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- /Cart -->


                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
    </div>
    <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('hot-offers')}}">Гарячі пропозиції</a></li>
                <li><a class="popup-open" href="#">Каталог</a>

                    <div class="popup-black">
                        <div class="popup">
                            @include('_category-penal-list')

                        </div>
                    </div></li>

                <li><a href="#">Топ продажів</a></li>

                <li><a href="#">Розпродаж</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

@yield('content')


<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Про нас</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut.</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>Луцьк</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+380 99 23 33 469</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Допомога</h3>
                        <ul class="footer-links">
                            <li><a href="#">Доставка та оплата</a></li>
                            <li><a href="#">Кредит</a></li>
                            <li><a href="#">Гарантія</a></li>
                            <li><a href="#">Повернення товару</a></li>
                            <li><a href="#">Сервісні центри</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Сервіси</h3>
                        <ul class="footer-links">
                            <li><a href="#">Бонусний рахунок</a></li>
                            <li><a href="#">Roztoka Premium</a></li>
                            <li><a href="#">Подарункові сертифікати</a></li>
                            <li><a href="#">Roztoka Обмін</a></li>
                            <li><a href="#">Тури та відпочинок</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Партнерам



                        </h3>
                        <ul class="footer-links">
                            <li><a href="#">Продавати на Розетці</a></li>
                            <li><a href="#">Співпраця з нами</a></li>
                            <li><a href="#">Франчайзинг</a></li>
                            <li><a href="#">Оренда приміщень</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i
                            class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                                                                target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/nouislider.min.js"></script>
<script src="assets/js/jquery.zoom.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/modal.jquery.js"></script>

<script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
<script src="assets/js/popper.js"></script>

<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/ajax-mail.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/plugins.js"></script>

</body>
</html>



