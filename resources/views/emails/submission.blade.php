@component('mail::message')
<br>{{$details['title'] }}

Please check in Admin panel and review it. For story preview <a href="{{$details['url'] }}">Click here.</a>

User Details as follows:-


Name: {{$details['name']}}

Email: {{$details['email'] }}


For Approve or Reject <a href="{{url("admin/managestories") }}"> Click here.</a>


Best regards,

History Chip

@endcomponent
