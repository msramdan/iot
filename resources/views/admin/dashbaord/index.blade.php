@extends('layouts.master')

@section('title', 'Dashboard')
@push('style')
<style>
.ui-datepicker-calendar {
   display: none;
}
</style>
@endpush
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
                                    <h4 class="fs-16 mb-1">Good Morning, {{ Auth::user()->name }}</h4>
                                </div>
                                <div class="mt-3 mt-lg-0">
                                    <form action="{{ route('dashboard') }}" method="get" id="filter_date">
                                        @csrf
                                        <div class="row g-3 mb-0 align-items-center">
                                            <div class="col-sm-auto">
                                                <div class="input-group">
                                                    <input type="hidden" name="start">
                                                    <input type="hidden" name="end">
                                                    <input type="text" name="date" class="form-control border-0 dash-filter-picker shadow" data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y" data-deafult-date="01 Jan 2022 to 31 Jan 2022">
                                                    <div class="input-group-text bg-primary border-primary text-white">
                                                        <i class="ri-calendar-2-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div><!-- end card header -->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Today TRX Amount</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ $transaction_amount }}"></span></h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-success rounded fs-3">
                                                <i class="bx bx-dollar-circle"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Today QTY Transactions</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ $transaction_count }}"></span></h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-info rounded fs-3">
                                                <i class="bx bx-shopping-bag"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total Indopay Fee AMT</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ $total_fee_transaction }}"></span></h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-danger rounded fs-3">
                                                <i class="bx bx-wallet"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total Active Merchants</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{ $total_merchant_active }}"></span></h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-warning rounded fs-3">
                                                <i class="bx bx-user-circle"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div> <!-- end row-->

                    <div class="row">
                        <!-- Transaksi Perbulan -->
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header p-0 border-0 bg-soft-light">
                                    <div class="d-flex">
                                        <h6 class="float-start mt-3 ml-3">Transaction Per Month</h6>
                                        <div class="float-end">
                                            <form action="{{ route('dashboard') }}" method="get" id="filter_date">
                                                @csrf
                                                <div class="input-group" style="left:100px;" >
                                                   <input type="text" class="form-control" id="filter_year" name="filter_year"  value="{{ date('Y') }}"/>
                                                    <div class="input-group-text bg-primary border-primary text-white">
                                                        <i class="ri-calendar-2-line"></i>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- end card header -->
                                <div class="card-body p-0 pb-2">
                                    <div class="w-100">
                                        <div id="transaction_by_month" data-colors='["--vz-success", "--vz-primary", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <!-- End Transaksi Perbulan -->

                        <!-- Transaksi Top 10 Merchant -->
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header p-0 border-0 bg-soft-light">
                                    <h6 class="mt-2 ml-2">Top 10 Merchant By Transaction</h6>
                                    <div class="float-end">
                                        <form  method="get">
                                            @csrf
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control border-0 dash-filter-picker shadow" data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y" data-deafult-date="01 Jan 2022 to 31 Jan 2022" value="" id="filter_date_merchant"/>
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
                                        <div id="top_ten_merchant" data-colors='["--vz-success", "--vz-primary", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <!-- End Transaksi Top 10 Merchant -->

                        <!-- Transaksi Top 10 by City -->
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header p-0 border-0 bg-soft-light">
                                    <h6 class="mt-2 ml-2">Top 10 City By Transaction</h6>
                                </div><!-- end card header -->
                                <div class="card-body p-0 pb-2">
                                    <div class="w-100">
                                        <div id="top_city" data-colors='["--vz-success", "--vz-primary", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <!-- End Transaksi Top 10 by City -->

                        <!-- Transaksi Top 10 by City -->
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header p-0 border-0 bg-soft-light">
                                    <h6 class="mt-2 ml-2">Merchant Active & Inactive Comparison</h6>
                                </div><!-- end card header -->
                                <div class="card-body p-0 pb-2">
                                    <div class="w-100">
                                        <div id="merchant_status" data-colors='["--vz-success", "--vz-primary", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <!-- End Transaksi Top 10 by City -->

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

                    </div>

                </div> <!-- end .h-100-->
            </div> <!-- end col -->
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
@push('js')
<script>
    $("input[name='date']").change(function() {
       var dates = $(this).val();
       var split_dates = dates.split(" to ");
       if ( split_dates.length >= 2 ) {
            $("input[name='start']").val(split_dates[0]);
            $("input[name='end']").val(split_dates[1]);

            $('#filter_date').submit();
       }
    })
</script>

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('#filter_year').datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years",
    autoclose: true
}).on('changeDate', function(e) {
    let year = moment(e.date).format('Y');
    $('#filter_year').val(year)
    filter_year(year)
});

</script>

<script>
    //Transaction By Month
    var options_month = {
        chart: {
            type: 'bar',
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800,
                animateGradually: {
                    enabled: true,
                    delay: 150
                },
                dynamicAnimation: {
                    enabled: true,
                    speed: 350
                }
            }
        },
        dataLabels: {
            enable: false,
        },
        legend: {
            show: false,
        },
        series: [{
            data: [
                @foreach ($transaction_month as $month)
                {
                    x: "{{ $month->bulan }}",
                    y: "{{ $month->total_amount }}"
                },
                @endforeach
            ]
        }]
    }
    var chart_month = new ApexCharts(document.querySelector("#transaction_by_month"), options_month);
    chart_month.render();
    //End Transaction by month

    //Top 10 Merchant
    var options_merchant = {
        chart: {
            type: 'bar',
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800,
                animateGradually: {
                    enabled: true,
                    delay: 150
                },
                dynamicAnimation: {
                    enabled: true,
                    speed: 350
                }
            }
        },
        dataLabels: {
            enable: false,
        },
        legend: {
            show: false,
        },
        series: [{
            data: [
                @foreach ($transaction_top_merchant as $trans)
                {
                    x: "{{ $trans->merchant_name }}",
                    y: "{{ $trans->total_transaction }}"
                },
                @endforeach
            ]
        }]
    }
    var chart_merchant = new ApexCharts(document.querySelector("#top_ten_merchant"), options_merchant);
    chart_merchant.render();
    //End Top 10 Merchant

    //Top 10 By City
    var options_city = {
        chart: {
            type: 'bar',
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800,
                animateGradually: {
                    enabled: true,
                    delay: 150
                },
                dynamicAnimation: {
                    enabled: true,
                    speed: 350
                }
            }
        },
        dataLabels: {
            enable: false,
        },
        legend: {
            show: false,
        },
        series: [{
            data: [
                @foreach ($transaction_top_city as $top_city)
                {
                    x: "{{ $top_city->kabupaten_kota }}",
                    y: "{{ $top_city->total_transaction }}"
                },
                @endforeach
            ]
        }]
    }
    var chart_city = new ApexCharts(document.querySelector("#top_city"), options_city);
    chart_city.render();
    //End Top 10 By City

    //Merchant Active & Inactive
    var options = {
          series: [ {{ $merchant_active }} , {{ $merchant_inactive }} ],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Active', 'Inactive'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#merchant_status"), options);
    chart.render();
    //End Merchant Active & Inactive

     //Total Transaction Perday By month
    var options_transaction = {
        chart: {
            type: 'bar',
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800,
                animateGradually: {
                    enabled: true,
                    delay: 150
                },
                dynamicAnimation: {
                    enabled: true,
                    speed: 350
                }
            }
        },
        dataLabels: {
            enable: false,
        },
        legend: {
            show: false,
        },
        series: [{
            data: [
                @foreach ($transaction_current_month as $transaction)
                {
                    x: "{{ $transaction->hari }}",
                    y: "{{ $transaction->total_transaction }}"
                },
                @endforeach
            ]
        }]
    }
    var chart_transaction = new ApexCharts(document.querySelector("#transaction_day"), options_transaction);
    chart_transaction.render();
    //End Top 10 By City
</script>

<script>
function filter_year(year) {
    $.ajax({
        type: 'post',
        url: "{{ route('dashboard.filter_year') }}",
        data: {
            year: year,
        }, success:function(result) {
            chart_month.updateSeries([{
                data:result
            }])
        }
    });
}


$('#filter_date_merchant').change(function() {
    var dates = $(this).val();
       var split_dates = dates.split(" to ");
       if ( split_dates.length >= 2 ) {
            var start_date = split_dates[0];
            var end_date = split_dates[1];

            $.ajax({
                type: 'post',
                url: "{{ route('dashboard.filter_date_merchant') }}",
                data: {
                    start_date: start_date,
                    end_date: end_date,
                }, success:function(result) {
                    chart_merchant.updateSeries([{
                        data:result
                    }])
                }
            })
       }
})

$('#filter_month_transaction').change(function() {
    var dates = $(this).val();
       var split_dates = dates.split(" to ");
       if ( split_dates.length >= 2 ) {
            var start_date = split_dates[0];
            var end_date = split_dates[1];

            $.ajax({
                type: 'post',
                url: "{{ route('dashboard.filter_month_transaction') }}",
                data: {
                    start_date: start_date,
                    end_date: end_date,
                }, success:function(result) {
                    chart_transaction.updateSeries([{
                        data:result
                    }])
                }
            })
       }
})
</script>
@endpush
