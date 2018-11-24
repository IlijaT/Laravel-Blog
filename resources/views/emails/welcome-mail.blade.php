@component('mail::message')
# Welcome to Laravel Blog   

{{ $user->name }}, thank you for registering.

@component('mail::button', ['url' => 'http://localhost:8000/'])
Start
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
