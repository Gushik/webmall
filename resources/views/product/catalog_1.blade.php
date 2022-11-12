@extends('layouts.front')


@section('content')

    <div>
        @include('_slider')

    </div>



    <form method="GET" action="{{route("index")}}">
        <div class="filters row">
            <div class="col-sm-6 col-md-3">
                <label for="price_from">
                    <input type="text" name="price_from" id="price_from" size="6" value="{{ request()->price_from}}">
                </label>
                <label for="price_to">
                    <input type="text" name="price_to" id="price_to" size="6" value="{{ request()->price_to }}">
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="hit">
                    <input type="checkbox" name="hit" id="hit" @if(request()->has('hit')) checked @endif>
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="new">
                    <input type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif>
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="recommend">
                    <input type="checkbox" name="recommend" id="recommend"
                           @if(request()->has('recommend')) checked @endif>
                </label>
            </div>
            <div class="col-sm-6 col-md-3">
                <button type="submit" class="btn btn-primary"></button>
                <a href="{{ route("index") }}" class="btn btn-warning"></a>
            </div>
        </div>
    </form>
@endsection
