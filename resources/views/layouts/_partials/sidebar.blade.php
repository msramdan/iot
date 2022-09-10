<div id="scrollbar">
    <div class="container-fluid">
        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Main Menu</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ set_active('dashboard') }}" href="{{ route('dashboard') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="" role="button" aria-expanded="false" aria-controls="sidebarApps">
                    <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Transactions</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                    <i class="mdi mdi-view-carousel-outline"></i> <span data-key="t-layouts">Merchants</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                    <i class="mdi mdi-lock-open-check-outline"></i> <span data-key="t-layouts">OTP</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link collapsed" href="#sidebarIcons" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                    <i class="mdi mdi-format-list-bulleted-square"></i> <span data-key="t-icons">Data Master</span>
                </a>
                <div class="menu-dropdown collapse" id="sidebarIcons" style="">
                    <ul class="nav nav-sm flex-column">

                        <li class="nav-item">
                            <a href="icons-boxicons.html" class="nav-link" data-key="t-boxicons">Merchants Category</a>
                        </li>
                        <li class="nav-item">
                            <a href="icons-remix.html" class="nav-link" data-key="t-remix">Bank</a>
                        </li>
                        <li class="nav-item">
                            <a href="icons-remix.html" class="nav-link" data-key="t-remix">Business Type</a>
                        </li>
                    </ul>
                </div>
            </li>

            @canany(['user_show', 'role_show','setting_app_show'])
            <li class="nav-item">
                <a class="nav-link menu-link collapsed" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                    <i class="mdi mdi-cog"></i> <span data-key="t-apps">Utilities</span>
                </a>
                <div class="collapse menu-dropdown {{ set_show(['user*', 'roles*', 'settingApp*']) }}" id="sidebarApps">
                    <ul class="nav nav-sm flex-column">
                        @can('user_show')
                        <li class="nav-item ">
                            <a href="{{ route('user.index') }}" class="nav-link {{ set_active(['user*']) }}" data-key="t-calendar"> Users </a>
                        </li>
                        @endcan
                        @can('role_show')
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link {{ set_active(['roles*']) }}" data-key="t-chat"> Roles </a>
                        </li>
                        @endcan
                        @can('setting_app_show')
                        <li class="nav-item">
                            <a href="{{ route('settingApp.index',1) }}" class="nav-link {{ set_active(['settingApp*']) }}" data-key="t-chat"> Setting Apps </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcanany
        </ul>
    </div>
</div>
<div class="sidebar-background"></div>
