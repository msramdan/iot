<td>
    @can('role_update')
    <a href="{{ route('roles.edit', $model->id) }}" class="btn  btn-success"><i class="mdi mdi-pencil"></i> Edit </a>
    @endcan
    @can('role_delete')
    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('roles.destroy', $model->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn  btn-danger" {{ $model->id == 1 ? 'disabled' : null }}><i class="mdi mdi-trash-can-outline"></i> Delete </button>
    </form>
    @endcan
</td>
