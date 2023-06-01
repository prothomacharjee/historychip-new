@component('mail::message')

We are excited to have you get started with <b>History Chip!</b><br><br>
Access code for user registration: <b>{{$details['org_code']}}<b><br><br>
Click below <b>Get Started</b> button to start writing and viewing your organization stories<br><br>

Please click <a href='{{$details['go_url']}}'> Get Started</a> to read and share your story with your F3 ( family, friends and fans).

If you haven't completed your profile, please follow the steps below to complete it
<ol style="font-size:14px;color:#3d4852;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
    <li>Log-in</li>
    <li>Click on your name and choose "My Profile" </li>
    <li>Update it with the information</li>
</ol>



<br><br>
Best regards,<br>
{{$details['signature']}}<br>
Founder - History Chip<br>
<a href="mailto:info@historychip.com">info@historychip.com</a><br>
<a href='www.historychip.com'>www.historychip.com</a>

@endcomponent
