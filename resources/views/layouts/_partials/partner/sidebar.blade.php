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
                <a class="nav-link menu-link collapsed" href="#latestData" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                    <i class="mdi mdi-format-list-bulleted-square"></i> <span data-key="t-icons">Latest Data Device</span>
                </a>
                <div class="collapse menu-dropdown {{ set_show(['master_water_meter*', 'master_power_meter*', 'master_gas_meter*']) }}" id="latestData">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="" class="nav-link {{ set_active(['master_water_meter*']) }}" data-key="t-remix">Latest Data Water Meter</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link {{ set_active(['master_power_meter*']) }}" data-key="t-remix">Latest Data Power Meter</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link {{ set_active(['master_gas_meter*']) }}" data-key="t-remix">Latest Data Gas Meter</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ set_active('device.*') }}" href=""
                    role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-devices"></i> <span data-key="t-dashboards">Management Device</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ set_active('instances.tickets') }}" href="{{ route('instances.tickets.index') }}" role="button"
                    aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-book"></i> <span data-key="t-dashboards">Ticket</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ set_active('invoice.*') }}" href="{{ route('invoice.index') }}"
                    role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-book-information-variant"></i> <span data-key="t-dashboards">Invoices</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="sidebar-background"></div>
