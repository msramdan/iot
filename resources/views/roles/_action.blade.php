<td>
    @can('role_update')
    <a href="{{ route('roles.edit', $model->id) }}" class="btn btn-sm  btn-success"><i class="mdi mdi-pencil"></i>  </a>
    @endcan
    @can('role_delete')
    <form onsubmit="return confirm('Are you sure?');" action="{{ route('roles.destroy', $model->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" {{ $model->id == 1 ? 'disabled' : null }}><i class="mdi mdi-trash-can-outline"></i> </button>
    </form>
    @endcan
</td>
