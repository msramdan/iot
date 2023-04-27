@extends('layouts.master')
@section('title', 'Data Provinsi')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Provinsi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Provinsi</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            @can('province_create')
                                <a href="{{ route('province.create') }}" class="btn btn-md btn-secondary"> <i
                                        class="mdi mdi-plus"></i> Create</a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm" id="dataTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Provinsi</th>
                                            <th>Ibukota</th>
                                            <th>P BSNI</th>
                                            @canany(['province_update', 'province_delete'])
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
        const action =
            '{{ auth()->user()->can('province_update') ||auth()->user()->can('province_delete')? 'yes yes yes': '' }}'
        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'provinsi',
                name: 'provinsi'
            },
            {
                data: 'ibukota',
                name: 'ibukota'
            },
            {
                data: 'p_bsni',
                name: 'p_bsni'
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
            ajax: "{{ route('province.index') }}",
            columns: columns
        });
    </script>
@endpush
