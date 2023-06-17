@component('mail::message')
Hi Dear,

Greetings from Historychip.

We have received a request for quick registration. Use the below OTP for verification.

<div style="background: #333E48; border: 15px solid #333E48; padding: 0 10px;color: #ffffff; font-family: sans-serif; font-size: 40px; text-indent: 1em;
letter-spacing: 50px; line-height: 2; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a">
    {{$details['otp']}}
</div>

<b>This OTP will expire within 5 minutes.</b>

Thank you for visiting History Chip and for your interest in this important project.


Best regards,

{{$details['signature']}}<br>
Founder, History Chip

@endcomponent
