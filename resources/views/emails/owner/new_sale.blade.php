@component('mail::message')
# Hola {{ $owner->name }},
<br>
El alumno <b>{{ $estudiante->name }}</b> ha comprado tu curso <b>{{ $curso->title }}</b> por el importe <b>{{ \App\Helpers\Currency::formatCurrency($curso->precio) }}</b>.
<br><br>
¡Felicidades!

@component('mail::button', [
    'url' => env('APP_URL')
])
    Volver a la plataforma
@endcomponent

Atentamente,<br>
{{ config('app.name') }}
@endcomponent
