<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

<!-- External Css -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/line-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/countrySelect.css') }}" />

<!-- Custom Css -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/kyc-1.css') }}">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<!-- Favicon -->
<link rel="icon" href="{{ Storage::url('public/img/setting_app/'. $setting->favicon) }}">
<link rel="apple-touch-icon" href="{{ Storage::url('public/img/setting_app/'. $setting->favicon) }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ Storage::url('public/img/setting_app/'. $setting->favicon) }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ Storage::url('public/img/setting_app/'. $setting->favicon) }}">
@stack('style')
