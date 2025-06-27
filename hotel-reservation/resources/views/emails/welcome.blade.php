@component('mail::message')
# Welcome, {{ $name }}!

Thank you for booking with us.

@component('mail::button', ['url' => config('app.url')])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
