<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
{{-- style --}}
@include('layouts._partials.style')
<body>
    {{-- <div class="modal fade" id="ajaxModelEditPassword"  >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h4 class="modal-title">Update Password <span id="attr_sku_kode"></span> </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="password">Password Baru</label>
                                <input id="password" class="form-control" name="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.passcon.pattern = this.value;" placeholder="Password Baru" required>
                            </div>
                            <div class="form-group">
                                <label for="passcon">Konfirmasi Password</label>
                                <input class="form-control" id="passcon" name="passcon" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');" placeholder="Konfirmasi Password" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                            <button type="submit" href="javascript:;" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

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
