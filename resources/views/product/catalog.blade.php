
@extends('layouts.front')

@section('content')

    <p>   Знайдено продуктів <span>{{$products->total()}}</span> </p>

    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="col">
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


@endsection


