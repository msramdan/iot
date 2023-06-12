<head>
    <meta charset="utf-8" />
    <title>@yield('title') - {{ setting_web()->app_name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="icon"
        @if (setting_web()->favicon != null) href="{{ Storage::url('public/img/setting_app/') . setting_web()->favicon }}" @endif
        type="image/x-icon">
    <script src="{{ asset('backend/assets/js/layout.js') }}"></script>
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
</head>
