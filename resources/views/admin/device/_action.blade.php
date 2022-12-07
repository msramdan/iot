<td>
    @can('device_sign')
    <a href="{{ route('device.edit', $model->id) }}" class="btn btn-sm  btn-warning" title="Sign Cluster"><i class="mdi mdi-cog"></i>
    </a>
    @endcan

    @can('device_update')
    <a href="{{ route('device.edit', $model->id) }}" class="btn btn-sm  btn-success" title="Edit Device"><i class="mdi mdi-pencil"></i>
    </a>
    @endcan
    @can('device_delete')
    <form onsubmit="return confirm('Are you sure?');" action="{{ route('device.destroy', $model->id) }}" method="POST"
        class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm  btn-danger"><i class="mdi mdi-trash-can-outline"></i> </button>
    </form>
    @endcan
</td>
