@extends('layouts.master')
@section('title', 'Parsed Data Power Meter')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Parsed Data Power Meter</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Parsed Data Power Meter</li>
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
                            <div class="row">
                                <div class="col-md-3">
                                    <form method="get">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <select name="device" id="device" class="form-control">
                                                <option value="">--Device Name--</option>
                                                @foreach ($devices as $device)
                                                    <option value="{{ $device->id }}">{{ $device->devName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm" id="dataTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Rawdata</th>
                                            <th>Device Name</th>
                                            <th>Frame Id</th>
                                            <th>Tegangan</th>
                                            <th>Arus</th>
                                            <th>Frekuensi PLN</th>
                                            <th>Active Power</th>
                                            <th>Power Factor</th>
                                            <th>Total Energy</th>
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
        $('#device').select2();

        let columns = [{
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
                data: 'device_name',
                name: 'device_name'
            },
            {
                data: 'frame_id',
                name: 'frame_id'
            },
            {
                data: 'tegangan',
                name: 'tegangan'
            },
            {
                data: 'arus',
                name: 'arus'
            },
            {
                data: 'frekuensi_pln',
                name: 'frekuensi_pln'
            },
            {
                data: 'active_power',
                name: 'active_power'
            },
            {
                data: 'power_factor',
                name: 'power_factor',
            },
            {
                data: 'total_energy',
                name: 'total_energy',
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
        ];

        const params = new Proxy(new URLSearchParams(window.location.search), {
            get: (searchParams, prop) => searchParams.get(prop),
        });
        // Get the value of "some_key" in eg "https://example.com/?some_key=some_value"
        let query = params.parsed_data; // "some_value"
        let device_id = params.device_id;
        var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('parsed-pm.index') }}",
                data: function(s) {
                    s.device = $('select[name=device] option').filter(':selected').val()
                    s.device_id = device_id;
                    s.parsed_data = query
                }
            },
            columns: columns
        });

        $('#device').change(function() {
            table.draw();
        })
    </script>
@endpush
