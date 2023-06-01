@component('mail::message')
Hello,

We truly appreciate your story submission. Unfortunately your story has elements which are not in compliance with ours
<a target="_blank" href="{{$details['theBody']}}">Terms of Use</a>.

We invite you to read the <a target="_blank" href="{{$details['theBody']}}">Terms of Use</a>, revise the story and resubmit it.

We look forward to your revised story, 

{{$details['text']}}  {{$details['theComments']}}




<br><br>
The History Chip Team<br>
<a href="mailto:info@historychip.com">info@historychip.com</a><br>
<a href='www.historychip.com'>www.historychip.com</a>
@endcomponent

