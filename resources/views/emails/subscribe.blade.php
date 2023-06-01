@component('mail::message')
{{$details['Title']}}
{{$details['theBody']}}

{{$details['theComment']}}

Best regards,

{{$details['signature']}}<br>
Founder, History Chip

@endcomponent
