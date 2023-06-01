@component('mail::message')
# {{ $details['title'] }}

{{$details['theBody']}}

xxxRegards,

{{$details['signature']}}
History Chip

{{ config('app.name') }}
@endcomponent

