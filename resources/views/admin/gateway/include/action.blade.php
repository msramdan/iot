<td>
    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
        data-bs-target="#exampleModal{{ $model->id }}">
        <i class="mdi mdi-eye"></i>
    </button>
    <div class="modal fade" id="exampleModal{{ $model->id }}" tabindex="-1" aria-labelledby="exampleModallview"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log Gateway</h5>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table display dataTable no-footer table-xs dataTables-example" id=""
                            width="100%">
                            <thead>
                                <tr>
                                    <th>{{ __('Gwid') }}</th>
                                    <th>{{ __('Status Online') }}</th>
                                    <th>{{ __('Pktfwd Status') }}</th>
                                    <th>{{ __('Connection Type') }}</th>
                                    <th>{{ __('Created At') }}</th>
                                </tr>
                            </thead>
                            @php
                                $gateway_logs = DB::table('gateway_logs')
                                    ->where('gateway_id', '=', $model->id)
                                    ->orderBy('id', 'DESC')
                                    ->limit(100)
                                    ->get();
                            @endphp
                            <tbody>
                                @foreach ($gateway_logs as $row)
                                    <tr>
                                        <td>{{ $model->gwid }}</td>
                                        <td>
                                            @if ($row->status_online == 1)
                                                <button class="btn btn-pill btn-primary btn-air-primary btn-xs"
                                                    type="button"
                                                    title="btn btn-pill btn-primary btn-air-primary btn-xs">Online</button>
                                            @else
                                                <button class="btn btn-pill btn-danger btn-air-danger btn-xs"
                                                    type="button"
                                                    title="btn btn-pill btn-danger btn-air-danger btn-xs">Offline</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->pktfwd_status == 1)
                                                <button class="btn btn-pill btn-primary btn-air-primary btn-xs"
                                                    type="button"
                                                    title="btn btn-pill btn-primary btn-air-primary btn-xs">Online</button>
                                            @else
                                                <button class="btn btn-pill btn-danger btn-air-danger btn-xs"
                                                    type="button"
                                                    title="btn btn-pill btn-danger btn-air-danger btn-xs">Offline</button>
                                            @endif
                                        </td>
                                        <td>MQTT</td>
                                        <td>{{ $row->created_at }}</td>
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
</td>
<script>
    $('.dataTables-example').DataTable();
</script>
