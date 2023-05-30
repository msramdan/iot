@extends('layouts.master')
@section('title', 'Detail Smart Gas Meter')
@section('content')
    <style>
        .my-custom-scrollbar {
            position: relative;
            height: 400px;
            overflow: auto;
        }

        .my-custom-scrollbar2 {
            position: relative;
            height: 250px;
            overflow: auto;
        }

        .table-wrapper-scroll-y {
            display: block;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>

    <!-- Default Modals -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                @php
                    $cekDevice = DB::table('history_topup_gas_meter')
                        ->where('device_id', $device_id)
                        ->where('status', 'Pending')
                        ->first();
                @endphp
                <form action="{{ route('topup') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <h5 class="fs-15">
                            <div class="col-xxl-12">
                                <div>
                                    @if ($cekDevice)
                                        <center>
                                            <i class="mdi mdi-alert" style="font-size: 8rem; color: #F06548"></i>
                                            <p><span style="color: red">Note : There is still a queue of top up requests on
                                                    the
                                                    server</span></p>
                                        </center>
                                    @else
                                        <label for="firstName" class="form-label">Total Gas (m3)</label>
                                        <input type="number" autocomplete="off" step="any" name="total"
                                            class="form-control" id="firstName" placeholder="" required>
                                    @endif
                                </div>
                                <br>
                                <div>
                                    <input type="hidden" name="devEUI" value="{{ $devEUI }}" class="form-control"
                                        id="firstName" placeholder="" required>
                                    <input type="hidden" name="device_id" value="{{ $device_id }}" class="form-control"
                                        id="device_id" placeholder="" required>
                                </div>
                            </div>
                        </h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        @if (!$cekDevice)
                            <button type="submit" class="btn btn-primary">Submit</button>
                        @endif

                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Detail Smart Gas Meter : {{ $devEUI }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Detail Smart Gas Meter</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('master_gas_meter.index') }}" style="" class="btn btn-md btn-warning">
                                <i class="mdi mdi-arrow-left-bold"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar2">
                                        <center>

                                            @if ($lastData->meter_status_word != null)
                                                @php
                                                    $json = json_decode($lastData->meter_status_word);
                                                @endphp
                                                <h4>Type : <span class="">{{ $json[1] }}</span>
                                                </h4>
                                            @else
                                                <h4>Type : <span class="">-</span>
                                                </h4>
                                            @endif
                                            @if ($lastData->valve_status == 'Valve Open')
                                                <h4>Status Valve : <span
                                                        class="badge rounded-pill badge-outline-success">{{ $lastData->valve_status }}</span>
                                                </h4>
                                            @elseif($lastData->valve_status == 'Valve Close')
                                                <h4>Status Valve : <span
                                                        class="badge rounded-pill badge-outline-danger">{{ $lastData->valve_status }}</span>
                                                </h4>
                                            @else
                                                <h4>Status Valve : <span class="">-</span>
                                                </h4>
                                            @endif

                                            @if ($lastData->updated_at != null)
                                                <h4>Last Updated : <span
                                                        class="badge rounded-pill badge-outline-success">{{ $lastData->updated_at }}</span>
                                                </h4>
                                            @else
                                                <h4>Last Updated : <span class="">-</span>
                                                </h4>
                                            @endif


                                        </center> <br>
                                        <center>
                                            <input type="text" id="devEUI" name="devEUI" value="{{ $devEUI }}"
                                                hidden>
                                            @if ($lastData->meter_status_word != null)
                                                @if ($json[1] == 'Prepaid')
                                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                        style="margin-top:5px" data-bs-target="#myModal">Top Up</button>
                                                @endif
                                                <button type="submit" id="open_valve" class="btn btn-success"
                                                    style="margin-top:5px;">
                                                    Open
                                                    Valve</button>
                                                <button type="submit" id="close_valve" class="btn btn-danger"
                                                    style="margin-top:5px;">
                                                    Close Valve</button>
                                            @endif

                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>History Top Up Gas</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar2">
                                        <table id="" class="table table-sm table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Total Gas</th>
                                                    <th>User</th>
                                                    <th>Top Up date </th>
                                                    <th>Response date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($history as $data)
                                                    <tr>
                                                        <td>{{ $data->total_gas }} m3</td>
                                                        <td>{{ $data->name }}
                                                        </td>
                                                        <td>{{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}
                                                        </td>
                                                        <td>
                                                            @if ($data->updated_at)
                                                                {{ date('d/m/Y H:i:s', strtotime($data->updated_at)) }}
                                                            @else
                                                                -
                                                            @endif

                                                        </td>
                                                        <td>{{ $data->status }}</td>
                                                        @if ($data->status == 'Pending')
                                                            <td><a href="{{ route('resend', $data->id) }}"
                                                                    class="btn btn-success">Resend</a></td>
                                                        @else
                                                            <td><button class="btn btn-success" disabled>Resend</button>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4">
                                    <form method="get"
                                        action="{{ url('/panel/master-gas-meter/detail/' . $device_id) }}"
                                        id="form-date">
                                        <div class="input-group mb-4">
                                            <input type="text" class="form-control border-0 dash-filter-picker shadow"
                                                data-provider="flatpickr" data-range-date="true"
                                                data-date-format="d M, Y" data-deafult-date="" name="date"
                                                @if (!empty($start_dates) && !empty($end_dates)) value="{{ date('d M, Y', strtotime($start_dates)) }} to {{ date('d M, Y', strtotime($end_dates)) }}"
                                            @else
                                            value="" @endif
                                                id="filter_date_data" placeholder="Filter by date" />
                                            <div class="input-group-text bg-primary border-primary text-white">
                                                <i class="ri-calendar-2-line"></i>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                        <table id="" class="table table-sm table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th>Usage</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dailyUsages as $data)
                                                    <tr>
                                                        <td style="width: 50%">{{ $data->usage }} m3</td>
                                                        <td>{{ date('d/m/Y', strtotime($data->date)) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <figure class="highcharts-figure">
                                        <div id="chart-container0"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                        <table id="" class="table table-sm table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Gas Consumption</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataTable as $data)
                                                    <tr>
                                                        <td>{{ $data->gas_consumption }} m3</td>
                                                        <td>{{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <figure class="highcharts-figure">
                                        <div id="chart-container"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                        <table id="" class="table table-sm table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Total Gas Purchase</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataTable as $item)
                                                    <tr>
                                                        <td>{{ $item->gas_total_purchase }} m3</td>
                                                        <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <figure class="highcharts-figure">
                                        <div id="chart-container2"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                        <table id="" class="table table-sm table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Purchase Remain</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataTable as $res)
                                                    <tr>
                                                        <td>{{ $res->purchase_remain }} m3</td>
                                                        <td>{{ date('d/m/Y H:i:s', strtotime($res->created_at)) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <figure class="highcharts-figure">
                                        <div id="chart-container3"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                        <table id="" class="table table-sm table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Balance of Battery</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataTable as $res)
                                                    <tr>
                                                        <td>{{ $res->balance_of_battery }} %</td>
                                                        <td>{{ date('d/m/Y H:i:s', strtotime($res->created_at)) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <figure class="highcharts-figure">
                                        <div id="chart-container4"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        var dates = "{{ json_encode($parsed_dates) }}";
        dates = JSON.parse(dates).map((date) => {
            return moment.unix(date).format('DD/MM/YYYY HH:mm')
        });
    </script>
    <script>
        var daily_dates = "{{ json_encode($daily_usage_dates) }}";
        var daily_usage = "{{ json_encode($daily_usage_datas) }}";
        daily_dates = JSON.parse(daily_dates).map((daily_date) => {
            return moment.unix(daily_date).format('DD/MM/YYYY')
        });
        Highcharts.chart('chart-container0', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'center',
                text: 'Daily Usage {{ $devName }} <br> {{ $devEUI }}'
            },
            subtitle: {
                text: "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}"
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                title: {
                    text: 'Dates'
                },
                categories: daily_dates
            },
            yAxis: {
                title: {
                    text: 'Usage'
                }

            },
            legend: {
                enabled: true
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                }
            },
            credits: {
                enabled: false
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
            },

            series: [{
                name: "Usage",
                colorByPoint: true,
                data: JSON.parse(daily_usage)
            }],
        });
    </script>
    <script>
        var gas_consumption = "{{ json_encode($gas_consumtion_datas) }}";
        Highcharts.chart('chart-container', {
            chart: {
                type: 'line',
                scrollablePlotArea: {
                    minWidth: 2000,
                    scrollPositionX: 1
                }
            },
            title: {
                text: 'Gas Consumption {{ $devName }} <br> {{ $devEUI }}'
            },
            subtitle: {
                text: "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}"
            },
            xAxis: {
                categories: dates
            },
            yAxis: {
                title: {
                    text: 'Gas Consumption'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Gas Consumption',
                data: JSON.parse(gas_consumption)
            }]
        });
    </script>
    <script>
        var gas_total_purchase = "{{ json_encode($gas_total_purchase_datas) }}";
        Highcharts.chart('chart-container2', {
            chart: {
                type: 'line',
                scrollablePlotArea: {
                    minWidth: 2000,
                    scrollPositionX: 1
                }
            },
            title: {
                text: 'Total Gas Purchase {{ $devName }} <br> {{ $devEUI }}'
            },
            subtitle: {
                text: "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}"
            },
            xAxis: {
                categories: dates
            },
            yAxis: {
                title: {
                    text: 'Total Gas Purchase'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Total Gas Purchase',
                data: JSON.parse(gas_total_purchase)
            }]
        });
    </script>
    <script>
        var purchase_remain = "{{ json_encode($purchase_remain_datas) }}";
        Highcharts.chart('chart-container3', {
            chart: {
                type: 'line',
                scrollablePlotArea: {
                    minWidth: 2000,
                    scrollPositionX: 1
                }
            },
            title: {
                text: 'Purchase Remain {{ $devName }} <br> {{ $devEUI }}'
            },
            subtitle: {
                text: "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}"
            },
            xAxis: {
                categories: dates
            },
            yAxis: {
                title: {
                    text: 'Purchase Remain'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Purchase Remain',
                data: JSON.parse(purchase_remain)
            }]
        });
    </script>
    <script>
        var balance_of_batery = "{{ json_encode($balance_of_bateray_datas) }}";
        Highcharts.chart('chart-container4', {
            chart: {
                type: 'line',
                scrollablePlotArea: {
                    minWidth: 2000,
                    scrollPositionX: 1
                }
            },
            title: {
                text: 'Balance of Battery {{ $devName }} <br> {{ $devEUI }}'
            },
            subtitle: {
                text: "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}"
            },
            xAxis: {
                categories: dates
            },
            yAxis: {
                title: {
                    text: 'Balance of Battery'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Balance of Battery',
                data: JSON.parse(balance_of_batery)
            }]
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#filter_date_data').change(function() {
                var dates = $(this).val();
                var split_dates = dates.split(" to ");
                if (split_dates.length >= 2) {
                    var start = new Date(split_dates[0].replace(',', '')).getTime();
                    var end = new Date(split_dates[1].replace(',', '')).getTime();

                    var differenceTime = end - start;
                    var differenceDay = differenceTime / (1000 * 3600 * 24);

                    if (differenceDay > 30) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Invalid filter Date',
                            text: 'Maximum filter date is 30 days',
                            allowOutsideClick: false,
                            confirmButtonText: `OK`,
                        })
                    } else {
                        $('#form-date').submit();
                    }
                }
            });
        });
    </script>
    <script>
        $('#open_valve').click(function(e) {
            const devEUI = $('#devEUI').val();
            let data = {
                devEUI: devEUI,
            }
            Swal.fire({
                icon: 'question',
                title: 'Are You Sure to Open Valve ?',
                showCancelButton: true,
                confirmButtonText: `Yes`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('openValveGas') }}',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        data: data,
                        success: function(res) {
                            Swal.fire({
                                icon: 'info',
                                title: 'Please Waiting Response From Server',
                                text: 'In progress to Open Valve',
                                allowOutsideClick: false,
                            }).then(function() {
                                location.reload();
                            })
                        },
                    })
                }
            });
        })
    </script>
    <script>
        $('#close_valve').click(function(e) {
            const devEUI = $('#devEUI').val();
            let data = {
                devEUI: devEUI,
            }
            Swal.fire({
                icon: 'question',
                title: 'Are You Sure to Close Valve ?',
                showCancelButton: true,
                confirmButtonText: `Yes`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('closeValveGas') }}',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        data: data,
                        success: function(res) {
                            Swal.fire({
                                icon: 'info',
                                title: 'Please Waiting Response From Server',
                                text: 'In progress to Close Valve',
                                allowOutsideClick: false,
                            }).then(function() {
                                location.reload();
                            })
                        },
                    })
                }
            });
        })
    </script>
@endpush
