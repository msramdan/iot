@extends('layouts.master')
@section('title', 'Data Operational Time ' . $merchant->merchant_name)
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Operasional Time</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('merchant.index') }}">Merchant</a></li>
                            <li class="breadcrumb-item active">Operasional Time</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('merchant.optime.create', $merchant->id) }}" class="btn btn-md btn-secondary"> <i
                                class="mdi mdi-plus"></i> Create</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Day</th>
                                        <th>Open Hour</th>
                                        <th>Close Hour</th>
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
        const columns = [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'day',
                name: 'day'
            },
            {
                data: 'opening_hour',
                name: 'opening_hour'
            },
            {
                data: 'closing_hour',
                name: 'closing_hour'
            },
            {
                data: 'action',
                name: 'action'
            }
        ]

        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('merchant.optime.index', $merchant->id) }}",
            columns: columns
        });
    </script>
@endpush