@component('mail::message')
# New Feedback from {{ '@' . $user->username }}

Subject: **{{ $feedback->subject }}** <br>


@component('mail::promotion')
{{ $feedback->description }}
@endcomponent


@component('mail::panel')
Hope you're doing great ;)
@endcomponent


Regards,<br>
The Votepen Team
@endcomponent
