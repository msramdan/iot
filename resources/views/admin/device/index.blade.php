@extends('layouts.master')
@section('title', 'Data Device')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Device</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Device</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            @can('device_create')
                            <a href="{{ route('device.create') }}" class="btn btn-md btn-secondary"> <i class="mdi mdi-plus"></i>  Create
                            </a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <form method="get">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <select name="category_device" id="category_device" class="form-control">
                                                <option value="">-- Filter By Category Device --</option>
                                                <option value="Water Meter">Water Meter</option>
                                                <option value="Power Meter">Power Meter</option>
                                                <option value="Gas Meterr">Gas Meter</option>
                                            </select>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <form method="get">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <select name="instance" id="instance" class="form-control">
                                                <option value="">-- Filter By Instance --</option>
                                                @foreach ($instances as $instance)
                                                <option value="{{ $instance->appID }}">{{ $instance->instance_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Cluster</th>
                                            <th>Category</th>
                                            <th>App ID</th>
                                            <th>App EUI</th>
                                            <th>App Key</th>
                                            <th>Dev EUI</th>
                                            <th>Dev Name</th>
                                            <th>Dev Type</th>
                                            <th>Region</th>
                                            <th>Subnet</th>
                                            <th>Auth Type</th>
                                            @canany(['device_show', 'device_update', 'device_delete'])
                                                <th>Action</th>
                                            @endcanany
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

    </div>
@endsection
@push('js')
    <script>
        $('#instance').select2();

        let base_url = "{{ url('/') }}";

        const action =
            '{{ auth()->user()->can('device_update') || auth()->user()->can('device_delete')? 'yes yes yes': '' }}'
        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'cluster',
                name: 'cluster',
            },
            {
                data: 'category',
                name: 'category'
            },
            {
                data: 'appID',
                name: 'appID'
            },
            {
                data: 'appEUI',
                name: 'appEUI'
            },
            {
                data: 'appKey',
                name: 'appKey'
            },
            {
                data: 'devEUI',
                name: 'devEUI'
            },
            {
                data: 'devName',
                name: 'devName'
            },
            {
                data: 'devType',
                name: 'devType'
            },
            {
                data: 'region',
                name: 'region'
            },
            {
                data: 'subnet',
                name: 'subnet'
            },
            {
                data: 'authType',
                name: 'authType'
            }
        ]

        if (action) {
            columns.push({
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            })
        }

       var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('device.index') }}",
                data: function (s) {
                    s.instance = $('select[name=instance] option').filter(':selected').val()
                    s.category_device = $('select[name=category_device] option').filter(':selected').val()
                }
            },
            columns: columns
        });

        $('#instance').change(function() {
            table.draw();
        })

        $('#category_device').change(function() {
            table.draw();
        })
    </script>
@endpush
