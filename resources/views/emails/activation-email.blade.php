@component('mail::message')
# Activación de Cuenta

Has Click en el siguiente enlace para activar tu cuenta.

@component('mail::button', ['url' => route('activation', $user->token)])
Activa tu cuenta
@endcomponent

Gracias, {{$user->name}} por registarte en {{ config('app.name') }}
@endcomponent
