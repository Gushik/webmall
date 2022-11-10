@extends('layouts.front')

@section('content')
    <h1>МІй кабінет</h1>
    @auth


            <div class="products-tabs">
                <!-- tab -->
                <div id="tab1" class="tab-pane active">
                    {{$allUser->name}}
                    {{$allUser->email}}
                    {{$allUser->role_id}}
                </div>
            </div>

    @endauth
@endsection
