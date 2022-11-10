@extends('layouts.front')

@section('content')

    @include('_new_product')
    @include('_slider')
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
                            @foreach($allProducts as $product)
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


@endsection
