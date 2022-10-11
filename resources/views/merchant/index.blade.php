@extends('layouts.master')
@section('title', 'Data Merchant')
@section('content')

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Upload format please download at this link <a href=""><i
                                class="mdi mdi-download"></i> Here...</a> </h5>
                </div>
                <hr>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <label for="bank_name">File Upload</label>
                            <input type="file" class="form-control" name="bank_code" id="bank_code" placeholder=""
                                value="" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success "><i class="mdi mdi-upload"></i> Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Merchant</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Merchant</li>
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
                        <a href="{{ route('merchant.create') }}" class="btn btn-md btn-secondary"> <i
                                class="mdi mdi-plus"></i> Create</a>
                        @endcan
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            <i class="mdi mdi-upload"></i> Upload
                        </button>
                        <a href="{{ route('merchant.create') }}" class="btn btn-md btn-warning"> <i
                                class="mdi mdi-download"></i> Download</a>
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
                                        <th>Bank</th>
                                        <th>Account Name</th>
                                        @canany(['merchant_show', 'merchant_update', 'merchant_delete'])
                                        <th style="width: 270px">Action</th>
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
    const action =
            '{{ auth()->user()->can('merchant_update') ||auth()->user()->can('merchant_delete')? 'yes yes yes': '' }}'
        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'mid',
                name: 'mid'
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
                data: 'merchant_category',
                name: 'merchant_category'
            },
            {
                data: 'phone',
                name: 'phone'
            },
            {
                data: 'bussiness',
                name: 'bussiness',

            },
            {
                data: 'bank',
                name: 'bank',
            },
            {
                data: 'account_name',
                name: 'account_name'
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
