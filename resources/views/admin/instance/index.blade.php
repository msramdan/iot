@extends('layouts.master')
@section('title', 'Data Instance')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Instance</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Instance</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @can('instance_create')
                        <a href="{{ route('instance.create') }}" class="btn btn-md btn-secondary"> <i
                                class="mdi mdi-plus"></i> Create</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm" id="dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Instance Code</th>
                                        <th>Instance Name</th>
                                        <th>Username</th>
                                        <th>Bussiness</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Province</th>
                                        <th>City</th>
                                        <th>District</th>
                                        <th>Village</th>
                                        <th>Zip Code</th>
                                        @canany(['instance_update', 'instance_delete'])
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
@endsection
@push('js')
<script>
    const action = '{{ auth()->user()->can('instance_update') || auth()->user()->can('instance_delete') ? 'yes yes yes' : '' }}'
        let columns = [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'instance_code',
                name: 'instance_code'
            },
            {
                data: 'instance_name',
                name: 'instance_name'
            },
            {
                data: 'username',
                name: 'username',
            },
            {
                data: 'bussiness',
                name: 'bussiness',
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'phone',
                name: 'phone'
            },
            {
                data: 'province',
                name: 'province'
            },
            {
                data: 'city',
                name: 'city',
            },
            {
                data: 'district',
                name: 'district'
            },
            {
                data: 'village',
                name: 'village'
            },
            {
                data: 'zip_code',
                name: 'zip_code'
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

        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('instance.index') }}",
            columns: columns
        });
</script>
@endpush
