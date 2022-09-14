@extends('layouts.app')


@section('content')

<h2>Checkout</h2>


<h3>Shipping Information</h3>

<form action="{{route('orders.store')}}" method="post">
    @csrf


    <div class="form-group">
        <label for="">Повне ім'я</label>
        <input type="text" name="shipping_fullname" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Держава</label>
        <input type="text" name="shipping_state" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Місто</label>
        <input type="text" name="shipping_city" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Zip</label>
        <input type="number" name="shipping_zipcode" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Повна адреса</label>
        <input type="text" name="shipping_address" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Мобільний</label>
        <input type="text" name="shipping_phone" id="" class="form-control">
    </div>

    <h4>Варіант оплати</h4>

    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" checked class="form-check-input" name="payment_method" id="" value="cash_on_delivery">
            Накладений платіж

        </label>

    </div>

    <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="payment_method" id="" value="paypal">
            Paypal

        </label>

    </div>


    <button type="submit" class="btn btn-primary mt-3">Зробити замовлення</button>


</form>


@endsection
