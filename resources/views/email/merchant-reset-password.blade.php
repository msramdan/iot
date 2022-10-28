@component('mail::message')
<h2>Hello {{ $merchant->merchant_name }},</h2>
<p>
    Hello!
    You are receiving this email because we received a password reset request for your account.
</p>
<p>
    Reset Password
    This password reset link will expire in 60 minutes.
</p>

@component('mail::button', ['url' => route('merchants.reset_password', $token)])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
