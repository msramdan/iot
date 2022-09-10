<td class="text-center">
    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('roles.destroy', $model->id) }}" method="POST">
        @can('role_update')
        <a href="{{ route('roles.edit', $model->id) }}" class="btn btn-sm btn-success"><i class="mdi mdi-pencil"></i> Edit </a>
        @endcan
        @csrf
        @method('DELETE')
        @can('role_delete')
        <button type="submit" class="btn btn-sm btn-danger" {{ $model->id == 1 ? 'disabled' : null }}><i class="mdi mdi-trash-can-outline"></i> Delete </button>
        @endcan
    </form>
</td>
