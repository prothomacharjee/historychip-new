@component('mail::message')
Hi Dear,

Congratulations from Historychip.

Thanks for completing your registration with us. Use the below credentials for login.


<b>Email: </b> {{$details['email']}} <br>
<b>Password: </b> {{$details['password']}} <br>


<b>This OTP will expire within 5 minutes.</b>

Thank you for visiting History Chip and for your interest in this important project.


Best regards,

{{$details['signature']}}<br>
Founder, History Chip

@endcomponent
