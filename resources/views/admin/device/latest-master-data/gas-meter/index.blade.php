@extends('layouts.master')
@section('title', 'Mater Latest Data Device')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Master Data Gas Meter</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Parsed Data Gas Meter</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm" id="dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th>Device</th>
                                        <th>Dev EUI</th>
                                        <th>Frame Id</th>
                                        <th>Gas Consumtion</th>
                                        <th>Gas Total Purchase</th>
                                        <th>Purchase Remain</th>
                                        <th>Balance of battery</th>
                                        <th>Valve status</th>
                                        <th>Detail</th>
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
            data: 'device',
            name: 'device',
        },
        {
            data: 'devEUI',
            name: 'devEUI',
        },
        {
            data: 'frame_id',
            name: 'frame_id'
        },
        {
            data: 'gas_consumtion',
            name: 'gas_consumtion',
        },
        {
            data: 'gas_total_purchase',
            name: 'gas_total_purchase',
        },
        {
            data: 'purchase_remain',
            name: 'purchase_remain',
        },
        {
            data: 'balance_of_battery',
            name: 'balance_of_battery',
        },
        {
            data: 'valve_status',
            name: 'valve_status'
        },
        {
            data: 'detail',
            name: 'detail'
        },
    ];

    const table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('master_gas_meter.index') }}",
        columns: columns
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
                    <label for="form-label">Meter status word</label>
                    <textarea name="" id="" cols="30" class="form-control" style="height: 100%;" disabled>${d.meter_status_word}</textarea>
                </div>`
            );
        }
</script>
@endpush
