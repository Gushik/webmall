@component('mail::message')
# Повідомлення про оплату.

Дякуємо за покупку в нашому магазині!

<table class="table">
    <thead>
    <tr>
        <th>Назва:</th>
        <th>Кількість:</th>
        <th>Ціна:</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->pivot->quantity}} шт.</td>
            <td>{{$item->pivot->price}} грн.</td>
        </tr>
    @endforeach
    </tbody>
</table>

Загальна сума: {{$order->grand_total}} грн.

@component('mail::button', ['url' => 'http://roztoka/home'])
    Повернутись до магазину
@endcomponent

Дякуємо,<br>
{{ config('app.name') }}
@endcomponent
