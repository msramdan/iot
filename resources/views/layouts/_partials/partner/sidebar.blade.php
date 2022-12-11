<div id="scrollbar">
    <div class="container-fluid">
        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Main Menu</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ set_active('home') }}" href="{{ route('instances.dashboard') }}" role="button"
                    aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ set_active('instances.subinstance') }}" href="{{ route('instances.subinstance.index') }}" role="button"
                    aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-bank"></i> <span data-key="t-dashboards">Sub Instance</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ set_active('instances.tickets') }}" href="{{ route('instances.tickets.index') }}" role="button"
                    aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-book"></i> <span data-key="t-dashboards">Ticket</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="sidebar-background"></div>
