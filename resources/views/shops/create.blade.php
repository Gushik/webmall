@extends('layouts.app')


@section('content')
<h2>Додайте свій магазин</h2>

<form action="{{route('shops.store')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="name">Назва магазина</label>
        <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
    </div>

    <div class="form-group">
        <label for="description">Опис </label>
        <textarea class="form-control" name="description" id="" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection
