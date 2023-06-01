@component('mail::message')

Your story is live on History Chip.

Please click <a href='{{$details['theComment']}}'> here</a> to read and share your story with your F3 ( family, friends and fans).

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
