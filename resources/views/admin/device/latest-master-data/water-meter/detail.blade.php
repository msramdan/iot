@extends('layouts.master')
@section('title', 'Mater Latest Data Device')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Detail Data Water Meter</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detail Data Water Meter</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" >
                        <a href="{{ route('master_water_meter.index') }}" style="" class="btn btn-md btn-warning"> <i class="mdi mdi-arrow-left-bold"></i>  Back
                            </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Command Downlink</h4>
                    </div>
                    <div class="card-body">
                        <center>
                            <h4>Status Valve : </h4>
                            <h4>Updated : </h4>
                        </center>
                        <center>
							<a href="" target="_blank" class="btn btn-primary" style="margin-top:5px;">Read Valve Status</a>
							<a href="" target="_blank" class="btn btn-success" style="margin-top:5px;">Open Valve</a>
							<a href="" target="_blank" class="btn btn-danger" style="margin-top:5px;">Close Valve</a>
						</center>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <form method="get" action="{{ url('/panel/master-water-meter/detail/'.$device_id) }}" id="form-date">
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
                    <div class="card-body" >
                        <div class="row" style="overflow-x:scroll">
                            <div class="col-md-6">
                                <table id="" class="table tabel-bordered table-sm example-scroll" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Batrai Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parsed_data as $data)
                                        <tr>
                                            <td>{{ $data->batrai_status }} %</td>
                                            <td>{{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div  id="chart-container"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="overflow-x:scroll">
                            <div class="col-md-6">
                                <table id="" class="table tabel-bordered table-sm example-scroll" style="width:100%">
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
                                            <td>{{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div id="chart-container2"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row" style="overflow-x:scroll">
                            <div class="col-md-6">
                                <table id="" class="table tabel-bordered table-sm example-scroll" style="width:100%">
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
                                            <td>{{ date('d/m/Y H:i:s', strtotime($data->created_at)) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div id="chart-container3"></div>
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
                    "caption": "Baterai status",
                    "subcaption": "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}",
                    "xaxisname": "Dates",
                    "yaxisname": "Baterai",
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
                            "value": "{{ $data_parsed->batrai_status }} %"
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
                    "caption": "Temperature",
                    "subcaption": "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}",
                    "xaxisname": "Dates",
                    "yaxisname": "TemperaturE",
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
                            "value": "{{ $data_parsed->temperatur }}"
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
                    "caption": "Total Flow",
                    "subcaption": "{{ date('d M Y', strtotime($start_dates)) }} - {{ date('d M Y', strtotime($end_dates)) }}",
                    "xaxisname": "Dates",
                    "yaxisname": "Total Flow",
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
                            "value": "{{ $data_parsed->total_flow }} L"
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
