@extends('layouts.master')
@section('title', 'Data Merchant Need Approved')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Merchant Need Approved</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Merchant Need Approved</li>
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
                                    <th>City</th>
                                    @canany(['merchant_show','merchant_update', 'merchant_delete'])
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
                        <div class="col-md-12">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <th>ID</th>
                                    <td class="text-right" id="merchant-id"></td>
                                    <th>Rekening Pooling</th>
                                    <td class="text-right" id="merchant-rekening-pooling"></td>

                                </tr>
                                <tr>
                                    <th>MID</th>
                                    <td class="text-right" id="merchant-mid"></td>
                                    <th>Phone</th>
                                    <td class="text-right" id="merchant-phone"></td>
                                </tr>
                                <tr>
                                    <th>Merchant Name</th>
                                    <td class="text-right" id="merchant-name"></td>
                                    <th>Address 1</th>
                                    <td class="text-right" id="merchant-address1"></td>
                                </tr>
                                <tr>
                                    <th>Merchant email</th>
                                    <td class="text-right" id="merchant-email"></td>
                                    <th>Address 2</th>
                                    <td class="text-right" id="merchant-address2"></td>
                                </tr>
                                <tr>
                                    <th>Merchant Category</th>
                                    <td class="text-right" id="merchant-category"></td>
                                    <th>City</th>
                                    <td class="text-right" id="merchant-city"></td>
                                </tr>
                                <tr>
                                    <th>Bussiness</th>
                                    <td class="text-right" id="merchant-bussiness"></td>
                                    <th>Zip code</th>
                                    <td class="text-right" id="merchant-zip-code"></td>
                                </tr>
                                <tr>
                                    <th>Bank</th>
                                    <td class="text-right" id="merchant-bank"></td>
                                    <th>Note</th>
                                    <td class="text-right" id="merchant-note"></td>
                                </tr>
                                <tr>
                                    <th>Account name</th>
                                    <td class="text-right" id="merchant-account-name"></td>
                                    <th>Status</th>
                                    <td class="text-right" id="merchant-status"></td>
                                </tr>
                                <tr>
                                    <th>Number Account</th>
                                    <td class="text-right" id="merchant-number-account"></td>
                                    <th>Approve 1</th>
                                    <td class="text-right" id="merchant-approve1"></td>
                                </tr>
                                <tr>
                                    <th>Mdr</th>
                                    <td class="text-right" id="merchant-mdr"></td>
                                    <th>Approve 2</th>
                                    <td class="text-right" id="merchant-approve2"></td>
                                </tr>
                                <tr>
                                    <th >Created at</th>
                                    <td  class="text-right" id="merchant-created_at"></td>
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
