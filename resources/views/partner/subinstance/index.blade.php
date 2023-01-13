@extends('layouts.master_partner')
@section('title', 'Dashboard Partner')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Device</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Device</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code Sub Intance</th>
                                            <th>Sub Intance</th>
                                            <th>Jumlah Cluster</th>
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
        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'code_subinstance',
                name: 'code_subinstance'
            },
            {
                data: 'name_subinstance',
                name: 'name_subinstance'
            }
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
            ajax: "{{ route('instances.subinstance.index') }}",
            columns: columns
        });
    </script>
@endpush
