@extends('layouts.master_partner')
@section('title', 'Data Ticket')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Ticket</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('instances.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Ticket</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- @can('ticket_create') --}}
                            <a href="{{ route('instances.tickets.create') }}" class="btn btn-md btn-secondary"> <i class="mdi mdi-plus"></i> Create
                            </a>
                            {{-- @endcan --}}
                        </div>
                        <div class="card-body">
                            {{-- <div class="row">
                            <div class="col-md-3">
                                <form method="get">
                                    @csrf
                                    <div class="input-group mb-4">
                                        <input type="text" class="form-control border-0 dash-filter-picker shadow"
                                            data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y"
                                            data-deafult-date="01 Jan 2022 to 31 Jan 2022" value=""
                                            id="filter_date_merchant" />
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
                                        <select name="kabkot_id" id="kota" class="form-control">
                                            <option value="">-- Filter By City --</option>

                                        </select>
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                            <div class="col-md-3">
                                <form method="get">
                                    @csrf
                                    <div class="input-group mb-4">
                                        <select name="kabkot_id" id="kota" class="form-control">
                                            <option value="">-- Filter By MCC --</option>

                                        </select>
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                        </div> --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
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
            '{{ auth()->user()->can('ticket_update') ||auth()->user()->can('ticket_delete')? 'yes yes yes': '' }}'
        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'subject',
            },
            {
                data: 'description',
            },
            {
                data: 'status',
                render: function(data, type, row, meta) {
                    let color;
                    switch (data) {
                        case 'open':
                            color = 'success'
                            break;

                        case 'cancelled':
                            color = 'danger'
                            break;

                        default:
                            color = 'warning'
                            break;
                    }

                    return `<span class="badge bg-${color}">${data}</span>`
                }
            },
            {
                data: 'created_at',
                render: function(data, type, row, meta) {
                    return moment(data).format('DD MMM YYYY')
                }
            },
        ]

        columns.push({
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        })

        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('instances.tickets.index') }}?id={{ request()->get('id') }}&status={{ request()->get('status') }}",
            columns: columns
        });
    </script>
@endpush
