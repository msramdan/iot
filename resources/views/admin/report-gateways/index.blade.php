@extends('layouts.master')

@section('title', __('Report Gateways'))
@push('css')
    <link href="{{ asset('assets/css/select2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/daterangepicker.min.css') }}" rel="stylesheet" />
@endpush
@push('js')
    <script type="text/javascript" src="{{ asset('assets/js/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
@endpush
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header" style="margin-top: 5px">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ __('Report Gateways') }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Report Gateways Log') }}</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <form method="get">
                                                @csrf
                                                <div class="input-group mb-4">
                                                    <input type="text" class="form-control border-0 dash-filter-picker shadow"
                                                        data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y"
                                                        id="date-transaction" placeholder=""
                                                        @if (!empty($start_dates) && !empty($end_dates)) value="{{ date('d M, Y', strtotime($start_dates)) }} to {{ date('d M, Y', strtotime($end_dates)) }}"
                                                        @else
                                                            value="" @endif />
                                                    <div class="input-group-text bg-primary border-primary text-white">
                                                        <i class="ri-calendar-2-line"></i>
                                                    </div>
                                                    <input type="hidden" name="start_date" id="start_date"
                                                    value="{{ $microFrom }}">
                                                    <input type="hidden" name="end_date" id="end_date"
                                                        value="{{ $microTo }}">
                                                    </div>
                                                <!--end row-->
                                            </form>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="gwid" id="gwid" class="form-control">
                                                <option value="All">All Gwid
                                                </option>
                                                @foreach ($gateway as $data)
                                                    <option value="{{ $data->id }}">{{ $data->gwid }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button id="btnExport" class="btn btn-primary"><i class='fas fa-file-excel'></i>
                                                {{ __('Export') }}</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="table-responsive p-1">
                                <table class="table table-bordered table-sm" id="data-table" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Gwid') }}</th>
                                            <th>{{ __('Status Online') }}</th>
                                            <th>{{ __('Pktfwd Status') }}</th>
                                            <th>{{ __('Connection Type') }}</th>
                                            <th>{{ __('Created At') }}</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
    <script>
        $('#gwid').select2();
        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, {
                data: 'gwid',
                name: 'gwid',
            },
            {
                data: 'status_online',
                name: 'status_online',
            },
            {
                data: 'pktfwd_status',
                name: 'pktfwd_status',
            },
            {
                data: 'type',
                name: 'type'
            },
            {
                data: 'created_at',
                name: 'created_at'
            }
        ];

        const params = new Proxy(new URLSearchParams(window.location.search), {
            get: (searchParams, prop) => searchParams.get(prop),
        });
        // Get the value of "some_key" in eg "https://example.com/?some_key=some_value"
        let query = params.rawdata; // "some_value"


        var table = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('report-gateways.index') }}",
                data: function(s) {
                    s.gwid = $('select[name=gwid] option').filter(':selected').val()
                    s.start_date = $("#start_date").val();
                    s.end_date = $("#end_date").val();
                }
            },
            columns: columns,
        });

        $('#gwid').change(function() {
            table.draw();
        })
        $('#daterange-btn').change(function() {
            table.draw();
        })

        $('#date-transaction').change(function() {
            let dates = $(this).val()
            let split = dates.split(" to ")

            if (split.length >= 2) {
                var start_dates = new Date(split_dates[0].replace(',', '')).getTime();
                var end_dates = new Date(split_dates[1].replace(',', '')).getTime();

                $('#start_date').val(start_dates);
                $('#end_date').val(end_dates);

                table.draw()
            }
        })
    </script>

    <script type="text/javascript" charset="utf-8">
        const showLoading = function() {
            swal({
                title: 'Now loading',
                allowEscapeKey: false,
                allowOutsideClick: false,
                timer: 2000,
                onOpen: () => {
                    swal.showLoading();
                }
            }).then(
                () => {},
                (dismiss) => {
                    if (dismiss === 'timer') {
                        console.log('closed by timer!!!!');
                        swal({
                            title: 'Finished!',
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        })
                    }
                }
            )
        };

        $(document).on('click', '#btnExport', function(event) {
            event.preventDefault();
            exportData();

        });
        var exportData = function() {
            var gwid = $('#gwid').val();
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            var url = '/panel/export-data-gateway/' + gwid + '/' + start_date + '/' + end_date;
            var d = new Date(); // 1-Feb-2011
            var today_date =
                ("0" + d.getDate()).slice(-2) + "-" +
                ("0" + (d.getMonth() + 1)).slice(-2) + "-" +
                d.getFullYear();

            $.ajax({
                url: url,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                data: {},
                xhrFields: {
                    responseType: 'blob'
                },
                beforeSend: function() {
                    Swal.fire({
                        title: 'Please Wait !',
                        html: 'Sedang melakukan proses export data', // add html attribute if you want or remove
                        allowOutsideClick: false,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        },
                    });

                },
                success: function(data) {
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(data);
                    var nameFile = 'RM-GatewayLog-' + today_date + '.xlsx'
                    console.log(nameFile)
                    link.download = nameFile;
                    link.click();
                    swal.close()
                },
                error: function(data) {
                    console.log(data)
                    Swal.fire({
                        icon: 'error',
                        title: "Data export failed",
                        text: "Please check",
                        allowOutsideClick: false,
                    })
                }
            });
        }
    </script>
@endpush
