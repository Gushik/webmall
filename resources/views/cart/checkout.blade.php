@extends('layouts.front')

@section('content')
    <!-- checkout-area start -->
    <div class="cart-checkout pt-95 pb-100">
        <div class="container">
            <form action="{{route('orders.store')}}" method="POST">
                @csrf
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="checkbox-form">
                        <h3>Інформація про доставку</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="">Ім'я та Прізвище</label>
                                    <input type="text" name="shipping_fullname" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="">Область</label>
                                    <input type="text" name="shipping_state" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="">Місто</label>
                                    <input type="text" name="shipping_city" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="">Вулиця та № будинку</label>
                                    <input type="text" name="shipping_address" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="">Телефон</label>
                                    <input type="text" name="shipping_phone" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="">Поштовий код</label>
                                    <input type="number" name="shipping_zipcode" id="" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row-cols-2">
                            <div class="your-order">
                                <h3>Ваше замовлення</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="product-name">Назва</th>
                                            <th class="product-total">Кількість</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cartItems as $item)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ $item->name }} <strong class="product-quantity"></strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">  ×  {{ $item->quantity }} </span>
                                                </td>
                                            </tr>
                                        </tbody>

                                        <tr class="cart-subtotal">
                                            <th>Ціна за позицію</th>
                                            <td><span class="amount">{{Cart::session(auth()->id())->get($item->id)->getPriceSum()}} грн.</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tfoot>
                                        <tr class="order-total">
                                            <th> Загальна сума:</th>
                                            <td><strong><span class="amount">{{Cart::session(auth()->id())->getTotal()}} грн.</span></strong>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="payment_method"
                                                   style="height: 1.5em;" value="cash_on_delivery">
                                            <h5 class="panel-title">Готівкою при отриманні</h5>
                                        </label>
                                    </div>
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="payment_method"
                                               style="height: 1.5em;" value="PayPal">
                                        <h5 class="panel-title">PayPal</h5>
                                    </label>
                                    <div class="order-button-payment">
                                        <input type="submit" value="Оформити замовлення"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout-area end -->

@endsection
