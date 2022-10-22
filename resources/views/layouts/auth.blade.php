<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
{{-- style --}}
@include('layouts._auth.admin.style')
<body>
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                <a href="#" class="d-block">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- contents --}}
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- footer --}}
        @include('layouts._auth.admin.footer')
    </div>
    {{-- script --}}
    @include('layouts._auth.admin.script')
</body>

</html>
