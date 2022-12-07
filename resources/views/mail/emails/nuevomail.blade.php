@component('mail::message')
# Hola!

## Has recibido un nuevo mail.

{{$comment->text}}

Gracias,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::button', ['url' => URL::to('/')])
    Ver comentario
@endcomponent

