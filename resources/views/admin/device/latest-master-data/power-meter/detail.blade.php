@extends('layouts.master')
@section('title', 'Detail Data Power Meter')
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
                    <h4 class="mb-sm-0">Detail Data Power Meter Dev Eui : {{ $devEUI }} </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detail Data Power Meter</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" >
                        <a href="{{ route('master_power_meter.index') }}" style="" class="btn btn-md btn-warning"> <i class="mdi mdi-arrow-left-bold"></i>  Back
                            </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Command Downlink</h4>
                    </div>
                    <div class="card-body">
                        <center>
                            @if ($lastData->status_switch=='OFF')
                                <h4>Status Switch : <span class="badge rounded-pill badge-outline-success">{{ $lastData->status_switch  }}</span>  </h4>
                            @elseif($lastData->status_switch=='ON')
                                <h4>Status Switch : <span class="badge rounded-pill badge-outline-danger">{{ $lastData->status_switch  }}</span>  </h4>
                            @else
                                <h4>Status Switch : <span class="badge rounded-pill badge-outline-dark">{{ $lastData->status_switch  }}</span></h4>
                            @endif
                            <h4>Last Updated : <span class="badge rounded-pill badge-outline-success">{{ $lastData->updated_at  }}</span>  </h4>
                        </center> <br>

                        <center>
                            <input type="text" id="devEUI" name="devEUI" value="{{ $devEUI }}" hidden>
                            <button type="submit" id="validation"  class="btn btn-primary" style="margin-top:5px;">Validation Switch</button>
							<button id="open_switch" class="btn btn-success" style="margin-top:5px;">Switch OFF</button>
							<button id="close_switch" class="btn btn-danger" style="margin-top:5px;">Switch ON</button>
						</center>
                    </div>
                </div>
                <!-- Daily Usage -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <form method="get"
                                    action="{{ url('/panel/master-power-meter/detail/' . $device_id) }}" id="form-date">
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
                <!-- End Daily Usage -->
                <!-- Tegangan -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table id="" class="table tabel-bordered table-sm " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Tegangan</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parsed_data as $data)
                                        <tr>
                                            <td>{{ $data->tegangan }} V</td>
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
                <!-- End Tegangan -->
                <!-- Arus -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table id="" class="table tabel-bordered table-sm " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Arus</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parsed_data as $item)
                                        <tr>
                                            <td>{{ $item->arus }} A</td>
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
                <!-- End Arus -->
                <!-- Frekuensi PLN -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table id="" class="table tabel-bordered table-sm " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Frekuensi PLN</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($parsed_data as $item)
                                        <tr>
                                            <td>{{ $item->frekuensi_pln }} Hz</td>
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
                <!-- End Frekuensi PLN -->
                <!-- Active Power -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table id="" class="table tabel-bordered table-sm " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Active Power</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($parsed_data as $item)
                                        <tr>
                                            <td>{{ $item->active_power }} kW</td>
                                            <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
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
                <!-- End Active Power -->
                <!-- Power Factor -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table id="" class="table tabel-bordered table-sm " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Power Factor</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($parsed_data as $item)
                                        <tr>
                                            <td>{{ $item->power_factor }}</td>
                                            <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <figure class="highcharts-figure">
                                    <div id="chart-container5"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Power Factor -->
                <!-- Total Energy -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table id="" class="table tabel-bordered table-sm " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Total Energy</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($parsed_data as $item)
                                        <tr>
                                            <td>{{ $item->total_energy }} kWh</td>
                                            <td>{{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <figure class="highcharts-figure">
                                    <div id="chart-container6"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Total Energy -->
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
    dates = JSON.parse(dates).map((date) => { return moment.unix(date).format('DD/MM/YYYY HH:mm') });
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
    var tegangan = "{{ json_encode($tegangan_datas) }}";
    Highcharts.chart('chart-container', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 2000,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Tegangan'
        },
        subtitle: {
            text: "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}"
        },
        xAxis: {
            categories: dates
        },
        yAxis: {
            title: {
                text: 'Tegangan'
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
        series: [
            {
                name: 'tegangan',
                data: JSON.parse(tegangan)
            }
        ]
    });
</script>
<script>
    var arus = "{{ json_encode($arus_datas) }}";
    Highcharts.chart('chart-container2', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 2000,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Arus'
        },
        subtitle: {
            text: "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}"
        },
        xAxis: {
            categories: dates
        },
        yAxis: {
            title: {
                text: 'Arus'
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
        series: [
            {
                name: 'arus',
                data: JSON.parse(arus)
            }
        ]
    });
</script>
<script>
    var frekuensi_pln = "{{ json_encode($frekuensi_datas) }}";
    Highcharts.chart('chart-container3', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 2000,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Frekuensi PLN'
        },
        subtitle: {
            text: "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}"
        },
        xAxis: {
            categories: dates
        },
        yAxis: {
            title: {
                text: 'Frekuensi PLN'
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
        series: [
            {
                name: 'Frekuensi PLN',
                data: JSON.parse(frekuensi_pln)
            }
        ]
    });
</script>
<script>
    var active_power = "{{ json_encode($active_power_datas) }}";
    Highcharts.chart('chart-container4', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 2000,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Active Power'
        },
        subtitle: {
            text: "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}"
        },
        xAxis: {
            categories: dates
        },
        yAxis: {
            title: {
                text: 'Active Power'
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
        series: [
            {
                name: 'Active Power',
                data: JSON.parse(active_power)
            }
        ]
    });
</script>
<script>
    var power_factor = "{{ json_encode($power_factor_datas) }}";
    Highcharts.chart('chart-container5', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 2000,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Power Factor'
        },
        subtitle: {
            text: "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}"
        },
        xAxis: {
            categories: dates
        },
        yAxis: {
            title: {
                text: 'Power Factor'
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
        series: [
            {
                name: 'Power Factor',
                data: JSON.parse(power_factor)
            }
        ]
    });
</script>
<script>
    var total_energy = "{{ json_encode($total_energy_datas) }}";
    Highcharts.chart('chart-container6', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 2000,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Total Energy'
        },
        subtitle: {
            text: "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}"
        },
        xAxis: {
            categories: dates
        },
        yAxis: {
            title: {
                text: 'Total Energy'
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
        series: [
            {
                name: 'Total Energy',
                data: JSON.parse(total_energy)
            }
        ]
    });
</script>

<script>
    $(document).ready(function () {

    $('#filter_date_data').change(function() {
        var dates = $(this).val();
        var split_dates = dates.split(" to ");
        if ( split_dates.length >= 2 ) {
            $('#form-date').submit();
        }
    });
});
</script>

<script>
        $('#open_switch').click(function(e) {
            const devEUI = $('#devEUI').val();
            let data = {
                devEUI: devEUI,
            }
                Swal.fire({
                    icon: 'question',
                    title: 'Are You Sure to Open Switch ?',
                    showCancelButton: true,
                    confirmButtonText: `Yes`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                            type: 'POST',
                            url: '{{ route('openSwitch') }}',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            data: data,
                            success: function(res) {
                                    Swal.fire({
                                        icon: 'info',
                                        title: 'Please Waiting Response From Server',
                                        text: 'In progress to Open Switch',
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
        $('#validation').click(function(e) {
            const devEUI = $('#devEUI').val();
            let data = {
                devEUI: devEUI,
            }
                Swal.fire({
                    icon: 'question',
                    title: 'Are You Sure to Validation Switch ?',
                    showCancelButton: true,
                    confirmButtonText: `Yes`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                            type: 'POST',
                            url: '{{ route('validationSwitch') }}',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            data: data,
                            success: function(res) {
                                    Swal.fire({
                                        icon: 'info',
                                        title: 'Please Waiting Response From Server',
                                        text: 'In progress to Validation Switch',
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
        $('#close_switch').click(function(e) {
            const devEUI = $('#devEUI').val();
            let data = {
                devEUI: devEUI,
            }
                Swal.fire({
                    icon: 'question',
                    title: 'Are You Sure to Close Switch ?',
                    showCancelButton: true,
                    confirmButtonText: `Yes`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                            type: 'POST',
                            url: '{{ route('closeSwitch') }}',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            data: data,
                            success: function(res) {
                                    Swal.fire({
                                        icon: 'info',
                                        title: 'Please Waiting Response From Server',
                                        text: 'In progress to Close Switch',
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
