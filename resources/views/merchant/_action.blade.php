<td >
    @can('merchant_update')
    <a href="{{ route('merchant.edit', $model->id) }}" class="btn btn-md btn-sm  btn-warning"><i class="mdi mdi-pencil"></i>  </a>
    @endcan
    @can('merchant_delete')
    <form onsubmit="return confirm('Are you sure?');" action="{{ route('merchant.destroy', $model->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-md btn-sm  btn-danger"><i class="mdi mdi-trash-can-outline"></i>  </button>
    </form>
    @endcan
    <div class="btn-group">
        <button type="button" title="Other" class="btn btn-md btn-success btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-cog"></i> </button>
        <div class="dropdown-menu" style="">
            <button class="dropdown-item" onclick="detail('{{ $model->id }}')">Detail</button>
            <a class="dropdown-item" href="#">Approved Log</a>
            <a class="dropdown-item" href="#">Mdr Log</a>
        </div>
    </div>
</td>
