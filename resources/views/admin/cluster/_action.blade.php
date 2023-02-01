<td>
    @can('cluster_update')
        <button type="button" class="btn btn-success btn-sm " data-bs-toggle="modal"
            data-bs-target="#editModal{{ $model->id }}">
            <i class="mdi mdi-pencil"></i>
        </button>

        <div class="modal edit-modal fade" id="editModal{{ $model->id }}" tabindex="-1" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('subinstance.cluster.update', [$model->subinstance_id, $model->id]) }}"
                        method="post" id="edit{{ $model->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Cluster</h5>
                        </div>
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Kode</label>
                                <input type="text" name="kode" class="form-control" id="kode"
                                    placeholder="Nama Cluster" value="{{ $model->kode }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Nama Cluster" value="{{ $model->name }}" required>
                            </div>
                            <hr>
                            <div class="form-group">
                                <h3 class="card-title text-bold">Water Meter</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="min_tolerance">Persentage (X)</label>
                                        <input type="number" step="any" class="form-control" name="xpercentage_water"
                                            value="{{ $model->xpercentage_water }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="max_tolerance">Fixed Cost (Y)</label>
                                        <input type="number" step="any" class="form-control" name="yfixed_cost_water"
                                            value="{{ $model->yfixed_cost_water }}" required>
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
                                            value="{{ $model->xpercentage_power }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="max_tolerance">Fixed Cost (Y)</label>
                                        <input type="number" step="any" class="form-control" name="yfixed_cost_power"
                                            value="{{ $model->yfixed_cost_power }}" required>
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
                                            value="{{ $model->xpercentage_gas }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="max_tolerance">Fixed Cost (Y)</label>
                                        <input type="number" step="any" class="form-control" name="yfixed_cost_gas"
                                            value="{{ $model->yfixed_cost_gas }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary edit-btn"><i class="mdi mdi-content-save"></i>
                                SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
    @can('cluster_delete')
        <form onsubmit="handleDelete()"
            action="{{ route('subinstance.cluster.destroy', [$model->subinstance_id, $model->id]) }}" method="POST"
            class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm  btn-danger"><i class="mdi mdi-trash-can-outline"></i> </button>
        </form>
    @endcan
</td>

<script>
    $(document).ready(function() {

        const modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('edit{{ $model->id }}'));

        $('form#edit{{ $model->id }}').submit(function() {
            event.preventDefault();

            const data = $(this).serialize()

            $.ajax({
                beforeSend: function() {
                    $('.edit-btn').html('Loading...')
                    $('.edit-btn').prop('disabled', true)
                },
                url: $(this).attr('action'),
                method: 'POST',
                data,
                success: function(res) {
                    modal.hide();
                    location.reload();
                },
                error: function(err) {
                    modal.hide();
                    toastMixin.fire({
                        title: err.responseJSON.message,
                        icon: 'error'
                    });
                    $('form#edit{{ $model->id }}')[0].reset();
                    $('.edit-btn').html('<i class="mdi mdi-content-save"></i>SIMPAN')
                    $('.edit-btn').prop('disabled', false)
                }
            })
        })
    })
</script>
