<div id="scrollbar">
    <div class="container-fluid">
        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Main Menu</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ set_active('dashboard') }}" href="{{ route('dashboard') }}" role="button"
                    aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ set_active('instance.*') }}" href="{{ route('instance.index') }}"
                    role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-bank"></i> <span data-key="t-dashboards">Instances</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ set_active('device.*') }}" href="{{ route('device.index') }}"
                    role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-devices"></i> <span data-key="t-dashboards">Device</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ set_active('gateway.*') }}" href="{{ route('gateway.index') }}"
                    role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Gateway</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ set_active('tickets.*') }}" href="{{ route('tickets.index') }}"
                    role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-book"></i> <span data-key="t-dashboards">Tickets</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link {{ set_active('invoice.*') }}" href="{{ route('invoice.index') }}"
                    role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-book-information-variant"></i> <span data-key="t-dashboards">Invoices</span>
                </a>
            </li>
            @canany(['bussiness_show', 'subnet_show'])
            <li class="nav-item">
                <a class="nav-link menu-link collapsed" href="#sidebarIcons" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                    <i class="mdi mdi-format-list-bulleted-square"></i> <span data-key="t-icons">Master Data</span>
                </a>
                <div class="collapse menu-dropdown {{ set_show(['bussiness*','subnet.*']) }}" id="sidebarIcons">
                    <ul class="nav nav-sm flex-column">
                        @can('bussiness_show')
                        <li class="nav-item">
                            <a href="{{ route('bussiness.index') }}" class="nav-link {{ set_active(['bussiness*']) }}" data-key="t-remix">Business Type</a>
                        </li>
                        @endcan
                        @can('subnet_show')
                        <li class="nav-item">
                            <a href="{{ route('subnet.index') }}" class="nav-link {{ set_active(['subnet*']) }}" data-key="t-remix">Subnet</a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcanany @canany(['master_water_meter_show', 'master_power_meter_show', 'master_gas_meter_show'])
            <li class="nav-item">
                <a class="nav-link menu-link collapsed" href="#latestData" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                    <i class="mdi mdi-format-list-bulleted-square"></i> <span data-key="t-icons">Latest Master Data</span>
                </a>
                <div class="collapse menu-dropdown {{ set_show(['master_water_meter*', 'master_power_meter*', 'master_gas_meter*']) }}" id="latestData">
                    <ul class="nav nav-sm flex-column">
                        @can('master_water_meter_show')
                        <li class="nav-item">
                            <a href="{{ route('master_water_meter.index') }}" class="nav-link {{ set_active(['master_water_meter*']) }}" data-key="t-remix">Master Water Meter</a>
                        </li>
                        @endcan
                        @can('master_power_meter_show')
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ set_active(['master_power_meter*']) }}" data-key="t-remix">Master Power Meter</a>
                        </li>
                        @endcan
                        @can('master_gas_meter_show')
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ set_active(['master_gas_meter*']) }}" data-key="t-remix">Master Gas Meter</a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcanany
            @canany(['province_show', 'city_show', 'district_show', 'village_show'])
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarMasterWilayah" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarMasterWilayah">
                        <i class="mdi mdi-format-list-bulleted-square"></i> <span data-key="t-icons">Master Wilayah</span>
                    </a>
                    <div class="collapse menu-dropdown {{ set_show(['province*', 'city*', 'district*', 'village*']) }}"
                        id="sidebarMasterWilayah">
                        <ul class="nav nav-sm flex-column">
                            @can('province_show')
                                <li class="nav-item">
                                    <a href="{{ route('province.index') }}" class="nav-link {{ set_active(['province*']) }}"
                                        data-key="t-boxicons">Provinsi</a>
                                </li>
                            @endcan
                            @can('city_show')
                                <li class="nav-item">
                                    <a href="{{ route('city.index') }}" class="nav-link {{ set_active(['city*']) }}"
                                        data-key="t-remix">Kabupaten / Kota</a>
                                </li>
                            @endcan
                            @can('district_show')
                                <li class="nav-item">
                                    <a href="{{ route('district.index') }}" class="nav-link {{ set_active(['district*']) }}"
                                        data-key="t-remix">Kecamatan</a>
                                </li>
                            @endcan
                            @can('village_show')
                                <li class="nav-item">
                                    <a href="{{ route('village.index') }}" class="nav-link {{ set_active(['village*']) }}"
                                        data-key="t-remix">Kelurahan / Desa</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcanany
            @canany(['activity_log_show'])
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarAdvanceUI" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarAdvanceUI">
                        <i class="mdi mdi-math-log"></i> <span data-key="t-advance-ui">System Log</span>
                    </a>
                    <div class="menu-dropdown collapse {{ set_show(['activity_log*', 'rawdata*', 'parsed-wm*']) }}"
                        id="sidebarAdvanceUI" style="">
                        <ul class="nav nav-sm flex-column">
                            @can('activity_log_show')
                            <li class="nav-item">
                                <a href="{{ route('activity_log.index') }}"
                                    class="nav-link {{ set_active(['activity_log*']) }}" data-key="t-chat"> Activity
                                    Log</a>
                            </li>
                            @endcan
                            @can('raw_data_show')
                            <li class="nav-item">
                                <a href="{{ route('rawdata.index') }}"
                                    class="nav-link {{ set_active(['rawdata*']) }}" data-key="t-chat"> Rawdata
                                </a>
                            </li>
                            @endcan
                            <li class="nav-item">
                                        <a href="#sidebarAccount" class="nav-link collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Parsed Rawdata
                                        </a>
                                        <div class="menu-dropdown collapse" id="sidebarAccount" style="">
                                            <ul class="nav nav-sm flex-column">
                                                @can('parsed_wm_show')
                                                <li class="nav-item">
                                                    <a href="{{ route('parsed-wm.index') }}" class="nav-link {{ set_active(['parseddata*']) }}" data-key="t-level-2.1"> Water Meter</a>
                                                </li>
                                                @endcan
                                                @can('parsed_gm_show')
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link {{ set_active(['parseddata*']) }}" data-key="t-level-2.1"> Gas Meter </a>
                                                </li>
                                                @endcan
                                                @can('parsed_pm_show')
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link {{ set_active(['parseddata*']) }}" data-key="t-level-2.1"> Power Meter </a>
                                                </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </li>
                        </ul>
                    </div>
                </li>
            @endcanany

            @canany(['user_show', 'role_show', 'setting_app_show'])
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps">
                        <i class="mdi mdi-cog"></i> <span data-key="t-apps">Utilities</span>
                    </a>
                    <div class="collapse menu-dropdown {{ set_show(['user*', 'roles*', 'settingApp*']) }}"
                        id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            @can('user_show')
                                <li class="nav-item ">
                                    <a href="{{ route('user.index') }}" class="nav-link {{ set_active(['user*']) }}"
                                        data-key="t-calendar"> Users </a>
                                </li>
                            @endcan
                            @can('role_show')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link {{ set_active(['roles*']) }}"
                                        data-key="t-chat"> Roles </a>
                                </li>
                            @endcan
                            @can('setting_app_show')
                                <li class="nav-item">
                                    <a href="{{ route('settingApp.index', 1) }}"
                                        class="nav-link {{ set_active(['settingApp*']) }}" data-key="t-chat"> Setting Apps
                                    </a>
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
