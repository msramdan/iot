@extends('layouts.master_partner')
@section('title', 'Dashboard Partner')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">SubInstance</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Instance</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col">
                <div class="h-100">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Surya Regenci</h5>
                                        <span>Surya Padu</span>
                                        <span></span>
                                        <img src="" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end .h-100-->
            </div> <!-- end col -->
        </div>
    </div>
    <!-- container-fluid -->
</div>
@endsection

@push('js')

@endpush
