<div id="scrollbar">
    <div class="container-fluid">
        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Main Menu</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ set_active('home') }}" href="{{ route('home') }}" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ set_active('transaction*') }}" href="#" role="button" aria-expanded="false" aria-controls="sidebarApps">
                    <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Transactions</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="sidebar-background"></div>
