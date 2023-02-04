@extends('layouts.master')
@section('title', 'Data Billing Data')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Billing Data</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Billing Data</li>
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
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Intance</th>
                                            <th>Subintance</th>
                                            <th>Cluster</th>
                                            <th>Water Meter</th>
                                            <th>Power Meter</th>
                                            <th>Gas Meter</th>
                                            @canany(['billing_detail', 'edit_variable'])
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
    </div>

    </div>
@endsection
@push('js')
    <script>
        let base_url = "{{ url('/') }}";

        const action =
            '{{ auth()->user()->can('detail_billing') ||auth()->user()->can('edit_variable')? 'yes yes yes': '' }}'
        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'instance',
            },
            {
                data: 'subinstance',
            },
            {
                data: 'cluster',
            },
            {
                data: 'water_meter',
            },
            {
                data: 'power_meter',
            },
            {
                data: 'gas_meter',
            },
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
            ajax: {
                url: "{{ route('billing-data.index') }}",
                data: function (d) {
                    d.date = $('#date-transaction').val();
                }
            },
            columns: columns
        });

        $('#date-transaction').change(function() {
            let dates = $(this).val()
            let split = dates.split(" to ")

            if (split.length >= 2) {
                table.draw()
            }
        })
    </script>
@endpush
