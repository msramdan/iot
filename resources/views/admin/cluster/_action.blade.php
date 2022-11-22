<td>
    @can('cluster_update')
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal{{ $model->id }}">
        <i class="mdi mdi-pencil"></i>
    </button>
    
    <div class="modal fade" id="editModal{{ $model->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('subinstance.cluster.edit', [$model->subinstance_id, $model->id]) }}" method="post" class="edit">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                         
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="save-btn"><i class="mdi mdi-content-save"></i>
                            SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan
    @can('cluster_delete')
    <form onsubmit="handleDelete()" action="{{ route('subinstance.cluster.destroy', [$model->subinstance_id, $model->id]) }}" method="POST"
        class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm  btn-danger"><i class="mdi mdi-trash-can-outline"></i> </button>
    </form>
    @endcan
</td>