@extends('layouts.front')


@section('content')

<div class="container">

    <h2> {{ $categoryName ?? null }}  </h2>

    <div class="custom-row-2">


        @include('product._single_product')


    </div>


</div>

@endsection
