@extends('layouts.master')
@section('title', 'Detail Smart Water Meter')
@section('content')

    <style>
        .my-custom-scrollbar {
            position: relative;
            height: 400px;
            overflow: auto;
        }

        .table-wrapper-scroll-y {
            display: block;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 360px;
            max-width: 800px;
            margin: 1em auto;
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


    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Detail Smart Water Meter : {{ $devEUI }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Detail Smart Water Meter</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('master_water_meter.index') }}" style="" class="btn btn-md btn-warning">
                                <i class="mdi mdi-arrow-left-bold"></i> Back
                            </a>
                        </div>
                    </div>

                    @if ($hit_nms == 'Y')
                        <div class="card">
                            <div class="card-body">
                                <center>
                                    @if ($lastData->status_valve == 'Open')
                                        <h4>Status Valve : <span
                                                class="badge rounded-pill badge-outline-success">{{ $lastData->status_valve }}</span>
                                        </h4>
                                    @elseif($lastData->status_valve == 'Close')
                                        <h4>Status Valve : <span
                                                class="badge rounded-pill badge-outline-danger">{{ $lastData->status_valve }}</span>
                                        </h4>
                                    @else
                                        <h4>Status Valve : <span
                                                class="badge rounded-pill badge-outline-dark">{{ $lastData->status_valve }}</span>
                                        </h4>
                                    @endif
                                    <h4>Last Updated : <span
                                            class="badge rounded-pill badge-outline-success">{{ $lastData->updated_at }}</span>
                                    </h4>
                                </center> <br>
                                <center>
                                    <input type="text" id="devEUI" name="devEUI" value="{{ $devEUI }}" hidden>
                                    <button type="submit" id="cek_status" class="btn btn-primary"
                                        style="margin-top:5px;">Read
                                        Valve Status</button>
                                    <button type="submit" id="open_valve" class="btn btn-success" style="margin-top:5px;">
                                        Open
                                        Valve</button>
                                    <button type="submit" id="close_valve" class="btn btn-danger"
                                        style="margin-top:5px;">Close
                                        Valve</button>
                                </center>
                            </div>
                        </div>
                    @endif


                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4">
                                    <form method="get"
                                        action="{{ url('/panel/master-water-meter/detail/' . $device_id) }}" id="form-date">
                                        <div class="input-group mb-4">
                                            <input type="text" class="form-control border-0 dash-filter-picker shadow"
                                                data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y"
                                                data-deafult-date="" name="date"
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
                                                        <td style="width: 50%">{{ $data->usage }} L</td>
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


                    @if ($hit_nms == 'Y')
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                            <table id="" class="table table-sm table-bordered ">
                                                <thead>
                                                    <tr>
                                                        <th>Battery Status</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($parsed_data as $data)
                                                        <tr>
                                                            <td style="width: 50%">{{ $data->batrai_status }} %</td>
                                                            <td>{{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}
                                                            </td>
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
                    @endif

                    @if ($hit_nms == 'Y')
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                            <table id="" class="table table-sm table-bordered " style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Temperature</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($parsed_data as $item)
                                                        <tr>
                                                            <td>{{ $item->temperatur }} C</td>
                                                            <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}
                                                            </td>
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
                    @endif


                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                        <table id="" class="table table-sm table-bordered " style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Total Flow</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($parsed_data as $item)
                                                    <tr>
                                                        <td>{{ $item->total_flow }} L</td>
                                                        <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
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
                text: 'Daily Usage'
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
                    text: 'Daily Usage'
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
        var batrai_status = "{{ json_encode($baterai_datas) }}";
        Highcharts.chart('chart-container', {
            chart: {
                type: 'line',
                scrollablePlotArea: {
                    minWidth: 2000,
                    scrollPositionX: 1
                }
            },
            title: {
                text: 'Baterai status'
            },
            subtitle: {
                text: "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}"
            },
            xAxis: {
                categories: dates
            },
            yAxis: {
                title: {
                    text: 'Baterai status %'
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
            series: [{
                name: 'Battery Status',
                data: JSON.parse(batrai_status)
            }]
        });
    </script>
    <script>
        var temperature = "{{ json_encode($temperature_datas) }}";
        Highcharts.chart('chart-container2', {
            chart: {
                type: 'line',
                scrollablePlotArea: {
                    minWidth: 2000,
                    scrollPositionX: 1
                }
            },
            title: {
                text: 'Temperature'
            },
            subtitle: {
                text: "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}"
            },
            xAxis: {
                categories: dates
            },
            yAxis: {
                title: {
                    text: 'Temperature'
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
            series: [{
                name: 'Temperature',
                data: JSON.parse(temperature)
            }]
        });
    </script>
    <script>
        var total_flow = "{{ json_encode($total_flow_datas) }}";
        Highcharts.chart('chart-container3', {
            chart: {
                type: 'line',
                scrollablePlotArea: {
                    minWidth: 2000,
                    scrollPositionX: 1
                }
            },
            title: {
                text: 'Total Flow'
            },
            subtitle: {
                text: "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}"
            },
            xAxis: {
                categories: dates
            },
            yAxis: {
                title: {
                    text: 'Total Flow'
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
            series: [{
                name: 'Total Flow',
                data: JSON.parse(total_flow)
            }]
        });
    </script>
    <script>
        $('#cek_status').click(function(e) {
            const devEUI = $('#devEUI').val();
            let data = {
                devEUI: devEUI,
            }
            Swal.fire({
                icon: 'question',
                title: 'Are You Sure to Read Valve Status ?',
                showCancelButton: true,
                confirmButtonText: `Yes`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('checkValve') }}',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        data: data,
                        success: function(res) {
                            Swal.fire({
                                icon: 'info',
                                title: 'Please Waiting Response From Server',
                                text: 'In progress to Read Valve Status',
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
                        url: '{{ route('openValve') }}',
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
                        url: '{{ route('closeValve') }}',
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
