@component('mail::message')
# Contact Form Submission

From: {{ $contacts['firstname'] . $contacts['lastname']   }}

Email: {{ $contacts['email'] }}

Phone: {{ $contacts['phone'] }}

Message: {{ $contacts['message'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
