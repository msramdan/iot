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
                            {{-- <div class="row">
                                <div class="col-md-3">
                                    <form method="get">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <input type="text" class="form-control border-0 dash-filter-picker shadow"
                                                data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y"
                                                data-deafult-date="01 Jan 2022 to 31 Jan 2022" value=""
                                                id="filter_date_merchant" />
                                            <div class="input-group-text bg-primary border-primary text-white">
                                                <i class="ri-calendar-2-line"></i>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <form method="get">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <select name="kabkot_id" id="kota" class="form-control">
                                                <option value="">-- Filter By City --</option>

                                            </select>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <form method="get">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <select name="kabkot_id" id="kota" class="form-control">
                                                <option value="">-- Filter By MCC --</option>

                                            </select>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div> --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>App ID</th>
                                            <th>App EUI</th>
                                            <th>App Key</th>
                                            <th>Dev EUI</th>
                                            <th>Dev Name</th>
                                            <th>Dev Type</th>
                                            <th>Region</th>
                                            <th>Subnet</th>
                                            <th>Auth Type</th>
                                            <th>Cluster</th>
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
            },
            {
                data: 'cluster_id',
                name: 'cluster_id'
            },
        ]

        if (action) {
            columns.push({
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            })
        }

        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('device.index') }}",
            columns: columns
        });
    </script>
@endpush
