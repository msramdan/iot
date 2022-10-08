<td >
    @can('merchant_update')
    {{-- <a href="{{ route('merchant.show', $model->id) }}" class="btn  btn-success"><i class="mdi mdi-pencil"></i> Detail </a> --}}
    <a href="{{ route('merchant.edit', $model->id) }}" class="btn btn-md  btn-warning"><i class="mdi mdi-pencil"></i> Edit </a>
    @endcan
    @can('merchant_delete')
    <form onsubmit="return confirm('Are you sure?');" action="{{ route('merchant.destroy', $model->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-md  btn-danger"><i class="mdi mdi-trash-can-outline"></i> Delete </button>
    </form>
    @endcan
    <div class="btn-group">
        <button type="button" class="btn btn-md btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-cog"></i> Other</button>
        <div class="dropdown-menu" style="">
            <a class="dropdown-item" href="#">Detail</a>
            <a class="dropdown-item" href="#">Approved Log</a>
            <a class="dropdown-item" href="#">Mdr Log</a>
        </div>
    </div>
</td>
