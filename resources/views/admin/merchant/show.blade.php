@extends('layouts.master')
@section('title', 'Show Merchant')

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
                            <li class="breadcrumb-item"><a href="{{ route('merchant.index') }}">Merchant</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="merchant-detail-title">Detail Merchant</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <table class="table table-sm">
                                        <tr>
                                            <th>ID</th>
                                            <td class="text-right" id="merchant-id">: {{ $merchant->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>MID</th>
                                            <td class="text-right" id="merchant-mid">: {{ $merchant->mid ? $merchant->mid : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>National MID</th>
                                            <td class="text-right" id="merchant-mid">: {{ $merchant->nmid ? $merchant->nmid : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td class="text-right" id="merchant-phone">: {{ $merchant->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Merchant Name</th>
                                            <td class="text-right" id="merchant-name">: {{ $merchant->merchant_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Merchant Type</th>
                                            <td class="text-right" id="merchant-name">:
                                                {{ ucwords($merchant->type) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Merchant email</th>
                                            <td class="text-right" id="merchant-email">: {{ $merchant->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Merchant Category</th>
                                            <td class="text-right" id="merchant-category">
                                            : {{ $merchant->merchant_category ? $merchant->merchant_category->merchants_category_name : '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Address 1</th>
                                            <td class="text-right" id="merchant-address1">: {{ $merchant->address1 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address 2</th>
                                            <td class="text-right" id="merchant-address2">: {{ $merchant->address2 }}</td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td class="text-right" id="merchant-city">: {{ $merchant->city ? $merchant->city->kabupaten_kota : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Zip code</th>
                                            <td class="text-right" id="merchant-zip-code">: {{ $merchant->zip_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>Bussiness</th>
                                            <td class="text-right" id="merchant-bussiness">: {{ $merchant->bussiness ?$merchant->bussiness->bussiness_name : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Foto KTP</th>
                                            @if ($merchant->merchant_approve)
                                            <td class="text-right">: <a href="{{ Storage::url('public/backend/images/identity_card/'.$merchant->merchant_approve->identity_card_photo ) }}" target="__blank">Click to see images</a></td>
                                            @else
                                            <td class="text-right">: - </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Foto Selfie KTP</th>
                                            @if ($merchant->merchant_approve)
                                            <td class="text-right">: <a href="{{ Storage::url('public/backend/images/selfie_ktp/'.$merchant->merchant_approve->selfie_ktp_photo ) }}" target="__blank">Click to see images</a></td>
                                            @else
                                            <td class="text-right">: - </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Foto NPWP</th>
                                            @if ($merchant->merchant_approve)
                                            <td class="text-right">: <a href="{{ Storage::url('public/backend/images/npwp/'.$merchant->merchant_approve->npwp_photo ) }}" target="__blank">Click to see images</a></td>
                                            @else
                                            <td class="text-right">: - </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Foto Owner + Outlet</th>
                                            @if ($merchant->merchant_approve)
                                            <td class="text-right">: <a href="{{ Storage::url('public/backend/images/owner_outlet/'.$merchant->merchant_approve->owner_outlet_photo ) }}" target="__blank">Click to see images</a></td>
                                            @else
                                            <td class="text-right">: - </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Foto Outlet</th>
                                            @if ($merchant->merchant_approve)
                                            <td class="text-right">: <a href="{{ Storage::url('public/backend/images/outlet/'.$merchant->merchant_approve->outlet_photo ) }}" target="__blank">Click to see images</a></td>
                                            @else
                                            <td class="text-right">: - </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Foto Dalam Outlet</th>
                                            @if ($merchant->merchant_approve)
                                            <td class="text-right">: <a href="{{ Storage::url('public/backend/images/in_outlet/'.$merchant->merchant_approve->in_outlet_photo ) }}" target="__blank">Click to see images</a></td>
                                            @else
                                            <td class="text-right">: - </td>
                                            @endif
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <table class="table table-sm">
                                        <tr>
                                            <th>Settlement Account</th>
                                            <td class="text-right" id="merchant-bank">: {{ $merchant->bank ? $merchant->bank->bank_name : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Account name</th>
                                            <td class="text-right" id="merchant-account-name">: {{ $merchant->account_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Settlement Number Account</th>
                                            <td class="text-right" id="merchant-number-account">: {{ $merchant->number_account }}</td>
                                        </tr>
                                        <tr>
                                            <th>Mdr</th>
                                            <td class="text-right" id="merchant-mdr">: {{ $merchant->mdr }}%</td>
                                        </tr>
                                        <tr>
                                            <th>BCA Branch Name</th>
                                            <td class="text-right" id="merchant-rekening-pooling">: {{ $merchant->rek_pooling ? $merchant->rek_pooling->rek_pooling_code : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td class="text-right" id="merchant-status">
                                                :
                                                @if($merchant->is_active == 0)
                                                    <span class="badge bg-danger">Non Active</span>
                                                @elseif($merchant->is_active == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Approve 1</th>
                                            <td class="text-right" id="merchant-approve1">
                                                : @if ($merchant->approved1 == 'need_approved')
                                                <span class="badge bg-warning">Need Approved</span>
                                                @elseif ($merchant->approved1 == 'approved')
                                                <span class="badge bg-success">Approved</span>
                                                @elseif ($merchant->approved1 == 'rejected')
                                                <span class="badge bg-danger">Reject</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Approve 2</th>
                                            <td class="text-right" id="merchant-approve2">
                                                :
                                                @if ($merchant->approved2 == 'need_approved')
                                                <span class="badge bg-warning">Need Approved</span>
                                                @elseif ($merchant->approved2 == 'approved')
                                                <span class="badge bg-success">Approved</span>
                                                @elseif ($merchant->approved2 == 'rejected')
                                                <span class="badge bg-danger">Reject</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Note</th>
                                            <td class="text-right" id="merchant-note">: {{ $merchant->note }}</td>
                                        </tr>
                                        <tr>
                                            <th >Created at</th>
                                            <td  class="text-right" id="merchant-created_at">: {{ date('d F Y H:i:s', strtotime($merchant->created_at)) }}</td>
                                        </tr>
                                         <tr>
                                            <th>Sertifikat Domisili (SKD / SITU)</th>
                                            @if ($merchant->merchant_approve)
                                            <td class="text-right">: <a href="{{ Storage::url('public/backend/images/certificate_of_domicile/'.$merchant->merchant_approve->certificate_of_domicile ) }}" target="__blank">Click to see images</a></td>
                                            @else
                                            <td class="text-right">: - </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Foto Buku Rekening</th>
                                            @if ($merchant->merchant_approve)
                                            <td class="text-right">: <a href="{{ Storage::url('public/backend/images/copy_bank_account_book/'.$merchant->merchant_approve->copy_bank_account_book ) }}" target="__blank">Click to see images</a></td>
                                            @else
                                            <td class="text-right">: - </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Surat Sewa / Bukti Kepemilikan</th>
                                            @if ($merchant->merchant_approve)
                                            <td class="text-right">: <a href="{{ Storage::url('public/backend/images/copy_proof_ownership/'.$merchant->merchant_approve->copy_proof_ownership ) }}" target="__blank">Click to see images</a></td>
                                            @else
                                            <td class="text-right">: - </td>
                                            @endif
                                        </tr>
                                        @if ($merchant->type == 'bussiness')
                                        <tr>
                                            <th>SIUP / Surat Ijin Usaha</th>
                                            @if ($merchant->merchant_approve)
                                            <td class="text-right">: <a href="{{ Storage::url('public/backend/images/siup_photo/'.$merchant->merchant_approve->siup_photo ) }}" target="__blank">Click to see images</a></td>
                                            @else
                                            <td class="text-right">: - </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>TDP</th>
                                            @if ($merchant->merchant_approve)
                                            <td class="text-right">: <a href="{{ Storage::url('public/backend/images/tdp_photo/'.$merchant->merchant_approve->tdp_photo ) }}" target="__blank">Click to see images</a></td>
                                            @else
                                            <td class="text-right">: - </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Akta Pendirian Perusahaan</th>
                                            @if ($merchant->merchant_approve)
                                            <td class="text-right">: <a href="{{ Storage::url('public/backend/images/copy_corporation_deed/'.$merchant->merchant_approve->copy_corporation_deed ) }}" target="__blank">Click to see images</a></td>
                                            @else
                                            <td class="text-right">: - </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Akta Pengurus Perusahaan</th>
                                            @if ($merchant->merchant_approve)
                                            <td class="text-right">: <a href="{{ Storage::url('public/backend/images/copy_management_deed/'.$merchant->merchant_approve->copy_management_deed ) }}" target="__blank">Click to see images</a></td>
                                            @else
                                            <td class="text-right">: - </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>SK Menkeh / Depkumham</th>
                                            @if ($merchant->merchant_approve)
                                            <td class="text-right">: <a href="{{ Storage::url('public/backend/images/copy_sk_menkeh/'.$merchant->merchant_approve->copy_sk_menkeh ) }}" target="__blank">Click to see images</a></td>
                                            @else
                                            <td class="text-right">: - </td>
                                            @endif
                                        </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="btn-approve float-end">

                            @if ($merchant->approved1 == 'need_approved' && $merchant->approved2 == 'need_approved' || $merchant->approved1 == 'approved' && $merchant->approved2 == 'need_approved' )
                            @else
                                @if ($merchant->is_active == 1)
                                    <button class="btn btn-danger btn-sm" onclick="toggleActive('{{$merchant->id}}', '{{$merchant->merchant_name}}', 0)"> <i class="mdi mdi-close"></i> Set Inactive</button>
                                @else
                                    <button class="btn btn-primary btn-sm" onclick="toggleActive('{{$merchant->id}}', '{{$merchant->merchant_name}}', 1)"> <i class="mdi mdi-check-bold"></i> Set Active</button>
                                @endif
                            @endif

                            @can('approved_step_1')
                            <div class="btn-group">
                                <button type="button" title="Other" class="btn btn-md btn-success btn-sm dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Approve 1 </button>
                                <div class="dropdown-menu" style="">
                                    <button type="button" onclick="approve('approved1', '{{ $merchant->id }}', '{{ $merchant->merchant_name }}', 'approved')" class="dropdown-item">Approve</button>
                                    <button type="button" onclick="approve('approved1', '{{ $merchant->id }}', '{{ $merchant->merchant_name }}', 'rejected')" class="dropdown-item">Reject</button>
                                </div>
                            </div>
                            @endcan

                            @can('approved_step_2')
                                @if ($merchant->approved1 == 'approved')
                                <div class="btn-group">
                                    <button type="button" title="Other" class="btn btn-md btn-success btn-sm dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Approve 2 </button>
                                    <div class="dropdown-menu" style="">
                                        <button type="button" onclick="approve('approved2', '{{ $merchant->id }}', '{{ $merchant->merchant_name }}', 'approved')" class="dropdown-item">Approve</button>
                                        <button type="button" onclick="approve('approved2', '{{ $merchant->id }}', '{{ $merchant->merchant_name }}', 'rejected')" class="dropdown-item">Reject</button>
                                    </div>
                                </div>
                                @endif
                            @endcan
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
        function approve(approval, merchant_id, merchant_name, status) {
            let text_status;

            if (status == 'approved') {
                text_status = 'Approve';
            }  else if (status == 'rejected') {
                text_status = 'Reject';
            }

            Swal.fire({
                title:"<h5 style='color:black'>Are you sure?</h5>",
                color: '#000',
                text:`${text_status} ${merchant_name}`,
                type:"warning",
                confirmButtonColor:"#0bd915",
                showCancelButton:true,
                confirmButtonText:"VALIDATE",
                showLoaderOnConfirm:true,
                backdrop:'rgba(0,0,1,0.4)',
                preConfirm:login=>{
                    return $.ajax({
                        type:"put",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        data: {
                            approval: approval,
                            merchant_id: merchant_id,
                            status: status
                        },
                        url:"{{ route('merchant.approve') }}",
                    }).then(response =>{
                        Swal.fire({
                            backdrop:'rgba(0,0,1,0.4)',
                            title:'Success!',
                            text:`Success to ${text_status} merchant`,
                            type:"success"
                        }).then(res => {
                            window.location.reload();
                        })
                    }).catch(error => {
                        Swal.fire({
                            backdrop:'rgba(0,0,1,0.4)',
                            title:'Error!',
                            text:`Failed to ${text_status} merchant. ${error.responseJSON.message}`,
                            type:"error"
                        }).then(res => {
                            window.location.reload();
                        })
                    });
                }
            })
        }

        const toggleActive = function(merchant_id, merchant_name, is_active){
            let text_status;

            if (is_active > 0) {
                text_status = 'activated ';
            }  else if (is_active == 0) {
                text_status = 'inactivated';
            }

            Swal.fire({
                title: 'Are you sure?',
                text: `${text_status} ${merchant_name}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    let url = '{{ route("merchant.toggleActive", ":id") }}';
                    url = url.replace(":id", merchant_id);
                    $.ajax({
                        url,
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        data: {
                            is_active
                        },
                        success: function(res){
                            if(res.success){
                                location.reload()
                            }
                        },
                        error: function(err){
                            console.log(err)
                        }
                    })
                }
            })
        }
    </script>
@endpush
