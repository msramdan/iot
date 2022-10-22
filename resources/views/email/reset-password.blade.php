@component('mail::message')
<h2>Hello {{$body['name']}},</h2>
<p>
    Hello!
    You are receiving this email because we received a password reset request for your account.
</p>
<p>
    Reset Password
    This password reset link will expire in 60 minutes.
</p>
<p>
    @component('mail::button', ['url' => $body['url']])
    Reset Password
    @endcomponent
</p>

Thanks,<br>
{{ config('app.name') }}<br>
@endcomponent