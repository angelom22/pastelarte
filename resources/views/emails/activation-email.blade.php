@component('mail::message')
# Hemos recibido su solicitud de registro en nuestra plataforma. Por favor, recuerde verificar su identidad para iniciar.

Has Click en el siguiente enlace para activar su cuenta.

@component('mail::button', ['url' => route('activation', $user->token)])
Activa tu cuenta
@endcomponent

Gracias, {{$user->name}} por registarte en {{ config('app.name') }}
@endcomponent
