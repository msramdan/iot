<td>
    @if ($model->is_device == 1)
        <button type="button" class="btn btn-sm  btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal_log">
            <i class="mdi mdi-math-log"></i>
        </button>
        <div class="modal fade" id="exampleModal_log" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Log Ticket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-xs example_log" width="100%">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @can('ticket_update')
        <a href="{{ route('tickets.edit', $model->id) }}" class="btn btn-sm  btn-success"><i class="mdi mdi-pencil"></i>
        </a>
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
