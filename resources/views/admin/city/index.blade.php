@extends('layouts.master')
@section('title', 'Data Kabupaten Kota')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Kabupaten</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Kabupaten</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @can('city_create')
                        <a href="{{ route('city.create') }}" class="btn btn-md btn-secondary"> <i
                                class="mdi mdi-plus"></i> Create</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm" id="dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kabupaten</th>
                                        <th>Ibukota</th>
                                        <th>BSNI</th>
                                        @canany(['city_update', 'city_delete'])
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
    const action = '{{ auth()->user()->can('city_update') || auth()->user()->can('city_delete') ? 'yes yes yes' : '' }}'
        let columns = [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'kabupaten_kota',
                name: 'kabupaten_kota'
            },
            {
                data: 'ibukota',
                name: 'ibukota'
            },
            {
                data: 'k_bsni',
                name: 'k_bsni'
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
            ajax: "{{ route('city.index') }}",
            columns: columns
        });
</script>
@endpush
