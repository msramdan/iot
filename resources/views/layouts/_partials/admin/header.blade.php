<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <button type="button"
                    class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>
            <div class="d-flex align-items-center">
                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button"
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none"
                        data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>
                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn shadow-none" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            @if (auth()->user()->photo == null)
                                <img class="rounded-circle header-profile-user"
                                    src="{{ asset('frontend/default.png') }}" alt="">
                            @else
                                <img class="rounded-circle header-profile-user"
                                    src="{{ asset('storage/photo/' . auth()->user()->photo) }}" alt="">
                            @endif
                            <span class="text-start ms-xl-2">
                                <span
                                    class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                                <span
                                    class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{ Auth::user()->roles->first()->name }}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="{{ route('profile') }}" class="dropdown-item"><i
                                class="mdi mdi-account text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Profile</span></a>

                        <a class="dropdown-item" href="{{ route('admin_auth.logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i
                                class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                            <span class="align-middle" data-key="t-logout">{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('admin_auth.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
