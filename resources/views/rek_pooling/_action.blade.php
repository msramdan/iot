<td>
    @can('rek_pooling_update')
    <a href="{{ route('rek_pooling.edit', $model->id) }}" class="btn btn-sm  btn-success"><i class="mdi mdi-pencil"></i>  </a>
    @endcan
    @can('rek_pooling_delete')
    <form onsubmit="return confirm('Are you sure?');" action="{{ route('rek_pooling.destroy', $model->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm  btn-danger"><i class="mdi mdi-trash-can-outline"></i>  </button>
    </form>
    @endcan
</td>
