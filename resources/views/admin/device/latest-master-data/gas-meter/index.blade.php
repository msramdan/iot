@extends('layouts.master')
@section('title', 'Smart Gas Meter')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Smart Gas Meter</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Smart Gas Meter</li>
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
                                            <th style="text-align:center">#</th>
                                            <th style="text-align:center">Device</th>
                                            <th style="text-align:center">Dev EUI</th>
                                            <th style="text-align:center">Frame Id</th>
                                            <th style="text-align:center">Gas Consumption</th>
                                            <th style="text-align:center">Gas Total Purchase</th>
                                            <th style="text-align:center">Purchase Remain</th>
                                            <th style="text-align:center">Balance of Battery</th>
                                            <th style="text-align:center">Valve Status</th>
                                            <th style="text-align:center">Detail</th>
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
                data: 'gas_consumption',
                name: 'gas_consumption',
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

        $('#dataTable tbody').on('click', 'td.dt-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
            } else {
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
            tr.closest('tbody').find('textarea').each(function() {
                this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
                this.style.height = 0;
                this.style.height = (this.scrollHeight) + "px";
            })
        });

        function format(d) {
            return (
                `<div class="mb-4">
                    <label for="form-label">Meter status word</label>
                    ${d.meter_status_word}
                </div>`
            );
        }
    </script>
@endpush
