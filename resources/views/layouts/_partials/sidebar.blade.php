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
            @canany(['merchant_show'])
            <li class="nav-item">
                <a class="nav-link menu-link collapsed" href="#sidebarIconsMerchant" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebarIcons" aria-expanded="false">
                    <i class="mdi mdi-view-carousel-outline"></i> <span data-key="t-layouts">Merchants</span>
                </a>
                <div class="collapse menu-dropdown <?= request()->segment(2) == 'merchant' ? 'show' : '' ?>" id="sidebarIconsMerchant">
                    <ul class="nav nav-sm flex-column">
                        @can('merchant_show')
                        <li class="nav-item">
                            <a href="{{ route('merchant.index') }}" class="nav-link <?= request()->segment(2) == 'merchant' && request()->segment(3) == '' ? 'active' : '' ?>" data-key="t-boxicons">Merchants Active</a>
                        </li>
                        @endcan
                        @can('merchant_show')
                        <li class="nav-item">
                            @php
                            $jml = DB::table("merchants")
                            ->where('approved1', '=', 'need_approved')
                            ->where('approved2', '=', 'need_approved')
                            ->where('is_active', '=', 0)
                            ->count();
                            @endphp
                            <a href="{{ route('merchant.approval') }}" class="nav-link <?= request()->segment(2) == 'merchant' && request()->segment(3) == 'approval'   ? 'active' : '' ?>  " data-key="t-remix">Merchants Need Approval <span class="badge badge-pill bg-danger" data-key="t-new">{{ $jml }} Data</span></a>
                        </li>
                        @endcan
                        @can('merchant_show')
                        <li class="nav-item">
                            <a href="{{ route('merchant.rejected') }}" class="nav-link <?= request()->segment(2) == 'merchant' ? 'show' : '' ?> " data-key="t-remix">Merchant Inactive / Rejected</a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcanany
            {{-- <li class="nav-item">
                <a class="nav-link menu-link" href="" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                    <i class="mdi mdi-lock-open-check-outline"></i> <span data-key="t-layouts">OTP</span>
                </a>
            </li> --}}
            @canany(['merchants_category_show','bank_show','bussiness_show','rek_pooling_show'])
            <li class="nav-item">
                <a class="nav-link menu-link collapsed" href="#sidebarIcons" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                    <i class="mdi mdi-format-list-bulleted-square"></i> <span data-key="t-icons">Master Data</span>
                </a>
                <div class="collapse menu-dropdown {{ set_show(['merchants_c*','bank*','rek_pooling*','bussiness*']) }}" id="sidebarIcons">
                    <ul class="nav nav-sm flex-column">
                        @can('merchants_category_show')
                        <li class="nav-item">
                            <a href="{{ route('merchants_c.index') }}" class="nav-link {{ set_active(['merchants_c*']) }}" data-key="t-boxicons">Merchants Category</a>
                        </li>
                        @endcan
                        @can('bank_show')
                        <li class="nav-item">
                            <a href="{{ route('bank.index') }}" class="nav-link {{ set_active(['bank*']) }}" data-key="t-remix">Bank</a>
                        </li>
                        @endcan
                        @can('bussiness_show')
                        <li class="nav-item">
                            <a href="{{ route('bussiness.index') }}" class="nav-link {{ set_active(['bussiness*']) }}" data-key="t-remix">Business Type</a>
                        </li>
                        @endcan
                        @can('rek_pooling_show')
                        <li class="nav-item">
                            <a href="{{ route('rek_pooling.index') }}" class="nav-link {{ set_active(['rek_pooling*']) }}" data-key="t-remix">Pooling Account</a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcanany
            @canany(['activity_log_show'])
            <li class="nav-item">
                <a class="nav-link menu-link collapsed" href="#sidebarAdvanceUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAdvanceUI">
                    <i class="mdi mdi-math-log"></i> <span data-key="t-advance-ui">System Log</span>
                </a>
                <div class="menu-dropdown collapse {{ set_show(['activity_log*','approved_log_merchant*','mdr_log*']) }}" id="sidebarAdvanceUI" style="">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('activity_log.index') }}" class="nav-link {{ set_active(['activity_log*']) }}" data-key="t-chat"> Activity Log</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link {{ set_active(['audit*']) }}" data-key="t-chat"> Api Log</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('approved_log_merchant.index') }}" class="nav-link {{ set_active(['approved_log_merchant*']) }}" data-key="t-chat"> Approved Log</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mdr_log.index') }}" class="nav-link {{ set_active(['mdr_log*']) }}" data-key="t-chat"> Mdr Log</a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcanany

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
