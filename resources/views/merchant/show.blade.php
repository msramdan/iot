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
                                    <table class="merchant-detail">
                                        <tr>
                                            <th>ID</th>
                                            <td class="text-right" id="merchant-id">: {{ $merchant->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>MID</th>
                                            <td class="text-right" id="merchant-mid">: {{ $merchant->mid ? $merchant->mid : '-' }}</td>
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
                                            <th>Merchant email</th>
                                            <td class="text-right" id="merchant-email">: {{ $merchant->merchant_email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Merchant Category</th>
                                            <td class="text-right" id="merchant-category">
                                            : {{ $merchant->merchant_category->merchants_category_name }}
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
                                            <td class="text-right" id="merchant-city">: {{ $merchant->city }}</td>
                                        </tr>
                                        <tr>
                                            <th>Zip code</th>
                                            <td class="text-right" id="merchant-zip-code">: {{ $merchant->zip_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>Bussiness</th>
                                            <td class="text-right" id="merchant-bussiness">: {{ $merchant->bussiness->bussiness_name }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <table class="merchant-detail">
                                        <tr>
                                            <th>Bank</th>
                                            <td class="text-right" id="merchant-bank">: {{ $merchant->bank->bank_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Account name</th>
                                            <td class="text-right" id="merchant-account-name">: {{ $merchant->account_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Number Account</th>
                                            <td class="text-right" id="merchant-number-account">: {{ $merchant->number_account }}</td>
                                        </tr>
                                        <tr>
                                            <th>Mdr</th>
                                            <td class="text-right" id="merchant-mdr">: {{ $merchant->mdr }}%</td>
                                        </tr>
                                        <tr>
                                            <th>Rekening Pooling</th>
                                            <td class="text-right" id="merchant-rekening-pooling">: {{ $merchant->rek_pooling->rek_pooling_code }}</td>
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
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
