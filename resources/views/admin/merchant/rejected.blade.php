@extends('layouts.master')
@section('title', 'Data Merchant Active')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Merchant Rejected</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Merchant Rejected</li>
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
                                    <th>MID</th>
                                    <th>National MID</th>
                                    <th>Merchant Name</th>
                                    <th>Email</th>
                                    <th>Merchant Category</th>
                                    <th>Phone</th>
                                    <th>Bussiness</th>
                                    {{-- <th>City</th> --}}
                                    @canany(['merchant_show','merchant_update', 'merchant_delete','approved_step_1','approved_step_2'])
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

        let base_url = "{{ url('/') }}";

        const action = '{{ auth()->user()->can('merchant_update') ||auth()->user()->can('approved_step_1') ||auth()->user()->can('approved_step_2') || auth()->user()->can('merchant_delete') ? 'yes yes yes' : '' }}'
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
                data: 'nmid',
                name : 'nmid'
            },
            {
                data: 'merchant_name',
                name: 'merchant_name'
            },
            {
                data: 'email',
                name: 'email'
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
            ajax: "{{ route('merchant.rejected') }}",
            columns: columns
        });
    </script>
@endpush
