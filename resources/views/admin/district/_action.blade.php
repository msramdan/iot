<td>
    @can('district_update')
    <a href="{{ route('district.edit', $model->id) }}" class="btn btn-sm  btn-success"><i class="mdi mdi-pencil"></i> </a>
    @endcan
    @can('district_delete')
    <form onsubmit="return confirm('Are you sure?');" action="{{ route('district.destroy', $model->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm  btn-danger"><i class="mdi mdi-trash-can-outline"></i> </button>
    </form>
    @endcan
</td>
