@component('mail::message')
<br>{{$details['title'] }}

Please check in Admin panel and review it. For story preview <a href="{{url($details['url'])}}">Click here.</a>

User Details as follows:-


Name: {{$details['name']}}

Email: {{$details['email'] }}


For Approve or Reject <a href="{{route("admin.stories") }}"> Click here.</a>


Best regards,

History Chip

@endcomponent
