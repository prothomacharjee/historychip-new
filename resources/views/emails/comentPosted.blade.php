
@component('mail::message')

{{-- {{$details['title'] }} --}}

A Comment is Posted on a <a href="{{url($details['url'])}}">Story</a>

Please check in Admin panel and review it. For comment preview <a href="{{route('admin.stories.comments')}}">Click here.</a>

Commentator Details as follows:-


Commentator: {{$details['commenter']}}

commentator Email: {{$details['commenterEmail'] }}


For Approve or Reject <a href="{{route("admin.stories.comments") }}"> Click here.</a>


Best regards,

History Chip

@endcomponent
