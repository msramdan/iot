<td>
    @can('merchants_category_update')
    <a href="{{ route('merchants_c.edit', $model->id) }}" class="btn btn-sm  btn-success"><i class="mdi mdi-pencil"></i> </a>
    @endcan
    @can('merchants_category_delete')
    <form onsubmit="return confirm('Are you sure?');" action="{{ route('merchants_c.destroy', $model->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm  btn-danger"><i class="mdi mdi-trash-can-outline"></i> </button>
    </form>
    @endcan
</td>