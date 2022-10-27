<td>
    <a href="{{ route('merchant.optime.edit', [$model->merchant_id, $model->id]) }}" class="btn btn-md btn-sm  btn-warning"><i
            class="mdi mdi-pencil"></i> </a>
    <form onsubmit="return confirm('Are you sure?');" action="{{ route('merchant.optime.destroy', [$model->merchant_id, $model->id]) }}" method="POST"
        class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-md btn-sm  btn-danger"><i class="mdi mdi-trash-can-outline"></i></button>
    </form>
</td>