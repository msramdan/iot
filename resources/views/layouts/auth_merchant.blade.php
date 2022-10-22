<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $setting->app_name }}</title>
    @include('layouts._auth.merchant.style')
  </head>
  <body>

    <div class="ugf-nav">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="navigation">
              <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ Storage::url('public/img/setting_app/'.$setting['logo']) }}" class="img-fluid" alt=""><span>{{ $setting->app_name }}</span></a>
              </div>
              <div class="nav-btns">
                <a href="#" class="back"><span class="text">Home</span></a>
                <a href="{{ route('login') }}" class="get">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ugf-bg ufg-main-container">
      <div class="ugf-progress">
        <div class="progress">
          <div id="progres-bar" class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
     @yield('content')
    </div>

    @include('layouts._auth.merchant.footer')
    @include('layouts._auth.merchant.script')
  </body>
</html>
