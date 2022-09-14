@extends('layouts.front')

@section('content')


<div class="pl-200 pr-200 overflow clearfix">

    <div class="categori-menu-slider-wrapper clearfix">
        <div class="categories-menu">

            <div class="category-heading">
                <h3> Всі категорії <i class="pe-7s-angle-down"></i></h3>
            </div>

            @include('_category-list')

        </div>



    </div>

</div>

<div class="electronic-banner-area">
    <div class="custom-row-2">
        @include('_dummy-product')
        @include('_dummy-product')
        @include('_dummy-product')

    </div>
</div>

<div class="electro-product-wrapper wrapper-padding pt-95 pb-45">

    <div class="container-fluid">

        <div class="section-title-4 text-center mb-40">
            <h2>Топ продуктів</h2>
        </div>

        <div class="top-product-style">

            <div>

                <div id="electro1">
                    <div class="custom-row-2">

                        @foreach($allProducts as $product)
                            @include('product._single_product')
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
