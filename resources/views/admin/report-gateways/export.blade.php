<table>
    <thead>
        <tr>
            <th style="background-color:#D3D3D3 ">{{ __('Gwid') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Status Online') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Pktfwd Status') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Connection Type') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Created At') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
            <tr>
                <td>{{ getGwid($dt->gateway_id)->gwid }}</td>
                @if ($dt->status_online == 1 || $dt->status_online == '1')
                    <td>Online</td>
                @else
                    <td>Offline</td>
                @endif

                @if ($dt->pktfwd_status == 1 || $dt->pktfwd_status == '1')
                    <td>Online</td>
                @else
                    <td>Offline</td>
                @endif
                <td>MQTT</td>
                <td>{{ $dt->created_at->format('d M Y H:i:s') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
