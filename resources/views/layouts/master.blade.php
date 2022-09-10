<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
{{-- style --}}
@include('layouts._partials.style')
<body>
    <div id="layout-wrapper">
        {{-- header --}}
        @include('layouts._partials.header')
        <div class="app-menu navbar-menu">
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <!-- <img src="assets/images/logo-sm.png" alt="" height="22"> -->
                    </span>
                    <span class="logo-lg">
                        <!-- <img src="assets/images/logo-dark.png" alt="" height="17"> -->
                    </span>
                </a>
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <!-- <img src="assets/images/logo-sm.png" alt="" height="22"> -->
                    </span>
                    <span class="logo-lg">
                        <!-- <img src="assets/images/logo-light.png" alt="" height="17"> -->
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>
            {{-- sidebar --}}
            @include('layouts._partials.sidebar')
        </div>
        <div class="vertical-overlay"></div>
        <div class="main-content">
            {{-- contents --}}
            @yield('content')
            {{-- footer --}}
            @include('layouts._partials.footer')
        </div>

    </div>
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    @include('layouts._partials.script')
</body>
</html>
