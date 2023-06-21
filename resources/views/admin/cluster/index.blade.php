@extends('layouts.master')
@section('title', 'Data Cluster')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Cluster</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Cluster</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h6>Create Cluster</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('subinstance.cluster.store', $subinstance->id) }}" method="post"
                                id="create">
                                @csrf
                                <input type="text" name="subinstance_id" value="{{ $subinstance->id }}">
                                <input type="text" name="instance_id" value="{{ $subinstance->instance_id }}">
                                <div class="mb-3">
                                    <label for="">Kode</label>
                                    <input type="text" name="kode" class="form-control" id="kode"
                                        placeholder="Nama Cluster" value="{{ $kode }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Nama Cluster" required>
                                </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h6>Variable For Billing Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <h3 class="card-title text-bold">Water Meter</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="min_tolerance">Persentage (X)</label>
                                        <input type="number" step="any" class="form-control" name="xpercentage_water"
                                            value="" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="max_tolerance">Fixed Cost (Y)</label>
                                        <input type="number" step="any" class="form-control" name="yfixed_cost_water"
                                            value="" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <h3 class="card-title text-bold">Power Meter</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="min_tolerance">Persentage (X)</label>
                                        <input type="number" step="any" class="form-control" name="xpercentage_power"
                                            value="" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="max_tolerance">Fixed Cost (Y)</label>
                                        <input type="number" step="any" class="form-control" name="yfixed_cost_power"
                                            value="" required>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group mb-2">
                                <h3 class="card-title text-bold">Gas Meter</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="min_tolerance">Persentage (X)</label>
                                        <input type="number" step="any" class="form-control" name="xpercentage_gas"
                                            value="" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="max_tolerance">Fixed Cost (Y)</label>
                                        <input type="number" step="any" class="form-control" name="yfixed_cost_gas"
                                            value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="{{ route('instance.index') }}" class="btn btn-warning"><i
                                        class="mdi mdi-arrow-left-thin"></i> Back</a>
                                <button type="submit" class="btn btn-primary" id="save-btn"><i
                                        class="mdi mdi-content-save"></i>
                                    SIMPAN</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode</th>
                                            <th>Name</th>
                                            <th>Water Meter (X)</th>
                                            <th>Water Meter (Y)</th>
                                            <th>Power Meter (X)</th>
                                            <th>Power Meter (Y)</th>
                                            <th>Gas Meter (X)</th>
                                            <th>Gas Meter (Y)</th>
                                            @canany(['cluster_show', 'cluster_update', 'cluster_delete'])
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

    </div>
@endsection
@push('js')
    <script>
        let base_url = "{{ url('/') }}";

        const action =
            '{{ auth()->user()->can('cluster_update') ||auth()->user()->can('cluster_delete')? 'yes yes yes': '' }}'
        let columns = [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'kode',
            },
            {
                data: 'name',
            },
            {
                data: 'xpercentage_water',
            },
            {
                data: 'yfixed_cost_water',
            },
            {
                data: 'xpercentage_power',
            },
            {
                data: 'yfixed_cost_power',
            },
            {
                data: 'xpercentage_gas',
            },
            {
                data: 'yfixed_cost_gas',
            },
        ]


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
            ajax: "{{ route('subinstance.cluster.index', $subinstance->id) }}",
            columns: columns
        });

        const handleDelete = () => {
            event.preventDefault();
            confirm("Are your sure?");
            const url = $(event.target).attr('action');

            $.ajax({
                url,
                method: 'POST',
                data: $(event.target).serialize(),
                success: function(res) {
                    toastMixin.fire({
                        title: res.message,
                        icon: res.type
                    });
                    table.ajax.reload()
                },
                error: function(err) {
                    console.log(err)
                    toastMixin.fire({
                        title: 'Failed to delete cluster',
                        icon: 'error'
                    });
                }
            })
        }


        $('form#create').submit(function() {
            event.preventDefault();

            const data = $(this).serialize()

            $.ajax({
                beforeSend: function() {
                    $('#save-btn').html('Loading...')
                    $('#save-btn').prop('disabled', true)
                },
                url: $(this).attr('action'),
                method: 'POST',
                data,
                success: function(res) {
                    toastMixin.fire({
                        title: res.message,
                        icon: res.type
                    });
                    table.ajax.reload()

                    $('form#create')[0].reset();
                    $('#save-btn').html('<i class="mdi mdi-content-save"></i>SIMPAN')
                    $('#save-btn').prop('disabled', false)
                    $('#kode').val(res.kode);
                },
                error: function(err) {
                    toastMixin.fire({
                        title: err.responseJSON.message,
                        icon: 'error'
                    });
                    $('form#create')[0].reset();
                    $('#save-btn').html('<i class="mdi mdi-content-save"></i>SIMPAN')
                    $('#save-btn').prop('disabled', false)
                }
            })
        })
    </script>
@endpush
