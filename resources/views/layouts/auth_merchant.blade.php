<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Anfra</title>
    @include('layouts._auth.merchant.style')
  </head>
  <body>

    <div class="ugf-nav">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="navigation">
              <div class="logo">
                <a href="../index.html"><img src="../images/sakalaguna_logo.png" class="img-fluid" alt=""><span>KYC</span></a>
              </div>
              <div class="nav-btns">
                <a href="../index.html" class="back"><span class="text">Back to Main</span> Demo</a>
                <a href="https://themeforest.net/item/anfra-questionnaire-form-wizard/29917051" class="get">Get Anfra</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ugf-bg ufg-main-container">
      <div class="ugf-progress">
        <div class="progress">
          <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
     @yield('content')
    </div>

    @include('layouts._auth.merchant.footer')
    @include('layouts._auth.merchant.script')
  </body>
</html>
