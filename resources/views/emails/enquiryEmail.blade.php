
@component('mail::message')
{{ $details['title'] }}
User Details:-

Name:{{ $details['name'] }}

Email: {{ $details['email'] }}

Phone: {{ $details['phone'] }}

Comment: {{ $details['commentText'] }}

Regards,

{{$details['signature']}}<br>

{{ config('app.name') }}
@endcomponent
