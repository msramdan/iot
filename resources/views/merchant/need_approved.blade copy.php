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
                        <a href="{{ route('merchant.create') }}" class="btn btn-md btn-secondary"> <i
                                class="mdi mdi-plus"></i> Create</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-sm table-sm" id="dataTable" style="width:100%">
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Merchant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <th width="50%">ID</th>
                                    <td width="100%" class="text-right" id="merchant-id"></td>
                                </tr>
                                <tr>
                                    <th width="50%">MID</th>
                                    <td width="100%" class="text-right" id="merchant-mid"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Merchant Name</th>
                                    <td width="100%" class="text-right" id="merchant-name"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Merchant email</th>
                                    <td width="100%" class="text-right" id="merchant-email"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Merchant Category</th>
                                    <td width="100%" class="text-right" id="merchant-category"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Bussiness</th>
                                    <td width="100%" class="text-right" id="merchant-bussiness"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Bank</th>
                                    <td width="100%" class="text-right" id="merchant-bank"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Account name</th>
                                    <td width="100%" class="text-right" id="merchant-account-name"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Number Account</th>
                                    <td width="100%" class="text-right" id="merchant-number-account"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Mdr</th>
                                    <td width="1000%" class="text-right" id="merchant-mdr"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <th width="50%">Rekening Pooling</th>
                                    <td width="50%" class="text-right" id="merchant-rekening-pooling"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Phone</th>
                                    <td width="50%" class="text-right" id="merchant-phone"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Address 1</th>
                                    <td width="50%" class="text-right" id="merchant-address1"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Address 2</th>
                                    <td width="50%" class="text-right" id="merchant-address2"></td>
                                </tr>
                                <tr>
                                    <th width="50%">City</th>
                                    <td width="50%" class="text-right" id="merchant-city"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Zip code</th>
                                    <td width="50%" class="text-right" id="merchant-zip-code"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Note</th>
                                    <td width="50%" class="text-right" id="merchant-note"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Status</th>
                                    <td width="50%" class="text-right" id="merchant-status"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Approve 1</th>
                                    <td width="50%" class="text-right" id="merchant-approve1"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Approve 2</th>
                                    <td width="50%" class="text-right" id="merchant-approve2"></td>
                                </tr>
                                <tr>
                                    <th width="50%">Created at</th>
                                    <td width="50%" class="text-right" id="merchant-created_at"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="btn-group mr-3">
                            <button class="btn btn-success mr-2 mt-3" id="merchant-approve1-btn" type="button">Approve
                                1</button>
                            <button class="btn btn-danger mr-2 mt-3" id="merchant-reject-approve1-btn"
                                type="button">Reject Approve 1</button>
                        </div>
                        <div class="btn-group ml-2">
                            <button class="btn btn-success ml-2 mt-3" id="merchant-approve2-btn" type="button">Approve
                                2</button>
                            <button class="btn btn-danger mr-2 mt-3" id="merchant-reject-approve1-btn"
                                type="button">Reject Approve 2</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                data : 'bank',
                name : 'bank',
            },
            {
                data: 'account_name',
                name : 'account_name'
            }
        ]



        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('merchant.approval') }}",
            columns: columns
        });

        function detail(id) {
            var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {});

            myModal.show();
            $.ajax({
                type:'GET',
                url: base_url + `/panel/merchant/${id}`,
                success:function(result) {
                    $('#merchant-id').text(result.id);
                    let mid;
                    if (result.mid == '' || result.mid == null) {
                        mid = '-'
                    } else {
                        mid = result.mid;
                    }
                    $('#merchant-mid').text(mid);
                    $('#merchant-name').text(result.merchant_name);
                    $('#merchant-email').text(result.merchant_email);
                    $('#merchant-category').text(result.merchant_category.merchants_category_name)
                    $('#merchant-bussiness').text(result.bussiness.bussiness_name);
                    $('#merchant-bank').text(result.bank.bank_name);
                    $('#merchant-account-name').text(result.account_name);
                    $('#merchant-number-account').text(result.number_account);
                    $('#merchant-mdr').text(result.mdr);
                    $('#merchant-rekening-pooling').text(result.rek_pooling.rek_pooling_code);
                    $('#merchant-phone').text(result.phone)
                    $('#merchant-address1').text(result.address1);
                    $('#merchant-address2').text(result.address2);
                    $('#merchant-city').text(result.city);
                    $('#merchant-zip-code').text(result.zip_code);
                    $('#merchant-note').text(result.note);

                    let html_status = '';
                    let approve = '';
                    if (result.is_active == 1) {
                        html_status = '<span class="badge bg-success">Active</span>';
                    } else if (result.is_active == 0) {
                        html_status = '<span class="badge bg-danger">Non Active</span>';
                    }

                    $('#merchant-status').append(html_status);

                    if (result.approved1 == 'need_approved' || result.approved2 == 'need_approved') {
                        approve = '<span class="badge bg-danger">Need Approve</span>';
                    } else if(result.approved1 == 'approved' || result.approved2 == 'approved') {
                        approve = '<span class="badge bg-success">Approved</span>';
                    }

                    $('#merchant-approve1').append(approve);
                    $('#merchant-approve2').append(approve);

                    $('#merchant-created_at').text(moment(result.created_at).format('d MMMM Y H:mm:ss'));
                }
            });
        }

       $('#merchant-approve1-btn').click(function() {
            Swal.fire({
                toast: true,
                backdrop:'rgba(0,0,1,0.4)',
                title:'Error!',
                text:`Gagal melakukan pembelian product.`,
                type:"error",
                animation: true,
                timer: 4000,
                timerProgressBar: true,
            });
            // let merchant_id = $('#merchant-id')
            // $.ajax({
            //     type : 'post',
            //     url : "{{ route('merchant.approve') }}",
            //     data: {
            //         approval: 'approval1',
            //         merchant_id : merchant_id,

            //     }
            // })
       })
</script>
@endpush
