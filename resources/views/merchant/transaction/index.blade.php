@extends('layouts.master_merchant')
@section('title', 'Data Transaction')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Transaction</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Transaction</li>
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
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>MID</th>
                                    <th>Merchant Name</th>
                                    <th>Customer Name</th>
                                    <th>MTI</th>
                                    <th>Date Transaction</th>
                                    <th>Pan</th>
                                    <th>Rrn</th>
                                    <th>Tid</th>
                                    <th>Amount</th>
                                    <th>Transaction Type</th>
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

        const action = '{{ auth()->user()->can('transaction_update') || auth()->user()->can('transaction_delete') ? 'yes yes yes' : '' }}'
        let columns = [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data:'mid',
                name:'mid'
            },
            {
                data:'merchant_name',
                name:'merchant_name'
            },
            {
                data:'customer_name',
                name:'customer_name'
            },
            {
                data:'mti',
                name:'mti'
            },
            {
                data: 'date_transaction',
                name: 'date_transaction',
            },
            {
                data: 'pan',
                name: 'pan'
            },
            {
                data: 'rrn',
                name: 'rrn'
            },
            {
                data: 'tid',
                name: 'tid'
            },
            {
                data: 'amount',
                name: 'amount'
            },
            {
                data: 'transaction_type',
                name: 'transaction_type'
            }
        ]
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('merchant_transaction.index') }}",
            columns: columns
        });
    </script>
@endpush

