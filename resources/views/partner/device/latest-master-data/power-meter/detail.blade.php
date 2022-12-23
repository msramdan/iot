@extends('layouts.master_partner')
@section('title', 'Detail Data Power Meter')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Detail Data Power Meter</h4>

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
                        <a href="{{ route('instances.master_power_meter.index') }}" style="" class="btn btn-md btn-warning"> <i class="mdi mdi-arrow-left-bold"></i>  Back
                            </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Command Downlink</h4>
                    </div>
                    <div class="card-body">
                        <center>
                            @if ($lastData->status_switch=='Open')
                                <h4>Status Switch : <span class="badge rounded-pill badge-outline-success">{{ $lastData->status_switch  }}</span>  </h4>
                            @elseif($lastData->status_switch=='Close')
                                <h4>Status Switch : <span class="badge rounded-pill badge-outline-danger">{{ $lastData->status_switch  }}</span>  </h4>
                            @else
                                <h4>Status Switch : <span class="badge rounded-pill badge-outline-dark">{{ $lastData->status_switch  }}</span></h4>
                            @endif
                            <h4>Last Updated : <span class="badge rounded-pill badge-outline-success">{{ $lastData->updated_at  }}</span>  </h4>
                        </center> <br>
                    </div>
                </div>
                <!-- Tegangan -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <form method="get" action="{{ url('/master-power-meter/detail/'.$device_id) }}" id="form-date">
                                    <div class="input-group mb-4">
                                        <input type="text" class="form-control border-0 dash-filter-picker shadow"
                                            data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y"
                                            data-deafult-date="" name="date"
                                            @if(!empty($start_dates) && !empty($end_dates))
                                            value="{{ date('d M, Y', strtotime($start_dates)) }} to {{ date('d M, Y', strtotime($end_dates)) }}"
                                            @else
                                            value=""
                                            @endif
                                            id="filter_date_data" placeholder="Filter by date"/>
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
                                <table id="" class="table tabel-bordered table-sm example-scroll" style="width:100%">
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
                            <div class="col-md-8">
                                <div id="chart-container">FusionCharts XT will load here!</div>
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
                                <table id="" class="table tabel-bordered table-sm example-scroll" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Arus</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parsed_data as $item)
                                        <tr>
                                            <td>{{ $item->arus }}</td>
                                            <td>{{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-8">
                                <div id="chart-container2">FusionCharts XT will load here!</div>
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
                                <table id="" class="table tabel-bordered table-sm example-scroll" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Frekuensi PLN</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($parsed_data as $item)
                                        <tr>
                                            <td>{{ $item->frekuensi_pln }}</td>
                                            <td>{{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-8">
                                <div id="chart-container3">FusionCharts XT will load here!</div>
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
                                <table id="" class="table tabel-bordered table-sm example-scroll" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Active Power</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($parsed_data as $item)
                                        <tr>
                                            <td>{{ $item->active_power }}</td>
                                            <td>{{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-8">
                                <div id="chart-container4">FusionCharts XT will load here!</div>
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
                                <table id="" class="table tabel-bordered table-sm example-scroll" style="width:100%">
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
                                            <td>{{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-8">
                                <div id="chart-container5">FusionCharts XT will load here!</div>
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
                                <table id="" class="table tabel-bordered table-sm example-scroll" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Total Energy</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($parsed_data as $item)
                                        <tr>
                                            <td>{{ $item->total_energy }}</td>
                                            <td>{{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-8">
                                <div id="chart-container6">FusionCharts XT will load here!</div>
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
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
<script type="text/javascript">
	FusionCharts.ready(function(){
            var chartObj = new FusionCharts({
            type: 'scrollline2d',
            renderAt: 'chart-container',
            width: '700',
            height: '450',
            dataFormat: 'json',
            dataSource: {
                "chart": {
                    "theme": "fusion",
                    "caption": "Tegangan",
                    "subcaption": "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}",
                    "xaxisname": "Dates",
                    "yaxisname": "Tegangan",
                    "showvalues": "1",
                    "numVisiblePlot": "12",
                    "scrollheight": "10",
                    "flatScrollBars": "1",
                    "scrollShowButtons": "0",
                    "scrollColor": "#cccccc",
                    "showHoverEffect": "1"
                },
                "categories": [{
                    "category":
                    [
                        @foreach ($parsed_data as $date)
                            {
                                "label": "{{ date('d M', strtotime($date->created_at)) }}"
                            },
                        @endforeach
                    ]
                }],
                "dataset": [{
                    "data": [
                        @foreach ($parsed_data as $data_parsed)
                            {
                            "value": "{{ $data_parsed->tegangan }} %"
                            },
                        @endforeach
                    ]
                }]
            }
        });
        chartObj.render();
    });
</script>
<script type="text/javascript">
	FusionCharts.ready(function(){
            var chartObj = new FusionCharts({
            type: 'scrollline2d',
            renderAt: 'chart-container2',
            width: '700',
            height: '450',
            dataFormat: 'json',
            dataSource: {
                "chart": {
                    "theme": "fusion",
                    "caption": "Arus",
                    "subcaption": "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}",
                    "xaxisname": "Dates",
                    "yaxisname": "Arus",
                    "showvalues": "1",
                    "numVisiblePlot": "12",
                    "scrollheight": "10",
                    "flatScrollBars": "1",
                    "scrollShowButtons": "0",
                    "scrollColor": "#cccccc",
                    "showHoverEffect": "1"
                },
                "categories": [{
                    "category":
                    [
                        @foreach ($parsed_data as $date)
                            {
                                "label": "{{ date('d M', strtotime($date->created_at)) }}"
                            },
                        @endforeach
                    ]
                }],
                "dataset": [{
                    "data": [
                        @foreach ($parsed_data as $data_parsed)
                            {
                            "value": "{{ $data_parsed->arus }}"
                            },
                        @endforeach
                    ]
                }]
            }
        });
        chartObj.render();
    });
</script>
<script type="text/javascript">
	FusionCharts.ready(function(){
            var chartObj = new FusionCharts({
            type: 'scrollline2d',
            renderAt: 'chart-container3',
            width: '700',
            height: '450',
            dataFormat: 'json',
            dataSource: {
                "chart": {
                    "theme": "fusion",
                    "caption": "Frekuensi PLN",
                    "subcaption": "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}",
                    "xaxisname": "Dates",
                    "yaxisname": "Frekuensi PLN",
                    "showvalues": "1",
                    "numVisiblePlot": "12",
                    "scrollheight": "10",
                    "flatScrollBars": "1",
                    "scrollShowButtons": "0",
                    "scrollColor": "#cccccc",
                    "showHoverEffect": "1"
                },
                "categories": [{
                    "category":
                    [
                        @foreach ($parsed_data as $date)
                            {
                                "label": "{{ date('d M', strtotime($date->created_at)) }}"
                            },
                        @endforeach
                    ]
                }],
                "dataset": [{
                    "data": [
                        @foreach ($parsed_data as $data_parsed)
                            {
                            "value": "{{ $data_parsed->frekuensi_pln }} L"
                            },
                        @endforeach
                    ]
                }]
            }
        });
        chartObj.render();
    });
</script>
<script type="text/javascript">
	FusionCharts.ready(function(){
            var chartObj = new FusionCharts({
            type: 'scrollline2d',
            renderAt: 'chart-container4',
            width: '700',
            height: '450',
            dataFormat: 'json',
            dataSource: {
                "chart": {
                    "theme": "fusion",
                    "caption": "Active Power",
                    "subcaption": "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}",
                    "xaxisname": "Dates",
                    "yaxisname": "Active Power",
                    "showvalues": "1",
                    "numVisiblePlot": "12",
                    "scrollheight": "10",
                    "flatScrollBars": "1",
                    "scrollShowButtons": "0",
                    "scrollColor": "#cccccc",
                    "showHoverEffect": "1"
                },
                "categories": [{
                    "category":
                    [
                        @foreach ($parsed_data as $date)
                            {
                                "label": "{{ date('d M', strtotime($date->created_at)) }}"
                            },
                        @endforeach
                    ]
                }],
                "dataset": [{
                    "data": [
                        @foreach ($parsed_data as $data_parsed)
                            {
                            "value": "{{ $data_parsed->active_power }} L"
                            },
                        @endforeach
                    ]
                }]
            }
        });
        chartObj.render();
    });
</script>
<script type="text/javascript">
	FusionCharts.ready(function(){
            var chartObj = new FusionCharts({
            type: 'scrollline2d',
            renderAt: 'chart-container5',
            width: '700',
            height: '450',
            dataFormat: 'json',
            dataSource: {
                "chart": {
                    "theme": "fusion",
                    "caption": "Power Factor",
                    "subcaption": "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}",
                    "xaxisname": "Dates",
                    "yaxisname": "Power Factor",
                    "showvalues": "1",
                    "numVisiblePlot": "12",
                    "scrollheight": "10",
                    "flatScrollBars": "1",
                    "scrollShowButtons": "0",
                    "scrollColor": "#cccccc",
                    "showHoverEffect": "1"
                },
                "categories": [{
                    "category":
                    [
                        @foreach ($parsed_data as $date)
                            {
                                "label": "{{ date('d M', strtotime($date->created_at)) }}"
                            },
                        @endforeach
                    ]
                }],
                "dataset": [{
                    "data": [
                        @foreach ($parsed_data as $data_parsed)
                            {
                            "value": "{{ $data_parsed->power_factor }} L"
                            },
                        @endforeach
                    ]
                }]
            }
        });
        chartObj.render();
    });
</script>
<script type="text/javascript">
	FusionCharts.ready(function(){
            var chartObj = new FusionCharts({
            type: 'scrollline2d',
            renderAt: 'chart-container6',
            width: '700',
            height: '450',
            dataFormat: 'json',
            dataSource: {
                "chart": {
                    "theme": "fusion",
                    "caption": "Total Energy",
                    "subcaption": "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}",
                    "xaxisname": "Dates",
                    "yaxisname": "Total Energy",
                    "showvalues": "1",
                    "numVisiblePlot": "12",
                    "scrollheight": "10",
                    "flatScrollBars": "1",
                    "scrollShowButtons": "0",
                    "scrollColor": "#cccccc",
                    "showHoverEffect": "1"
                },
                "categories": [{
                    "category":
                    [
                        @foreach ($parsed_data as $date)
                            {
                                "label": "{{ date('d M', strtotime($date->created_at)) }}"
                            },
                        @endforeach
                    ]
                }],
                "dataset": [{
                    "data": [
                        @foreach ($parsed_data as $data_parsed)
                            {
                            "value": "{{ $data_parsed->total_energy }} L"
                            },
                        @endforeach
                    ]
                }]
            }
        });
        chartObj.render();
    });
</script>
<script>
    $(document).ready(function () {
    $('.example-scroll').DataTable({
        scrollY: '300px',
        scrollCollapse: true,
        paging: false,
    });

    $('#filter_date_data').change(function() {
        var dates = $(this).val();
        var split_dates = dates.split(" to ");
        if ( split_dates.length >= 2 ) {
            $('#form-date').submit();
        }
    });
});
</script>
@endpush
