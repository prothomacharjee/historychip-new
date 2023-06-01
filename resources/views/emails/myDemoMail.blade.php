@component('mail::message')
{{ $details['title'] }}

{{$details['theBody']}}

Regards,

{{$details['signature']}}<br>

{{ config('app.name') }}
@endcomponent
