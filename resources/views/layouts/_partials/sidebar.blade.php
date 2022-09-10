<div id="scrollbar">
    <div class="container-fluid">
        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Main Menu</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('dashboard') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboard</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarApps" role="button" aria-expanded="false" aria-controls="sidebarApps">
                    <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Transactions</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="ipay-merchants.html" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                    <i class="mdi mdi-view-carousel-outline"></i> <span data-key="t-layouts">Merchants</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarLayouts" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                    <i class="mdi mdi-lock-open-check-outline"></i> <span data-key="t-layouts">OTP</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link collapsed" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                    <i class="mdi mdi-cog"></i> <span data-key="t-apps">Utilities</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarApps">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link" data-key="t-calendar"> Users </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link" data-key="t-chat"> Roles </a>
                        </li>
                        <li class="nav-item">
                            <a href="apps-chat.html" class="nav-link" data-key="t-chat"> Setting Web Apps </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>
<div class="sidebar-background"></div>
