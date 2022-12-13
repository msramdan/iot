@extends('layouts.master')
@section('title', 'Data Gateway')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Parsed Data Water Meter</h4>

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
                                        <th>Rawdata</th>
                                        {{-- <th>Dev EUI</th> --}}
                                        <th>Frame Id</th>
                                        <th>Uplink Interval</th>
                                        <th>Beterai Status</th>
                                        <th>Temperatur</th>
                                        <th>Total Flow</th>
                                        <th>Date</th>
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
            data: 'rawdata_id',
            name: 'rawdata_id'
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
            data: 'created_at',
            name: 'created_at'
        },
    ]

    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('parsed-wm.index') }}",
        columns: columns
    });
</script>
@endpush
