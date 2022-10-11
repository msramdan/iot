@extends('layouts.master')
@section('title', 'Data Pooling Account')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Pooling Account</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pooling Account</li>
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
                        <a href="{{ route('rek_pooling.create') }}" class="btn btn-md btn-secondary"> <i
                                class="mdi mdi-plus"></i> Create</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Pooling Account Code</th>
                                        <th>Bank</th>
                                        <th>Account Name</th>
                                        <th>Number Account</th>
                                        @canany(['rek_pooling_update', 'rek_pooling_delete'])
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
    const action = '{{ auth()->user()->can('rek_pooling_update') || auth()->user()->can('rek_pooling_delete') ? 'yes yes yes' : '' }}'
        let columns = [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'rek_pooling_code',
                name: 'rek_pooling_code'
            },
            {
                data: 'bank',
                name: 'bank'
            },
            {
                data: 'account_name',
                name: 'account_name'
            },
            {
                data : 'number_account',
                name : 'number_account'
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
            ajax: "{{ route('rek_pooling.index') }}",
            columns: columns
        });
</script>
@endpush
