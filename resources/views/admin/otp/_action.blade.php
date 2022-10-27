<td>
    @can('otp_update')
    <a href="{{ route('otp.edit', $model->id) }}" class="btn btn-md btn-sm  btn-warning"><i
            class="mdi mdi-pencil"></i> </a>
    @endcan
    @can('otp_delete')
    <form onsubmit="return confirm('Are you sure?');" action="{{ route('otp.destroy', $model->id) }}" method="POST"
        class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-md btn-sm  btn-danger"><i class="mdi mdi-trash-can-outline"></i> </button>
    </form>
    @endcan
</td>