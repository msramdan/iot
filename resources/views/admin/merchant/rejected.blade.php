@extends('layouts.master')
@section('title', 'Data Merchant Active')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Merchant Rejected</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Merchant Rejected</li>
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
                                                data-deafult-date="" value=""
                                                id="filter_date_merchant" placeholder="Filter by registered date"/>
                                            <div class="input-group-text bg-primary border-primary text-white">
                                                <i class="ri-calendar-2-line"></i>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <form method="get">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <select name="city" id="kota" class="form-control">
                                                <option value="">-- Filter By City --</option>
                                                @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->kabupaten_kota }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <form method="get">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <select name="merchant_category" id="merchant_category" class="form-control">
                                                <option value="">-- Filter By MCC --</option>
                                                @foreach ($merchant_categories as $merchant_category)
                                                <option value="{{ $merchant_category->id }}">{{ $merchant_category->merchants_category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Merchant ID</th>
                                            <th>Merchant Name</th>
                                            <th>Address</th>
                                            <th>Region</th>
                                            <th>Registered Date</th>
                                            <th>MCC</th>
                                            {{-- <th>City</th> --}}
                                            @canany(['merchant_show', 'merchant_update', 'merchant_delete',
                                                'approved_step_1', 'approved_step_2'])
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
@endsection
@push('js')
    <script>
        let base_url = "{{ url('/') }}";

        const action =
            '{{ auth()->user()->can('merchant_update') ||auth()->user()->can('approved_step_1') ||auth()->user()->can('approved_step_2') ||auth()->user()->can('merchant_delete')? 'yes yes yes': '' }}'
        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: null,
                render: function(data, dataType, row) {
                    console.log(row);
                    return `<a href="{{ route('merchant.index') }}/${row.id}">${row.mid}</a>`
                }
            },
            {
                data: 'merchant_name',
                name: 'merchant_name'
            },
            {
                data: 'address1',
                name: 'address1'
            },
            {
                data: 'city',
                name: 'city'
            },
            {
                data: 'created_at',
                name: 'created_at',
            },
            {
                data: 'merchant_category',
                name: 'merchant_category'
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
                url: "{{ route('merchant.rejected') }}",
                data: function (s) {
                    s.date = $('#filter_date_merchant').val(),
                    s.city = $('select[name=city] option').filter(':selected').val()
                    s.merchant_category = $('select[name=merchant_category] option').filter(':selected').val()
                }
            },
            columns: columns
        });

        $('#filter_date_merchant').change(function() {
            var dates = $(this).val();
            var split_dates = dates.split(" to ");
            if ( split_dates.length >= 2 ) {
                table.draw();
            }
        });

        $('#kota').change(function() {
            table.draw();
        })

        $('#merchant_category').change(function() {
            table.draw();
        })
    </script>
@endpush
