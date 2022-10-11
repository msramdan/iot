@extends('layouts.master')
@section('title', 'Data Rekening Pooling')
@section('content')
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
                            <a href="{{ route('merchant.create') }}" class="btn btn-md btn-secondary"> <i class="mdi mdi-plus"></i> Create</a>
                        @endcan
                        <a href="{{ route('merchant.create') }}" class="btn btn-md btn-success"> <i class="mdi mdi-upload"></i> Upload</a>
                        <a href="{{ route('merchant.create') }}" class="btn btn-md btn-danger"> <i class="mdi mdi-download"></i> Download</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-sm" id="dataTable" style="width:100%">
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
                                    @canany(['merchant_show','merchant_update', 'merchant_delete'])
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

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                {{-- <table>
                    <tr>
                        <th>ID</th>
                        <td>2312</td>
                    </tr>
                    <tr>
                        <th>MID</th>
                        <td>23123415213</td>
                    </tr>
                    <tr>
                        <th>Merchant Name</th>
                        <td>PT Maju Bersama</td>
                    </tr>
                </table> --}}
                <ul class="nav">
                    <li>
                        <div class="d-flex">
                            <h6>ID</h6>
                            <div>2312311</div>
                        </div>
                    </li>
                </ul>
            </div>
           <div class="col-md-6">

           </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
                data : 'bank',
                name : 'bank',
            },
            {
                data: 'account_name',
                name : 'account_name'
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

        function detail(id) {
            $.ajax({
                type:'GET',
                url: base_url + `/panel/merchant/show/${id}`,
                success:function(result) {
                    console.log(result);
                }
            });
        }
    </script>
@endpush
