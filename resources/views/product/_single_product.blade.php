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
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- HEADER -->


<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Categories</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li class="active">Headphones (227,490 Results)</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Categories</h3>
                    <div class="checkbox-filter">

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-1">
                            <label for="category-1">
                                <span></span>
                                {{--                               @foreach($Shop as $shops)--}}
                                {{--                                    <small>{{'$shops->name'}}</small>--}}
                                {{--                                @endforeach--}}
                                <small>(120)</small>
                            </label>
                        </div>

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-2">
                            <label for="category-2">
                                <span></span>
                              @foreach($allAttribute as $attribute)
                                    <small>{{$attribute->id}}</small>
                                @endforeach

                            </label>
                        </div>

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-3">
                            <label for="category-3">
                                <span></span>
                                Cameras
                                <small>(1450)</small>
                            </label>
                        </div>

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-4">
                            <label for="category-4">
                                <span></span>
                                Accessories
                                <small>(578)</small>
                            </label>
                        </div>

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-5">
                            <label for="category-5">
                                <span></span>
                                Laptops
                                <small>(120)</small>
                            </label>
                        </div>

                        <div class="input-checkbox">
                            <input type="checkbox" id="category-6">
                            <label for="category-6">
                                <span></span>
                                Smartphones
                                <small>(740)</small>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Price</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->
{{--            @foreach($allAttribute as $attrib)--}}
{{--                {{$attrib->name}}--}}
{{--            @endforeach--}}
                <!-- aside Widget -->
                <form action="{{route('categories.index')}}" method="GET">
                <div class="aside">

                    <h3 class="aside-title">Brand</h3>
                    <button class="search-btn">Пошук</button>
                    <div class="checkbox-filter">
                        @foreach($categories as $category)


                            @php
                                $children = $category->children;
                            @endphp

                            @if($children->isNotEmpty())


                                @foreach ($children as $child)

                                    @php
                                        $grandChild = $child->children;
                                    @endphp
                                    @if($grandChild && $grandChild->isNotEmpty())

                                        @foreach ($grandChild as $c)
                                            <div class="input-checkbox">

                                                <input   type="checkbox" name="Category_name" id="{{$c->name}}">
                                                <label  for="{{$c->name}}">
                                                    <span></span>
                                                    {{$c->name}}
                                                    <small>(578)</small>
                                                </label>

                                            </div>

                                        @endforeach

                                    @endif

                                @endforeach

                            @endif

                        @endforeach

                    </div>

                </div>
                </form>
                <!-- /aside Widget -->

                <!-- aside Widget -->

                <div class="aside">
                    <h3 class="aside-title">Топ продажів</h3>

                    @foreach($products as $key => $product)
                        @if($key==2)
                            @break($key);
                        @endif
                        <div class="product-widget">
                            <div class="product-img">

                                <a href="{{route('products.show', $product)}}">
                                    @if(!empty($product->cover_img))
                                        <img src="{{asset('storage/'.$product->cover_img)}}" alt="">
                                    @else
                                        <img src="/assets/img/product/electro/1.jpg" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="{{url('/product card')}}">{{$product->name}}}}</a>
                                </h3>
                                <h4 class="product-price">$ {{$product->price}}
                                    <del class="product-old-price">$990.00</del>
                                </h4>
                            </div>
                        </div>


                    @endforeach


                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Сортувати:
                            <select class="input-select">
                                <option value="0">Popular</option>
                                <option value="1">Position</option>
                            </select>
                        </label>

                        <label>
                            Show:
                            <select class="input-select">
                                <option value="0">20</option>
                                <option value="1">50</option>
                            </select>
                        </label>
                    </div>
                    <ul class="store-grid">
                        <li class="active"><i class="fa fa-th"></i></li>
                        <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                    </ul>
                </div>
                <div class="section">
                    <!-- container -->
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="products-tabs">
                                        <!-- tab -->
                                        <div id="tab1" class="tab-pane active">
                                            <div class="products-slick" data-nav="#slick-nav-1">
                                                @foreach($products as $product)
                                                    @include('product._top_product')
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing 20-100 products</span>
                    <ul class="store-pagination">
                        <li class="active">1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->

<

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>


{{--<div class="custom-col-style-2 custom-col-4">--}}
{{--    <div class="product-wrapper product-border mb-24">--}}
{{--        <div class="product-img-3">--}}
{{--            <a href="{{route('products.show', $product)}}">--}}
{{--                @if(!empty($product->cover_img))--}}
{{--                    <img src="{{asset('storage/'.$product->cover_img)}}" alt="">--}}
{{--                @else--}}
{{--                    <img src="/assets/img/product/electro/1.jpg" alt="">--}}
{{--                @endif--}}
{{--            </a>--}}
{{--            <div class="product-action-right">--}}
{{--                <a class="animate-right" href="{{route('products.show', $product)}}" title="View">--}}
{{--                    <i class="pe-7s-look"></i>--}}
{{--                </a>--}}
{{--                <a class="animate-top" title="Add To Cart" href="{{route('cart.add', $product->id)}}">--}}
{{--                    <i class="pe-7s-cart"></i>--}}
{{--                </a>--}}
{{--                <a class="animate-left" title="Wishlist" href="#">--}}
{{--                    <i class="pe-7s-like"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="product-content-4 text-center">--}}
{{--            <div class="product-rating-4">--}}
{{--                <i class="icofont icofont-star yellow"></i>--}}
{{--                <i class="icofont icofont-star yellow"></i>--}}
{{--                <i class="icofont icofont-star yellow"></i>--}}
{{--                <i class="icofont icofont-star yellow"></i>--}}
{{--                <i class="icofont icofont-star"></i>--}}
{{--            </div>--}}
{{--            <h4><a href="{{route('products.show', $product)}}">{{$product->name}}</a></h4>--}}
{{--            <span>{{$product->description}}</span>--}}
{{--            <h5>$ {{$product->price}}</h5>--}}
{{--        <p>{{$product->shop->owner->name ?? 'n/a'}}</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
