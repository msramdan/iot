<td>
    <a href="{{ route('instances.tickets.edit', $model->id) }}" class="btn btn-sm  btn-success {{ $model->status != 'open' ? 'disabled' : '' }}"><i class="mdi mdi-pencil"></i>
    </a>
    <form onsubmit="return confirm('Are you sure?');" action="{{ route('instances.tickets.destroy', $model->id) }}" method="POST"
        class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm  btn-danger" {{ $model->status != 'open' ? 'disabled' : '' }}><i class="mdi mdi-trash-can-outline"></i> </button>
    </form>
</td>