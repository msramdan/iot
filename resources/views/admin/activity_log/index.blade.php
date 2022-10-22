@extends('layouts.master')
@section('title', 'Activity Log')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Activity Log</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Activity Log</li>
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
                                        <th>Log Name</th>
                                        <th>Description</th>
                                        <th>Event</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>Time</th>
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
                data: 'log_name',
                name: 'log_name'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: 'event',
                name: 'event'
            },
            {
                data: 'causer',
                name: 'causer'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'time',
                name: 'time'
            },
            
        ]

        

        const table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('activity_log.index') }}",
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
        });

        function format(d) {
            console.log(d)
            return (
                `<div class="mb-4">
                    <label for="form-label">Old Value</label>
                    <textarea name="" id="" cols="30" rows="10" class="form-control" disabled>${d.old_value}</textarea>
                </div>
                <div class="mb-4">
                    <label for="form-label">New Value</label>
                    <textarea name="" id="" cols="30" rows="10" class="form-control" disabled>${d.new_value}</textarea>
                </div>`
                );
        }
</script>
@endpush