@extends('layouts.master')
@section('title', 'Data Device')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">MANAGEMENT DEVICE</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">MANAGEMENT DEVICE</li>
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
                                <a href="{{ route('device.create') }}" class="btn btn-md btn-secondary"> <i class="mdi mdi-plus"></i> Create
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
                                                <option value="Gas Meter">Gas Meter</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <form method="get">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <select name="hit_nms" id="hit_nms" class="form-control">
                                                <option value="">-- Filter By Hit Nms --</option>
                                                <option value="Y">Yes</option>
                                                <option value="N">No</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <form method="get">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <select name="instance" id="instance" class="form-control">
                                                <option value="">-- Filter By Instance --</option>
                                                @foreach ($instances as $instance)
                                                    <option value="{{ $instance->appID }}">{{ $instance->instance_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>App ID</th>
                                            <th>Instance</th>
                                            <th>Cluster</th>
                                            <th>Category</th>
                                            <th>Hit Nms</th>
                                            <th>Dev EUI</th>
                                            <th>Dev Name</th>
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
            '{{ auth()->user()->can('device_update') ||auth()->user()->can('device_delete')? 'yes yes yes': '' }}'
        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'appID',
                name: 'appID',
            },
            {
                data: 'instance',
                name: 'instance'
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
                data: 'hit_nms',
                name: 'hit_nms'
            },

            {
                data: 'devEUI',
                name: 'devEUI'
            },
            {
                data: 'devName',
                name: 'devName'
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
                url: "{{ route('device.index') }}?kabkot_id={{ request()->get('kabkot_id') }}&instance_app_id={{ request()->get('instance_app_id') }}&category={{ request()->get('category') }}",
                data: function(s) {
                    s.instance = $('select[name=instance] option').filter(':selected').val()
                    s.category_device = $('select[name=category_device] option').filter(':selected').val()
                    s.hit_nms = $('select[name=hit_nms] option').filter(':selected').val()
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

        $('#hit_nms').change(function() {
            table.draw();
        })
    </script>
@endpush
