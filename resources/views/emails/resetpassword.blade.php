@component('mail::message')
Hi Admin,

Greetings from Historychip.

We have received a request for resetting your password.Click below link to reset your password.

<a href="{{$details['url']}}" style="background: #333E48; border: 15px solid #333E48; padding: 0 10px;color: #ffffff; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a">
    Reset
</a>

Best regards,

{{$details['signature']}}<br>
Founder, History Chip

@endcomponent
