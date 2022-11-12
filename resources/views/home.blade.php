@extends('layouts.front')

@section('content')

    <div class="pl-200 pr-200 overflow clearfix">
        <div class="categori-menu-slider-wrapper clearfix">
            <div class="categories-menu">
                <div class="category-heading">
                    <h3> Всі категорії <i class="pe-7s-angle-down"></i></h3>
                </div>
                <div class="category-menu-list">
                    <ul>
                        @foreach($categories as $category)
                            <li>
                                <a href="#"><img alt=""
                                                 src="assets/img/icon-img/{{$category->slug}}.png">{{$category->name}}<i
                                        class="pe-7s-angle-right"></i></a>
                                @php
                                    $children = TCG\Voyager\Models\Category::where('parent_id', $category->id)->get();
                                @endphp
                                @if($children->isNotEmpty())
                                    <div class="category-menu-dropdown">
                                        @foreach($children as $child)
                                            <div class="category-dropdown-style category-common4">
                                                <h4 class="category-subtitle"><a
                                                        href="{{route('products.index', ['category_id'=> $child->id])}}">{{$child->name}}</a>
                                                </h4>
                                                @php
                                                    $grandChild = TCG\Voyager\Models\Category::where('parent_id', $child->id)->get();
                                                @endphp
                                                <div class="category-dropdown-style category-common1 mb-10">
                                                    @if($grandChild->isNotEmpty())
                                                        @foreach($grandChild as $c)
                                                            <ul>
                                                                <li>
                                                                    <a href="{{route('products.index', ['category_id'=> $c->id])}}"> {{$c->name}}</a>
                                                                </li>
                                                            </ul>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="menu-slider-wrapper">
                <div class="menu-style-3 menu-hover text-center">
                    <nav>
                        <ul>
                            <li><a href="{{route('home')}}">home </a>
                            </li>
                            <li><a href="#">pages </a>
                            </li>
                            <li><a href="#">shop</a>
                            </li>
                            <li><a href="#">contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="slider-area">
                    <div class="slider-active owl-carousel">
                        <div class="single-slider single-slider-hm3 bg-img pt-170 pb-173">
                            <div class="slider-animation slider-content-style-3 fadeinup-animated">
                                @foreach($allProducts as $product)
                                    @if($product->id == 1)
                                        <div class="product-img-6">
                                            <img src="{{asset('storage/'.$product->cover_img) }}" alt=""
                                                 style="width: 350px;">
                                        </div>
                                        <div>
                                            <h4 class="animated">{{$product->name}}</h4>
                                            <h4 class="animated">{{$product->price}} грн.</h4>
                                            <a class="electro-slider-btn btn-hover"
                                               href="{{route('cart.add', $product->id)}}">Купити</a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="electro-product-wrapper">
        <div class="container-fluid">
            <div class="section-title-4 text-center mb-40">
                <h2>ТОВАРИ</h2>
            </div>
            <div>
                <div class="tab-content">
                    <div id="electro1">
                        <div class="custom-row-2">
                            @foreach($allProducts as $product)
                                <div class="custom-col-style-2 custom-col-4">
                                    <div class="product-wrapper product-border mb-24">
                                        <div class="product-img-3">
                                            <a href="#">
                                                <img src="{{asset('storage/'.$product->cover_img) }}" alt="">
                                            </a>
                                            <div class="product-action-right">
                                                <a class="animate-top" title="До кошика"
                                                   href="{{route('cart.add', $product->id)}}">
                                                    <i class="pe-7s-cart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content-4 text-center">
                                            <h4>
                                                <a href="{{route('product-details', $product->id)}}">{{$product->name}}</a>
                                            </h4>
                                            <span>{{$product->description}}</span>
                                            <h5>{{$product->price}} грн.</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
