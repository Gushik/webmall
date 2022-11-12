@extends('layouts.front')

@section('content')
    <div class="electro-product-wrapper wrapper-padding pt-95 pb-45">
        <div class="container-fluid">
            <div class="section-title-4 text-center mb-40">
                <h2>{{$category->name}}</h2>
            </div>
            <div>
                <div class="tab-content">
                    <div id="electro1">
                        <div class="custom-row-2">
                            @foreach($products as $product)
                                <div class="custom-col-style-2 custom-col-4">
                                    <div class="product-wrapper product-border mb-24">
                                        <div class="product-img-3">
                                            <a href="#">
                                                <img src="{{asset('storage/'.$product->cover_img) }}" alt="">
                                            </a>
                                            <div class="product-action-right">
                                                <a class="animate-top" title="Add To Cart"
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
