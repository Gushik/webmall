@component('mail::message')
    # Отримано заявку на реєстрацію нового магазину:

    Від: {{$shop->owner->name}},<br>
    Назва магазину: {{$shop->name}}

    @component('mail::button', ['url' => url('/admin/shops')])
        Перейти
    @endcomponent

    <br>
    {{ config('app.name') }}
@endcomponent
