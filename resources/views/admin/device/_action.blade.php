<td>
    @can('device_sign')
    <button class="btn btn-sm btn-warning" onclick="onSign('{{ $model->id }}')" title="Sign Cluster"><i class="mdi mdi-cog"></i>
    </button>
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
                <input type="hidden" name="device_id" value="{{ $model->id }}">
                <div class="form-group">
                    <label for="">Cluster</label>
                    <select name="cluster_id" id="cluster" class="form-control">
                        <option value="">--Select Cluster--</option>
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
    function onSign(deviceID) {
        $.ajax({
            type:'POST',
            url : "{{ route('device.get_cluster') }}",
            data: {
                device_id: deviceID,
            },
            success:function(results) {
                let option = '';
                for (let i = 0; i < results.length; i++) {
                    option += `<option value="${results[i].id}">${results[i].name}</option>`
                }

                $("#cluster").append(option);
                $('#cluster').select2();
                var myModal = new bootstrap.Modal(document.getElementById('modalCluster'), {
                    keyboard: false
                })

                myModal.toggle()
            }
        })
    }
</script>
