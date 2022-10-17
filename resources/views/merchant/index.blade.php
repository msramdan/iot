@extends('layouts.master')
@section('title', 'Data Merchant Active')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Merchant Active</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Merchant Active</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @can('role_create')
                            <a href="{{ route('merchant.create') }}" class="btn btn-md btn-secondary"> <i class="mdi mdi-plus"></i> Create</a>
                        @endcan
                        <a href="{{ route('merchant.create') }}" class="btn btn-md btn-success"> <i class="mdi mdi-upload"></i> Upload</a>
                        <a href="{{ route('merchant.excel') }}" class="btn btn-md btn-danger"> <i class="mdi mdi-download"></i> Download</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>MID</th>
                                    <th>Merchant Name</th>
                                    <th>Email</th>
                                    <th>Merchant Category</th>
                                    <th>Phone</th>
                                    <th>Bussiness</th>
                                    <th>City</th>
                                    @canany(['merchant_show','merchant_update', 'merchant_delete'])
                                            <th >Action</th>
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

        let base_url = "{{ url('/') }}";

        const action = '{{ auth()->user()->can('merchant_update') || auth()->user()->can('merchant_delete') ? 'yes yes yes' : '' }}'
        let columns = [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'mid',
                name : 'mid'
            },
            {
                data: 'merchant_name',
                name: 'merchant_name'
            },
            {
                data: 'merchant_email',
                name: 'merchant_email'
            },
            {
                data : 'merchant_category',
                name : 'merchant_category'
            },
            {
                data : 'phone',
                name : 'phone'
            },
            {
                data : 'bussiness',
                name : 'bussiness',

            },
            {
                data : 'city',
                name : 'city',
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
            ajax: "{{ route('merchant.index') }}",
            columns: columns
        });
    </script>
@endpush

