@component('mail::message')
<h2>Hello {{ $merchant->merchant_name }},</h2>
<p>
    Hello!
    Your OTP number for login is.
</p>
<h3>{{ $otp_number }}</h3>
<p>
    OTP number will expire after 5 minutes. Please use and don't show your otp number to other people
</p>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
