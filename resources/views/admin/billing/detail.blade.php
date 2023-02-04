@extends('layouts.master')
@section('title', 'Detail Billing Data')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Detail Billing Data</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Detail Billing Data</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                           <ul class="nav list-group">
                                                <li class="list-item"><h6>Instance : {{ $cluster->instance_name }}</h6></li>
                                                <li class="list-item"><h6>Sub Instance : {{ $cluster->name_subinstance }}</h6></li>
                                                <li class="list-item"><h6>Cluster : {{ $cluster->name }}</h6></li>
                                           </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6>Total Billing</h6>
                                        </div>
                                        <div class="card-body">
                                            <h6 id="total_amount_bill">Rp. {{ number_format($total_amount_bill, 0, '.', '.') }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6>Periode</h6>
                                        </div>
                                        <div class="card-body">
                                            <h6 id="">{{ date('d M, Y', strtotime($start_dates)) }} - {{ date('d M, Y', strtotime($end_dates)) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-4">
                                    <form method="get">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <input type="text" class="form-control border-0 dash-filter-picker shadow"
                                                data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y"
                                                id="date-transaction" placeholder="Filter by registered date"
                                                @if (!empty($start_dates) && !empty($end_dates))
                                                    value="{{ date('d M, Y', strtotime($start_dates)) }} to {{ date('d M, Y', strtotime($end_dates)) }}"
                                                @else
                                                    value=""
                                                @endif/>
                                            <div class="input-group-text bg-primary border-primary text-white">
                                                <i class="ri-calendar-2-line"></i>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div> --}}
                            <input type="hidden" class="form-control"
                                id="date-transaction"
                                @if (!empty($start_dates) && !empty($end_dates))
                                    value="{{ date('d M, Y', strtotime($start_dates)) }} to {{ date('d M, Y', strtotime($end_dates)) }}"
                                @else
                                    value=""
                                @endif/>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6>Cluster Biling Formula</h6>
                                        </div>
                                        <div class="card-body">
                                            <ul class="nav list-group">
                                                <li class="list-item">
                                                    Water meter : SUM(daily_usage) * {{ $cluster->xpercentage_water }} + {{ $cluster->yfixed_cost_water }}
                                                </li>
                                                <li class="list-item">
                                                    Power meter : SUM(daily_usage) * {{ $cluster->xpercentage_power }} + {{ $cluster->yfixed_cost_power }}
                                                </li>
                                                <li class="list-item">
                                                    Gas meter : SUM(daily_usage) * {{ $cluster->xpercentage_gas }} + {{ $cluster->yfixed_cost_gas }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Device ID</th>
                                            <th>Device Type</th>
                                            <th>Total Usage</th>
                                            <th>Total Billing (Rp)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($devices as $device)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $device->devEUI }}</td>
                                                <td>{{ $device->category }}</td>
                                                <td>
                                                   @if ($device->category == 'Water Meter')
                                                   {{ $device->total_usage ? $device->total_usage. ' L' : '0 L' }}
                                                   @elseif ($device->category == 'Power Meter')
                                                   {{ $device->total_usage ? $device->total_usage. ' Kwh' : '0 Kwh' }}
                                                   @elseif ($device->category == 'Gas Meter')
                                                   {{ $device->total_usage ? $device->total_usage. ' m3' : '0 m3' }}
                                                   @endif
                                                </td>
                                                <td>Rp. {{ number_format($device->total_billing,0, '.', '.') }}</td>
                                            </tr>
                                        @endforeach
                                        <td>
                                            <td colspan="3"><b>Total Nominal Billing</b></td>
                                            <td><b>Rp. {{ number_format($total_amount_bill,0, '.', '.') }}</b></td>
                                        </td>
                                    </tbody>
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

        var table = $('#dataTable').DataTable();

        // var total_amount_bill = "{{ $total_amount_bill }}";

        // $('#dataTable tbody').append(
        //     `<tr>
        //         <td colspan="4">Total Billing</td>
        //         <td>${total_amount_bill}</td>
        //     </tr>`
        // );
    </script>
@endpush
