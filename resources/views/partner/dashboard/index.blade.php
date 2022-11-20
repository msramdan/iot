@extends('layouts.master_partner')
@section('title', 'Dashboard Partner')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col">
                <div class="h-100">
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="fs-16 mb-1">Good Morning, {{ Auth::guard('instances')->user()->instance_name }}</h4>
                                </div>
                            </div><!-- end card header -->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    {{-- <div class="row">
                        <!-- Transaksi Per day by month -->
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header p-0 border-0 bg-soft-light">
                                    <h6 class="mt-2 ml-2">Total Transaction per Day {{ date('F') }}</h6>
                                    <div class="float-end">
                                        <form  method="get">
                                            @csrf
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control border-0 dash-filter-picker shadow" data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y" value="{{ date('d M Y', strtotime($start_month)) }} to {{ date('d M Y', strtotime($end_month)) }}" id="filter_month_transaction"/>
                                                <div class="input-group-text bg-primary border-primary text-white">
                                                    <i class="ri-calendar-2-line"></i>
                                                </div>
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                </div><!-- end card header -->
                                <div class="card-body p-0 pb-2">
                                    <div class="w-100">
                                        <div id="transaction_day" data-colors='["--vz-success", "--vz-primary", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <!-- End Transaksi Top 10 by City -->

                    </div> --}}

                </div> <!-- end .h-100-->
            </div> <!-- end col -->
        </div>
    </div>
    <!-- container-fluid -->
</div>
@endsection

@push('js')

@endpush
