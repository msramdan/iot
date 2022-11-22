@extends('layouts.master')
@section('title', 'Data Instance')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Instance</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Instance</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @can('instance_create')
                        <a href="{{ route('instance.create') }}" class="btn btn-md btn-secondary"> <i
                                class="mdi mdi-plus"></i> Create</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm" id="dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th>Instance Code</th>
                                        <th>Instance Name</th>
                                        <th>Bussiness</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        @canany(['instance_update', 'instance_delete'])
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
            '{{ auth()->user()->can('instance_update') ||auth()->user()->can('instance_delete')? 'yes yes yes': '' }}'
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
                data: 'instance_code',
                name: 'instance_code'
            },
            {
                data: 'instance_name',
                name: 'instance_name'
            },
            {
                data: 'bussiness',
                name: 'bussiness',
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'phone',
                name: 'phone'
            },
            {
                data: 'city',
                name: 'city',
            }
        ];

        


        if (action) {
            columns.push({
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            })
        }

        const table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('instance.index') }}",
            columns: columns
        });

        $('#dataTable tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
            } else {
                row.child(subinstance(row.data().subinstance)).show();
                tr.addClass('shown');
            }
        });

        const subinstance = data => {
            return `<ul class="list-group list-group-flush">
                        ${ data.map(val => `<li class="list-group-item">${button(val)} ${val.name_subinstance}</li>`) }
                    </ul>`
        }

        const button = (data) => {
            console.log(data);
            let button = '';
            const url = '{{ url("/panel") }}' + `/instance/${data.instance_id}/subinstance/${data.id}`

            return button = `
                <a href="${'{{ url("/panel") }}' + `/subinstance/${data.id}`}/cluster" class="btn btn-sm  btn-warning"><i class="mdi mdi-pencil"></i> </a>
                @can('subinstance_update')
                    <a href="${url+'/edit'}" class="btn btn-sm  btn-success"><i class="mdi mdi-pencil"></i> </a>
                @endcan
                @can('subinstance_delete')
                <form onsubmit="return confirm('Are you sure?');" action="${url}" method="POST"
                    class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm  btn-danger"><i class="mdi mdi-trash-can-outline"></i> </button>
                </form>
                @endcan('subinstance_delete')
                `
            
        }
</script>
@endpush