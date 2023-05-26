@extends('layouts.master_partner')
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
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <form method="get">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <select name="subinstance_id" id="subinstance_id" class="form-control">
                                                <option value="">-- Filter By SubInstance --</option>
                                                @foreach ($subinstances as $subinstance)
                                                    <option value="{{ $subinstance->id }}" {{ request()->get('subInstanceId') == $subinstance->id ? 'selected' : '' }}>{{ $subinstance->name_subinstance }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-3">
                                    <form method="get">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <select name="cluster_id" id="cluster_id" class="form-control">
                                                <option value="">-- Filter By Cluster --</option>
                                                @foreach ($cluster as $data)
                                                    <option value="{{ $data->id }}" {{ request()->query('cluster_id') == $data->id ? 'selected' : '' }}>
                                                        {{ $data->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-3">
                                    <form method="get">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <select name="category_device" id="category_device" class="form-control">
                                                <option value="">-- Filter By Category Device --</option>
                                                <option value="Water Meter" {{ request()->get('category') == 'Water Meter' ? 'selected' : '' }}>Water Meter</option>
                                                <option value="Power Meter" {{ request()->get('category') == 'Power Meter' ? 'selected' : '' }}>Power Meter</option>
                                                <option value="Gas Meter" {{ request()->get('category') == 'Gas Meter' ? 'selected' : '' }}>Gas Meter</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-3">
                                    <form method="get">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <select name="location_device" id="location_device" class="form-control">
                                                <option value="">-- Filter By Location --</option>
                                                @foreach ($arrLocation as $location)
                                                    <option value="{{ $location->id }}" {{ request()->get('kabkot_id') == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
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
                                            <th>SubInstance</th>
                                            <th>Cluster</th>
                                            <th>Category Device</th>
                                            <th>App EUI</th>
                                            <th>Dev EUI</th>
                                            <th>Dev Name</th>
                                            <th>Action</th>
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
        $('#instance').select2();

        let base_url = "{{ url('/') }}";
        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'name_subinstance',
                name: 'name_subinstance',
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
                data: 'appEUI',
                name: 'appEUI'
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

        columns.push({
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        })

        const params = new Proxy(new URLSearchParams(window.location.search), {
            get: (searchParams, prop) => searchParams.get(prop),
        });

        let query_cluster_id = params.cluster_id; // "some_value"

        var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('instances.device.index') }}?category={{ request()->get('category') }}&kabkot_id={{ request()->get('kabkot_id') }}&subInstanceId={{ request()->get('subInstanceId') }}",
                data: function(s) {
                    s.subinstance_id = $('select[name=subinstance_id] option').filter(':selected').val()
                    s.category_device = $('select[name=category_device] option').filter(':selected').val()
                    s.cluster_id = $('select[name=cluster_id] option').filter(':selected').val()
                    s.location_device = $('select[name=location_device] option').filter(':selected').val()
                    s.query_cluster_id = query_cluster_id
                }
            },
            columns: columns
        });

        $('#subinstance_id').change(function() {
            window.history.pushState("object or string", "Title", "/device");
            table.draw();
        })

        $('#cluster_id').change(function() {
            window.history.pushState("object or string", "Title", "/device");
            table.draw();
        })

        $('#category_device').change(function() {
            window.history.pushState("object or string", "Title", "/device");
            table.draw();
        })

        $('#location_device').change(function() {
            window.history.pushState("object or string", "Title", "/device");
            table.draw();
        })
    </script>
@endpush
