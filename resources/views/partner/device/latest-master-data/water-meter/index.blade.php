@extends('layouts.master')
@section('title', 'Mater Latest Data Water Meter')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Master Data Water Meter</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Parsed Data Water Meter</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm" id="dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Device</th>
                                        <th>Dev EUI</th>
                                        <th>Frame Id</th>
                                        <th>Uplink Interval</th>
                                        <th>Beterai Status</th>
                                        <th>Temperatur</th>
                                        <th>Total Flow</th>
                                        <th>Status Valve</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@push('js')
<script>
    let columns = [
        {
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'device',
            name: 'device',
        },
        {
            data: 'devEUI',
            name: 'devEUI',
        },
        {
            data: 'frame_id',
            name: 'frame_id'
        },
        {
            data: 'uplink_interval',
            name: 'uplink_interval'
        },
        {
            data: 'batrai_status',
            name: 'batrai_status'
        },
        {
            data: 'temperatur',
            name: 'temperatur'
        },
        {
            data: 'total_flow',
            name: 'total_flow'
        },
        {
            data: 'status_valve',
            name: 'status_valve'
        },
        {
            data: 'detail',
            name: 'detail'
        },
    ];

    const table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('master_water_meter.index') }}",
        columns: columns
    });
</script>
@endpush
