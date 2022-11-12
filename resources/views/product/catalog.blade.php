@extends('layouts.front')

@section('content')
    <div class="shop-page-wrapper shop-page-padding ptb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop-sidebar mr-50">
                        <div class="sidebar-widget mb-50">
                            <h3 class="sidebar-title">Пошук</h3>
                            <div class="sidebar-search">
                                <form action="{{route('products.search')}}" method="get">
                                    @csrf
                                    <input name="query" placeholder="Я шкуаю..." type="text">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop-product-wrapper res-xl res-xl-btn">
                        <div class="shop-bar-area">
                            <div class="shop-product-content tab-content">
                                <div id="grid-sidebar1" class="tab-pane fade active show">
                                    <div class="row">
                                        @foreach($products as $product)
                                            <div class="col-lg-6 col-md-6 col-xl-3">
                                                <div class="product-wrapper product-border mb-24">
                                                    <div class="product-img-3">
                                                        <a href="#">
                                                            <img src="{{asset('storage/'.$product->cover_img) }}"
                                                                 alt="">
                                                        </a>
                                                        <div class="product-action-right">
                                                            <a class="animate-top" title="Додати до кошика"
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
            </div>
        </div>
    </div>
@endsection
