<td>
    @can('ticket_detail')
    <button type="button" class="btn btn-warning btn-sm identifyingClass" data-bs-toggle="modal"
    data-bs-target="#exampleModallview{{ $model->id }}">
    <i class="mdi mdi-eye"></i>
    </button>
    <div class="modal fade" id="exampleModallview{{ $model->id }}" tabindex="-1" aria-labelledby="exampleModallview"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log Ticket</h5>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table display dataTable no-footer table-xs dataTables-example" id=""
                            width="100%">
                            <thead>
                                <tr>
                                    <th>{{ __('Subject') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Created At') }}</th>
                                    <th>{{ __('Updated At') }}</th>
                                </tr>
                            </thead>
                            @php
                                $ticket_logs = DB::table('ticket_logs')
                                    ->where('ticket_id', '=', $model->id)
                                    ->orderBy('id', 'DESC')
                                    ->limit(10)
                                    ->get();
                            @endphp
                            <tbody>
                                @foreach ($ticket_logs as $row)
                                    <tr>
                                        <td>{{ $row->subject }}</td>
                                        <td>
                                            @foreach (json_decode($row->description) as $value)
                                                <li>{{ $value }}</li>
                                            @endforeach
                                        </td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>{{ $row->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    @endcan
    @can('ticket_update')
    <a href="{{ route('tickets.edit', $model->id) }}" class="btn btn-sm  btn-success"><i class="mdi mdi-pencil"></i> </a>
    @endcan
    @can('ticket_delete')
    <form onsubmit="return confirm('Are you sure?');" action="{{ route('tickets.destroy', $model->id) }}" method="POST"
        class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm  btn-danger"><i class="mdi mdi-trash-can-outline"></i> </button>
    </form>
    @endcan
</td>

<script>
    $('.dataTables-example').DataTable();
</script>
