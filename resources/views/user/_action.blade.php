<td>
    @can('user_update')
    <a href="{{ route('user.edit', $model->id) }}" class="btn btn-sm  btn-success"><i class="mdi mdi-pencil"></i>  </a>
    @endcan

    @can('user_delete')
        <form action="{{ route('user.destroy', $model->id) }}" method="post" class="d-inline"
            onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm  btn-danger" {{ $model->id == 1 ? 'disabled' : null }}><i class="mdi mdi-trash-can-outline"></i>  </button>

        </form>
    @endcan
</td>
