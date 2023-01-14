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
                                            <th></th>
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
        let columns = [
            {
                className: 'dt-control',
                orderable: false,
                data: null,
                defaultContent: '',
            },
            {
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

        var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('instances.subinstance.index') }}",
            columns: columns
        });

        $('#dataTable tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
            } else {
                row.child(subinstance(row.data().cluster)).show();
                tr.addClass('shown');
            }
        });

        const subinstance = data => {
            var listCluster = '';

            data.forEach( val => {
                listCluster +=  `<li class="list-group-item">${button(val)} ${val.name}</li>`;
            } )

            return `<ul class="list-group list-group-flush">
                        ${ listCluster }
                    </ul>`
        }

        const button = (data) => {
            let button = '';

            return button = `
                <a href="{{ url("/") }}/device?cluster_id=${data.id}" target="_blank" class="btn btn-sm  btn-warning" title="cluster"><i class="mdi mdi-bank"></i></a>
                `
        }

    </script>
@endpush
