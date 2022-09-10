<td>
    @can('user_update')
    <a href="{{ route('roles.edit', $model->id) }}" class="btn  btn-success"><i class="mdi mdi-pencil"></i> Edit </a>
    @endcan

    @can('user_delete')
        <form action="{{ route('user.destroy', $model->id) }}" method="post" class="d-inline"
            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('delete')
            <button type="submit" class="btn  btn-danger" {{ $model->id == 1 ? 'disabled' : null }}><i class="mdi mdi-trash-can-outline"></i> Delete </button>

        </form>
    @endcan
</td>
