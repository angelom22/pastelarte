@component('mail::message')
# Hola {{ $estudiante->name }}
<br>
Muchas gracias por haber realizado tu pedido en {{ config('app.name') }}.
<br>
Aquí tienes los datos de tu pedido:
<br>
<ul>
    @foreach($order->order_lines as $order_line)
        <li>
            Curso: {{ $order_line->curso->title }} - Precio: {{ \App\Helpers\Currency::formatCurrency($order_line->precio) }}
        </li>
    @endforeach
</ul>

@component('mail::button', [
    'url' => env("APP_URL")
])
    Volver a la plataforma
@endcomponent

Atentamente,<br>
{{ config('app.name') }}
@endcomponent
