@extends('layouts.app')


@section('content')
    <div class="container">
        <form action="{{route ('shops.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Назва магазину</label>
                <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
                <label for="name">Короткий опис</label>
                <textarea class="form-control" name="description" id="" aria-describedby="helpId"
                          placeholder=""> </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Зареєструвати</button>
        </form>
    </div>
@endsection
