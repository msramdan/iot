<td>
    @can('merchant_update')
    <a href="{{ route('merchant.show', $model->id) }}" class="btn  btn-success"><i class="mdi mdi-pencil"></i> Detail </a>
    <a href="{{ route('merchant.edit', $model->id) }}" class="btn  btn-warning"><i class="mdi mdi-pencil"></i> Edit </a>
    @endcan
    @can('merchant_delete')
    <form onsubmit="return confirm('Are you sure?');" action="{{ route('merchant.destroy', $model->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn  btn-danger"><i class="mdi mdi-trash-can-outline"></i> Delete </button>
    </form>
    @endcan
</td>
