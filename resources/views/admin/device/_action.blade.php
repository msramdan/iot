<td>
    @can('device_sign')
        <button class="btn btn-sm btn-warning open-dialog" data-device_id="{{ $model->id }}"
            onclick="onSign('{{ $model->id }}')" title="Sign Cluster"><i class="mdi mdi-file-sign"></i>
        </button>
    @endcan

    @canany(['device_delete', 'device_update'])
        <div class="btn-group">
            <button type="button" title="Other" class="btn btn-md btn-success btn-sm dropdown-toggle"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-cog"></i> </button>
            <div class="dropdown-menu" style="">
                <a href="{{ route('device.show', $model->id) }}" class="dropdown-item">Detail</a>
                @can('device_delete')
                    <a href="{{ route('device.edit', $model->id) }}" class="dropdown-item">Edit</a>
                @endcan
                @can('device_delete')
                    <form class="dropdown-item" onsubmit="return confirm('Are you sure?');"
                        action="{{ route('device.destroy', $model->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            Delete</button>
                    </form>
                @endcan
            </div>
        </div>
    @endcanany
</td>

<div class="modal fade" tabindex="-1" id="modalCluster">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sign Cluster</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('device.sign_cluster') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="device_id" id="device_id" value="{{ $model->id }}">
                    <div class="form-group">
                        <label for="">Cluster</label>
                        <select name="cluster_id" id="cluster" class="form-control" required>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" onclick="form()" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).on("click", ".open-dialog", function() {
        var myBookId = $(this).data('device_id');
        $(".modal-body #device_id").val(myBookId);
    });


    function onSign(deviceID) {
        $.ajax({
            type: 'POST',
            url: "{{ route('device.get_cluster') }}",
            data: {
                device_id: deviceID,
            },
            success: function(results) {
                let option = '<option value="">--Select Cluster--</option>';
                for (let i = 0; i < results.length; i++) {
                    option += `<option value="${results[i].id}">${results[i].name}</option>`
                }
                $("#cluster").empty();
                $("#cluster").append(option);
                // $('#cluster').select2();
                var myModal = new bootstrap.Modal(document.getElementById('modalCluster'), {
                    keyboard: false
                })

                myModal.toggle()
            }
        })
    }
</script>
