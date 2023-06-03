@extends('layouts.master')

@section('title', 'Dashboard')
@push('style')
    <style>
        .map-embed {
            width: 100%;
            height: 510px;
        }

        a.resultnya {
            color: #1e7ad3;
            text-decoration: none;
        }

        a.resultnya:hover {
            text-decoration: underline
        }

        .search-box {
            position: relative;
            margin: 0 auto;
            width: 300px;
        }

        .search-box input#search-loc {
            height: 26px;
            width: 100%;
            padding: 0 12px 0 25px;
            background: white url("https://cssdeck.com/uploads/media/items/5/5JuDgOa.png") 8px 6px no-repeat;
            border-width: 1px;
            border-style: solid;
            border-color: #a8acbc #babdcc #c0c3d2;
            border-radius: 13px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
            -moz-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
            -ms-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
            -o-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
            box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
        }

        .search-box input#search-loc:focus {
            outline: none;
            border-color: #66b1ee;
            -webkit-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
            -moz-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
            -ms-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
            -o-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
            box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
        }

        .search-box .results {
            display: none;
            position: absolute;
            top: 35px;
            left: 0;
            right: 0;
            z-index: 9999;
            padding: 0;
            margin: 0;
            border-width: 1px;
            border-style: solid;
            border-color: #cbcfe2 #c8cee7 #c4c7d7;
            border-radius: 3px;
            background-color: #fdfdfd;
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fdfdfd), color-stop(100%, #eceef4));
            background-image: -webkit-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -moz-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -ms-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -o-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: linear-gradient(top, #fdfdfd, #eceef4);
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            overflow: hidden auto;
            max-height: 34vh;
        }

        .search-box .results li {
            display: block
        }

        .search-box .results li:first-child {
            margin-top: -1px
        }

        .search-box .results li:first-child:before,
        .search-box .results li:first-child:after {
            display: block;
            content: '';
            width: 0;
            height: 0;
            position: absolute;
            left: 50%;
            margin-left: -5px;
            border: 5px outset transparent;
        }

        .search-box .results li:first-child:before {
            border-bottom: 5px solid #c4c7d7;
            top: -11px;
        }

        .search-box .results li:first-child:after {
            border-bottom: 5px solid #fdfdfd;
            top: -10px;
        }

        .search-box .results li:first-child:hover:before,
        .search-box .results li:first-child:hover:after {
            display: none
        }

        .search-box .results li:last-child {
            margin-bottom: -1px
        }

        .search-box .results a {
            display: block;
            position: relative;
            margin: 0 -1px;
            padding: 6px 40px 6px 10px;
            color: #808394;
            font-weight: 500;
            text-shadow: 0 1px #fff;
            border: 1px solid transparent;
            border-radius: 3px;
        }

        .search-box .results a span {
            font-weight: 200
        }

        .search-box .results a:before {
            content: '';
            width: 18px;
            height: 18px;
            position: absolute;
            top: 50%;
            right: 10px;
            margin-top: -9px;
            background: url("https://cssdeck.com/uploads/media/items/7/7BNkBjd.png") 0 0 no-repeat;
        }

        .search-box .results a:hover {
            text-decoration: none;
            color: #fff;
            text-shadow: 0 -1px rgba(0, 0, 0, 0.3);
            border-color: #2380dd #2179d5 #1a60aa;
            background-color: #338cdf;
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #59aaf4), color-stop(100%, #338cdf));
            background-image: -webkit-linear-gradient(top, #59aaf4, #338cdf);
            background-image: -moz-linear-gradient(top, #59aaf4, #338cdf);
            background-image: -ms-linear-gradient(top, #59aaf4, #338cdf);
            background-image: -o-linear-gradient(top, #59aaf4, #338cdf);
            background-image: linear-gradient(top, #59aaf4, #338cdf);
            -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            -moz-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            -ms-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            -o-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
        }

        .lt-ie9 .search input#search-loc {
            line-height: 26px
        }
    </style>
@endpush
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col">

                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    <div class="flex-grow-1">
                                        <h4 class="fs-16 mb-1">Welcome, {{ Auth::user()->name }}</h4>
                                    </div>
                                    <div class="mt-3 mt-lg-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total
                                                    Instance</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#modalListInstances">
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                            class="counter-value"
                                                            data-target="{{ $total_instance }}"></span></h4>
                                                </a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-success rounded fs-3">
                                                    <i class="mdi mdi-bank"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->


                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total
                                                    SubInstance</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#modalListSubInstances">
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                            class="counter-value"
                                                            data-target="{{ $total_subinstance }}"></span></h4>
                                                </a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-info rounded fs-3">
                                                    <i class="mdi mdi-format-float-left"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total
                                                    Cluster</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalListCluster">
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                            class="counter-value" data-target="{{ $total_cluster }}"></span>
                                                    </h4>
                                                </a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-danger rounded fs-3">
                                                    <i class="mdi mdi-format-list-bulleted"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total
                                                    Device</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalListGateway">
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                            class="counter-value" data-target="{{ $total_device }}"></span>
                                                    </h4>
                                                </a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-warning rounded fs-3">
                                                    <i class="mdi mdi-devices"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>

                        {{-- grafik knob --}}
                        <div class="row">
                            <div class="col-xl-3 col-md-3">
                                <div class="card" style="height: 350px">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">
                                            Water Meter Status
                                        </h4>
                                    </div>

                                    <div class="card-body">
                                        <div class=" h-100 d-flex flex-column align-items-center justify-content-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <input type="text" readonly
                                                    value="{{ number_format($deviceStatusWaterMeter->percentage, 2, '.', '.') }}"
                                                    id="water-meter-status"
                                                    data-fgColor="{{ $deviceStatusWaterMeter->device_is_health ? '#45CB85' : ($deviceStatusWaterMeter->percentage >= 85 ? '#FFBE0B' : '#F06548') }}"
                                                    data-width="150" data-height="150" />
                                            </div>
                                            <div class="mt-3 d-flex align-items-end">
                                                <i class="mdi mdi-{{ $deviceStatusWaterMeter->device_is_health ? 'checkbox-marked-circle' : 'alert' }}"
                                                    style="font-size: 1.5rem; transform: translateY(-.2rem); margin-right: .2rem; color: {{ $deviceStatusWaterMeter->device_is_health ? '#45CB85' : ($deviceStatusWaterMeter->percentage >= 85 ? '#FFBE0B' : '#F06548') }}"></i>
                                                <h3 style="font-weight: bold"
                                                    class="text-{{ $deviceStatusWaterMeter->device_is_health ? 'success' : ($deviceStatusWaterMeter->percentage >= 85 ? 'warning' : 'danger') }}">
                                                    {{ $deviceStatusWaterMeter->device_is_health ? 'Success' : 'Warning' }}
                                                </h3>
                                            </div>
                                            <span style="font-size: 1.075rem"
                                                class="text-{{ $deviceStatusWaterMeter->device_is_health ? 'success' : ($deviceStatusWaterMeter->percentage >= 85 ? 'warning' : 'danger') }}">{{ $deviceStatusWaterMeter->amount_not_err }}/{{ $deviceStatusWaterMeter->amount_total }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3">
                                <div class="card" style="height: 350px">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">
                                            Power Meter Status
                                        </h4>
                                    </div>

                                    <div class="card-body">
                                        <div class=" h-100 d-flex flex-column align-items-center justify-content-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <input type="text" readonly
                                                    value="{{ number_format($deviceStatusPowerMeter->percentage, 2, '.', '.') }}"
                                                    id="power-meter-status"
                                                    data-fgColor="{{ $deviceStatusPowerMeter->device_is_health ? '#45CB85' : ($deviceStatusPowerMeter->percentage >= 85 ? '#FFBE0B' : '#F06548') }}"
                                                    data-width="150" data-height="150" />
                                            </div>
                                            <div class="mt-3 d-flex align-items-end">
                                                <i class="mdi mdi-{{ $deviceStatusPowerMeter->device_is_health ? 'checkbox-marked-circle' : 'alert' }}"
                                                    style="font-size: 1.5rem; transform: translateY(-.2rem); margin-right: .2rem; color: {{ $deviceStatusPowerMeter->device_is_health ? '#45CB85' : ($deviceStatusPowerMeter->percentage >= 85 ? '#FFBE0B' : '#F06548') }}"></i>
                                                <h3 style="font-weight: bold"
                                                    class="text-{{ $deviceStatusPowerMeter->device_is_health ? 'success' : ($deviceStatusPowerMeter->percentage >= 85 ? 'warning' : 'danger') }}">
                                                    {{ $deviceStatusPowerMeter->device_is_health ? 'Success' : 'Warning' }}
                                                </h3>
                                            </div>
                                            <span style="font-size: 1.075rem"
                                                class="text-{{ $deviceStatusPowerMeter->device_is_health ? 'success' : ($deviceStatusPowerMeter->percentage >= 85 ? 'warning' : 'danger') }}">{{ $deviceStatusPowerMeter->amount_not_err }}/{{ $deviceStatusPowerMeter->amount_total }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3">
                                <div class="card" style="height: 350px">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">
                                            Gas Meter Status</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class=" h-100 d-flex flex-column align-items-center justify-content-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <input type="text" readonly
                                                    value="{{ number_format($deviceStatusGasMeter->percentage, 2, '.', '.') }}"
                                                    id="gas-meter-status"
                                                    data-fgColor="{{ $deviceStatusGasMeter->device_is_health ? '#45CB85' : ($deviceStatusGasMeter->percentage >= 85 ? '#FFBE0B' : '#F06548') }}"
                                                    data-width="150" data-height="150" />
                                            </div>
                                            <div class="mt-3 d-flex align-items-end">
                                                <i class="mdi mdi-{{ $deviceStatusGasMeter->device_is_health ? 'checkbox-marked-circle' : 'alert' }}"
                                                    style="font-size: 1.5rem; transform: translateY(-.2rem); margin-right: .2rem; color: {{ $deviceStatusGasMeter->device_is_health ? '#45CB85' : ($deviceStatusGasMeter->percentage >= 85 ? '#FFBE0B' : '#F06548') }}"></i>
                                                <h3 style="font-weight: bold"
                                                    class="text-{{ $deviceStatusGasMeter->device_is_health ? 'success' : ($deviceStatusGasMeter->percentage >= 85 ? 'warning' : 'danger') }}">
                                                    {{ $deviceStatusGasMeter->device_is_health ? 'Success' : 'Warning' }}
                                                </h3>
                                            </div>
                                            <span style="font-size: 1.075rem"
                                                class="text-{{ $deviceStatusGasMeter->device_is_health ? 'success' : ($deviceStatusGasMeter->percentage >= 85 ? 'warning' : 'danger') }}">{{ $deviceStatusGasMeter->amount_not_err }}/{{ $deviceStatusGasMeter->amount_total }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3">
                                <div class="card" style="height: 350px">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1"> Overall System</h4>
                                    </div>

                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <i class="mdi mdi-{{ $isDeviceStatusError ? 'alert' : 'checkbox-marked-circle' }}"
                                            style="font-size: 9rem; color: {{ $isDeviceStatusError ? ($totalPercentageDeviceStatus >= 85 ? '#FFBE0B' : '#F06548') : '#45CB85' }}"></i>
                                        <h2 style="font-weight: bold; margin-top: -2.5rem"
                                            class="text-{{ $isDeviceStatusError ? ($totalPercentageDeviceStatus >= 85 ? 'warning' : 'danger') : 'success' }}">
                                            {{ $isDeviceStatusError ? 'Warning' : 'Success' }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- map --}}
                        <div class="row">
                            <div class="col-xl-9 col-md-9">
                                <div class="card" style="height: 450px">
                                    <div class="card-body">
                                        <div class="map-embed" id="map" style="height:100%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3">
                                <div class="card" style="height: 450px">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">The Newest 10 Instances</h4>
                                    </div>

                                    <div class="card-body" style="overflow-y: scroll;">
                                        <div class="table-responsive table-card">
                                            <table
                                                class="table table-borderless table-hover table-nowrap align-middle mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Code</th>
                                                        <th>Name</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($lastTenInstances as $lastTenInstance)
                                                        <tr
                                                            onclick="lastTenInstanceShowModalInstance(`{{ json_encode($lastTenInstance) }}`)">
                                                            <td>{{ $lastTenInstance->instance_code }}</td>
                                                            <td>{{ $lastTenInstance->instance_name }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-5 col-md-5">
                                <div class="card" style="height: 450px">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1"><i
                                                class="mdi mdi-book text-success fs-3"></i>Tickets List</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table
                                                class="table table-borderless table-hover table-nowrap align-middle mb-0 table-sm">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Subject</th>
                                                        <th>Status</th>
                                                        <th>Created At</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($tickets as $indexTicket => $ticket)
                                                        <tr style="cursor: pointer"
                                                            onclick="window.location.href = `{{ url('/') }}/panel/tickets?id={{ $ticket->id }}`">
                                                            <td>{{ $indexTicket + 1 }}</td>
                                                            <td>{{ $ticket->subject }}</td>

                                                            <td>
                                                                @if ($ticket->status == 'open')
                                                                    <span class="badge badge-soft-success p-2">
                                                                        {{ $ticket->status }}
                                                                    </span>
                                                                @elseif($ticket->status == 'acknowledge')
                                                                    <span class="badge badge-soft-info p-2">
                                                                        {{ $ticket->status }}
                                                                    </span>
                                                                @elseif($ticket->status == 'closed')
                                                                    <span class="badge badge-soft-dark p-2">
                                                                        {{ $ticket->status }}
                                                                    </span>
                                                                @elseif($ticket->status == 'canceled')
                                                                    <span class="badge badge-soft-dark p-2">
                                                                        {{ $ticket->status }}
                                                                    </span>
                                                                @elseif($ticket->status == 'need confirmation')
                                                                    <span class="badge badge-sofy-warning p-2">
                                                                        {{ $ticket->status }}
                                                                    </span>
                                                                @elseif($ticket->status == 'alert')
                                                                    <span class="badge badge-soft-danger p-2">
                                                                        {{ $ticket->status }}
                                                                    </span>
                                                                @endif

                                                            </td>
                                                            <td>{{ $ticket->created_at }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-4">
                                <div class="card" style="height: 450px">
                                    <div class="card-body">
                                        <script src="https://code.highcharts.com/highcharts.js"></script>
                                        <script src="https://code.highcharts.com/modules/exporting.js"></script>
                                        <script src="https://code.highcharts.com/modules/export-data.js"></script>
                                        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                                        <figure class="highcharts-figure">
                                            <div id="container"></div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3">
                                <div class="card" style="height: 450px">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Total tickets status</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table
                                                class="table table-borderless table-hover table-nowrap align-middle mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($ticketsByStatus as $ticketByStatus)
                                                        <tr style="cursor: pointer"
                                                            onclick="window.location.href = `{{ url('/') }}/panel/tickets?status={{ $ticketByStatus->name }}`">
                                                            <td>
                                                                @if ($ticketByStatus->name == 'open')
                                                                    <span class="badge badge-soft-success p-2">
                                                                        {{ $ticketByStatus->name }}
                                                                    </span>
                                                                @elseif($ticketByStatus->name == 'acknowledge')
                                                                    <span class="badge badge-soft-info p-2">
                                                                        {{ $ticketByStatus->name }}
                                                                    </span>
                                                                @elseif($ticketByStatus->name == 'closed')
                                                                    <span class="badge badge-soft-dark p-2">
                                                                        {{ $ticketByStatus->name }}
                                                                    </span>
                                                                @elseif($ticketByStatus->name == 'canceled')
                                                                    <span class="badge badge-soft-dark p-2">
                                                                        {{ $ticketByStatus->name }}
                                                                    </span>
                                                                @elseif($ticketByStatus->name == 'need confirmation')
                                                                    <span class="badge badge-sofy-warning p-2">
                                                                        {{ $ticketByStatus->name }}
                                                                    </span>
                                                                @elseif($ticketByStatus->name == 'alert')
                                                                    <span class="badge badge-soft-danger p-2">
                                                                        {{ $ticketByStatus->name }}
                                                                    </span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $ticketByStatus->y }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div style="margin-left: 5px;margin-right: 5px" class="alert alert-info"
                                                role="alert">
                                                <b>Total of all tickets : {{ count($tickets) }}</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-xl-4 col-md-4">
                                <div class="card" style="height: 450px">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1"><i
                                                class="mdi mdi-tag text-success fs-3"></i>
                                            Device By Type
                                        </h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table
                                                class="table table-borderless table-hover table-nowrap align-middle mb-0 table-sm">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Device Type </th>
                                                        <th>Qty</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($devicesByType as $deviceByType)
                                                        <tr style="cursor: pointer"
                                                            onclick="window.location.href = `{{ url('/') }}/panel/device?category={{ $deviceByType->category }}`">
                                                            <td>{{ $deviceByType->category }}</td>
                                                            <td>{{ $deviceByType->qty }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4">
                                <div class="card" style="height: 450px">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1"><i
                                                class="mdi mdi-bank text-success fs-3"></i>
                                            Device By
                                            Instances</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table
                                                class="table table-borderless table-hover table-nowrap align-middle mb-0 table-sm">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Intance Name </th>
                                                        <th>Qty</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($devicesByInstance as $deviceByInstance)
                                                        <tr style="cursor: pointer"
                                                            onclick="window.location.href = `{{ url('/') }}/panel/device?instance_app_id={{ $deviceByInstance->instance_app_id }}`">
                                                            <td>{{ $deviceByInstance->name }}</td>
                                                            <td>{{ $deviceByInstance->qty }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4">
                                <div class="card" style="height: 450px">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1"><i
                                                class="mdi mdi-map-marker text-success fs-3"></i> Device
                                            By
                                            Location</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive table-card">
                                            <table
                                                class="table table-borderless table-hover table-nowrap align-middle mb-0 table-sm">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Location </th>
                                                        <th>Qty</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($devicesByLocation as $deviceByLocation)
                                                        <tr style="cursor: pointer"
                                                            onclick="window.location.href = `{{ url('/') }}/panel/device?kabkot_id={{ $deviceByLocation->tbl_kabkot_id }}`">
                                                            <td>{{ $deviceByLocation->name }}</td>
                                                            <td>{{ $deviceByLocation->qty }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal List Instances -->
    <div class="modal fade" id="modalListInstances" tabindex="-1" aria-labelledby="modalListInstancesLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalListInstancesLabel">Total Instances</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th style="white-space: nowrap">APP ID</th>
                                    <th style="white-space: nowrap">APP Name</th>
                                    <th style="white-space: nowrap">Push URL</th>
                                    <th style="white-space: nowrap">Instance Code</th>
                                    <th style="white-space: nowrap">Instance Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($instances as $indexInstance => $instance)
                                    <tr>
                                        <td>{{ $indexInstance + 1 }}</td>
                                        <td>{{ $instance->appID }}</td>
                                        <td>{{ $instance->appName }}</td>
                                        <td>{{ $instance->push_url }}</td>
                                        <td>{{ $instance->instance_code }}</td>
                                        <td>{{ $instance->instance_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal List Instances -->

    <!-- Modal List Sub Instances -->
    <div class="modal fade" id="modalListSubInstances" tabindex="-1" aria-labelledby="modalListSubInstancesLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalListSubInstancesLabel">Total Sub Instances</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th style="white-space: nowrap">Instance</th>
                                    <th style="white-space: nowrap">Code</th>
                                    <th style="white-space: nowrap">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subinstances as $indexSubInstance => $subInstance)
                                    <tr>
                                        <td>{{ $indexSubInstance + 1 }}</td>
                                        <td>{{ $subInstance->instance ? $subInstance->instance->instance_name : '-' }}</td>
                                        <td>{{ $subInstance->code_subinstance }}</td>
                                        <td>{{ $subInstance->name_subinstance }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal List Sub Instances -->

    <!-- Modal List Cluster -->
    <div class="modal fade" id="modalListCluster" tabindex="-1" aria-labelledby="modalListClusterLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalListClusterLabel">Total Cluster</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th style="white-space: nowrap">Instansi</th>
                                    <th style="white-space: nowrap">Sub Instansi</th>
                                    <th style="white-space: nowrap">Code</th>
                                    <th style="white-space: nowrap">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clusters as $indexCluster => $cluster)
                                    <tr>
                                        <td>{{ $indexCluster + 1 }}</td>
                                        <td>{{ $cluster->instance->instance_name }}</td>
                                        <td>{{ $cluster->subinstance->name_subinstance }}</td>
                                        <td>{{ $cluster->kode }}</td>
                                        <td>{{ $cluster->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal List Cluster -->

    <!-- Modal List Gateways -->
    <div class="modal fade" id="modalListGateway" tabindex="-1" aria-labelledby="modalListGatewayLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalListGatewayLabel">Total Devices</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>App ID</th>
                                    <th>Instance</th>
                                    {{-- <th>Cluster</th> --}}
                                    <th>Category</th>
                                    <th>Hit Nms</th>
                                    <th>Dev EUI</th>
                                    <th>Dev Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($devices as $index => $device)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $device->appID }}</td>
                                        <td>{{ $device->instance->instance_name }}</td>
                                        {{-- <td>{{ $device->cluster->name }}</td> --}}
                                        <td>{{ $device->category }}</td>
                                        <td>{{ $device->hit_nms }}</td>
                                        <td>{{ $device->devEUI }}</td>
                                        <td>{{ $device->devName }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal List Gateways -->

    <!-- Modal Instance -->
    <div class="modal fade" id="lastTenInstanceModalInstance" tabindex="-1"
        aria-labelledby="lastTenInstanceModalInstanceLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lastTenInstanceModalInstanceLabel">Instance Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="white-space: nowrap">APP ID</th>
                                    <th style="white-space: nowrap">APP Name</th>
                                    <th style="white-space: nowrap">Push URL</th>
                                    <th style="white-space: nowrap">Instance Code</th>
                                    <th style="white-space: nowrap">Instance Name</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Instance -->

@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"
        integrity="sha512-NhRZzPdzMOMf005Xmd4JonwPftz4Pe99mRVcFeRDcdCtfjv46zPIi/7ZKScbpHD/V0HB1Eb+ZWigMqw94VUVaw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            var i = 1;

            function checkKosongLatLong() {
                if ($('#latitude').val() == '' || $('#longitude').val() == '') {
                    $('.alert-choose-loc').show();
                } else {
                    $('.alert-choose-loc').hide();
                }
            }
            var delay = (function() {
                var timer = 0;
                return function(callback, ms) {
                    clearTimeout(timer);
                    timer = setTimeout(callback, ms);
                };
            })()
            // initialize map
            const getLocationMap = L.map('map');
            // initialize OSM
            const osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
            const osmAttrib = 'Leaflet © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
            const osm = new L.TileLayer(osmUrl, {
                // minZoom: 0,
                // maxZoom: 3,
                attribution: osmAttrib
            });
            // render map
            getLocationMap.scrollWheelZoom.disable()
            @foreach ($instances as $ins)
                getLocationMap.setView(new L.LatLng("{{ $ins->latitude }}", "{{ $ins->longitude }}"), 7);
            @endforeach
            getLocationMap.addLayer(osm)
            // initial hidden marker, and update on click
            let location = '';

            @foreach ($instances as $instance)
                getToLoc("{{ $instance->latitude }}", "{{ $instance->longitude }}", getLocationMap,
                    "{{ $instance->id }}", "{{ $instance->instance_name }}");
            @endforeach

            function getToLoc(lat, lng, getLocationMap, id, instance_name) {
                const zoom = 17;
                var url_edit = "{{ url('/panel/instance/') }}/" + id + "/edit";
                $.ajax({
                    url: `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`,
                    dataType: 'json',
                    success: function(result) {
                        let marker = L.marker([lat, lng]).addTo(getLocationMap);
                        let list_of_location_html = '';
                        list_of_location_html += '<div>';
                        list_of_location_html += `<b>${instance_name}</b><br>`;
                        list_of_location_html += `<b>${result.display_name}</b><br>`;
                        list_of_location_html += `<span>latitude : ${result.lat}</span><br>`;
                        list_of_location_html += `<span>longitude: ${result.lon}</span><br>`;
                        list_of_location_html +=
                            `<a href="${url_edit}" target="_blank" class="btn btn-primary" style="color: white; margin-top: 1rem;">Edit</a>`;
                        list_of_location_html += '</div>';
                        marker.bindPopup(list_of_location_html);
                    }
                });
            }

            $('.datatable').DataTable();
        });
    </script>

    <script>
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Percentage of tickets status',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Tickets',
                colorByPoint: true,
                data: JSON.parse(`{!! $jsonPercentageTicketByStatus !!}`)
            }]
        });
    </script>

    <script>
        function lastTenInstanceShowModalInstance(jsonObjInstance) {
            const objInstance = JSON.parse(jsonObjInstance);
            const tbodyElement = document.querySelector('#lastTenInstanceModalInstance tbody');

            tbodyElement.innerHTML = '';
            tbodyElement.insertAdjacentHTML('beforeend',
                `
                <tr>
                    <td>${objInstance.appID}</td>
                    <td>${objInstance.appName}</td>
                    <td>${objInstance.push_url}</td>
                    <td>${objInstance.instance_code}</td>
                    <td>${objInstance.instance_name}</td>
                </tr>
                `
            );

            const modalLastTenInstanceDetail = new bootstrap.Modal(document.getElementById('lastTenInstanceModalInstance'));
            modalLastTenInstanceDetail.toggle('show');
        }
    </script>
    <script>
        $(function() {
            $("#water-meter-status").knob();
            $("#power-meter-status").knob();
            $("#gas-meter-status").knob();
        });
    </script>
@endpush
