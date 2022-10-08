@extends('layouts.master')
@section('title', 'Activity Log')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Approve Log Merchant</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Approve Log Merchant</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Merchant</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Step</th>
                                    <th>Ref</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
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
                data: 'merchant',
                name: 'merchant'
            },
            {
                data: 'user',
                name: 'user'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'step',
                name: 'step'
            },
            {
                data: 'ref',
                name: 'ref'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'time',
                name : 'time'
            }
        ]

        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('approved_log_merchant.index') }}",
            columns: columns
        });
    </script>
@endpush
