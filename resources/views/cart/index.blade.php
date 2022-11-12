@extends('layouts.front')

@section('content')
    <!-- shopping-cart-area start -->
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3>Кошик:</h3>
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Назва</th>
                                <th>Ціна за одиницю</th>
                                <th>Кількість</th>
                                <th>Ціна разом</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartItems as $item)
                                <tr>
                                    <td class="product-remove"><a href="{{ route('cart.destroy', $item->id) }}"><h6>
                                                Видалити</h6><i class="pe-7s-close"></i></a></td>
                                    <td class="product-thumbnail">
                                        <img src="{{asset('storage/'.$item->associatedModel->cover_img) }}" alt="image"
                                             width="80" height="80">
                                    </td>
                                    <td class="product-name"><a href="#">{{ $item->name }}</a></td>
                                    <td class="product-price-cart"><span class="amount">{{ $item->price }} грн.</span>
                                    </td>
                                    <td class="product-quantity">
                                        <form action="{{ route('cart.update', $item->id )}}" method="GET">
                                            @csrf
                                            <input onchange="this.form.submit()" min="1" name="quantity" type="number"
                                                   value="{{ $item->quantity }}">
                                        </form>
                                    </td>
                                    <td class="product-subtotal">{{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}
                                        грн.
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Всього в кошику:</h2>
                                <ul>
                                    <li>Кількість<span>{{Cart::session(auth()->id())->getTotalQuantity()}}</span></li>
                                    <li>Загальна сума:<span>{{Cart::session(auth()->id())->getTotal()}} грн.</span></li>
                                </ul>
                                <a href="{{ route('cart.checkout') }}">Перейти до оформлення замовлення</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
