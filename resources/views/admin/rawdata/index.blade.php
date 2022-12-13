@extends('layouts.master')
@section('title', 'Raw Data')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Raw Data</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Raw Data</li>
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
                            <table class="table table-sm" id="dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th>Parsed Data</th>
                                        <th>devEUI</th>
                                        <th>AppID</th>
                                        <th>Type</th>
                                        <th>Freq</th>
                                        <th>Fport</th>
                                        <th>Data</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
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
                data: 'parsed',
                name: 'parsed'
            },
            {
                data: 'devEUI',
                name: 'devEUI'
            },
            {
                data: 'appID',
                name: 'appID'
            },
            {
                data: 'type',
                name: 'type'
            },
            {
                data: 'freq',
                name: 'freq'
            },
            {
                data: 'fport',
                name: 'fport'
            },
            {
                data: 'data',
                name: 'data'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
        ]



        const table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('rawdata.index') }}",
            columns: columns,
            order: [[1, 'asc']]
        });

        $('#dataTable tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
            } else {
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
            tr.closest('tbody').find('textarea').each(function () {
                this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
                this.style.height = 0;
                this.style.height = (this.scrollHeight) + "px";
            })
        });

        function format(d) {
            return (
                `<div class="mb-4">
                    <label for="form-label">Payload</label>
                    <textarea name="" id="" cols="30" class="form-control" style="height: 100%;" disabled>${d.payload}</textarea>
                </div>`
            );
        }
    </script>
    @endpush
