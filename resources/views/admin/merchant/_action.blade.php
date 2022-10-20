{{-- modal mdr Log --}}

<div id="myModalMdr" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">MDR Log</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body" id="modal-table-mdr">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="myModalApp" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Approved Log</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body" id="modal-table-app">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<td>
    @can('merchant_update')
    <a href="{{ route('merchant.edit', $model->id) }}" class="btn btn-md btn-sm  btn-warning"><i
            class="mdi mdi-pencil"></i> </a>
    @endcan
    @can('merchant_delete')
    <form onsubmit="return confirm('Are you sure?');" action="{{ route('merchant.destroy', $model->id) }}" method="POST"
        class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-md btn-sm  btn-danger"><i class="mdi mdi-trash-can-outline"></i> </button>
    </form>
    @endcan
    <div class="btn-group">
        <button type="button" title="Other" class="btn btn-md btn-success btn-sm dropdown-toggle"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-cog"></i> </button>
        <div class="dropdown-menu" style="">
            <a href="{{ route('merchant.show', $model->id) }}" class="dropdown-item">Detail</a>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#myModalApp" id="DetailLogApp"
                data-id="{{ $model->id }}">Approved Log</a>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#myModalMdr" id="DetailLogMdr"
                data-id="{{ $model->id }}">Mdr Log</a>
        </div>
    </div>
</td>


<script type="text/javascript">
    $(document).on('click', '#DetailLogMdr', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '/panel/getDetailMdr/' + id,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            data: {},
            success: function(html) {
                $("#modal-table-mdr").html(html);
            }
        });


    })

    $(document).on('click', '#DetailLogApp', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '/panel/getDetailApp/' + id,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            data: {},
            success: function(html) {
                $("#modal-table-app").html(html);
            }
        });


    })
</script>
