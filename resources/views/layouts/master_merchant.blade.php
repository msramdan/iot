<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
{{-- style --}}
@include('layouts._partials.merchant.style')
<body>
    <div class="modal fade" id="ajaxModelEditPassword"  >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="{{ route('merchant.change_password') }}">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Update Password <span id="attr_sku_kode"></span> </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="password">Password Lama</label>
                                <input id="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" type="password" pattern="^\S{8,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.passcon.pattern = this.value;" placeholder="Password Baru" required>
                                @error('old_password')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password Baru</label>
                                <input id="password" class="form-control @error('password') is-invalid @enderror" name="password" type="password" pattern="^\S{8,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.passcon.pattern = this.value;" placeholder="Password Baru" required>
                                @error('password')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="passcon">Konfirmasi Password</label>
                                <input class="form-control @error('password_confirmation') is-invalid @enderror" id="passcon" name="password_confirmation" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');" placeholder="Konfirmasi Password" required>
                                @error('password_confirmation')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" href="javascript:;" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

      <div class="modal fade" id="ajaxModelEditForcePassword"  data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert">
                        Please Change your password!
                    </div>
                    <form method="POST" action="{{ route('merchant.change_password') }}">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Update Password <span id="attr_sku_kode"></span> </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="password">Password Lama</label>
                                <input id="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" type="password" pattern="^\S{8,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.passcon.pattern = this.value;" placeholder="Password Baru" required>
                                @error('old_password')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password Baru</label>
                                <input id="password" class="form-control @error('password') is-invalid @enderror" name="password" type="password" pattern="^\S{8,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.passcon.pattern = this.value;" placeholder="Password Baru" required>
                                @error('password')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="passcon">Konfirmasi Password</label>
                                <input class="form-control @error('password_confirmation') is-invalid @enderror" id="passcon" name="password_confirmation" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');" placeholder="Konfirmasi Password" required>
                                @error('password_confirmation')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" href="javascript:;" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="layout-wrapper">
        {{-- header --}}
        @include('layouts._partials.merchant.header')
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
            @include('layouts._partials.merchant.sidebar')
        </div>
        <div class="vertical-overlay"></div>
        <div class="main-content">
            {{-- contents --}}
            @yield('content')
            {{-- footer --}}
            @include('layouts._partials.merchant.footer')
        </div>

    </div>
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    @include('layouts._partials.merchant.script')

</body>
</html>
