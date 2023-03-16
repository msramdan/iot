<table>
    <thead>
        <tr>
            <th style="background-color:#D3D3D3 ">{{ __('Dev Eui') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('App Id') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Gateway') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Class') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Type') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Freq') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Fport') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Fcnt') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Rssi') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Snr') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Dr') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Adr') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Base64') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Base64 To Hex') }}</th>
            <th style="background-color:#D3D3D3 ">{{ __('Date') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
            <tr>
                <td>{{ $dt->dev_eui }}</td>
                <td>{{ $dt->app_id }}</td>
                <td>{{ $dt->gwid }}</td>
                <td>{{ $dt->class }}</td>
                <td>{{ $dt->type }}</td>
                <td>{{ $dt->freq }}</td>
                <td>{{ $dt->fport }}</td>
                <td>{{ $dt->fcnt }}</td>
                <td>{{ $dt->rssi }}</td>
                <td>{{ $dt->snr }}</td>
                <td>{{ $dt->dr }}</td>
                @if ($dt->adr == 1 || $dt->adr == '1')
                    <td>True</td>
                @else
                    <td>-</td>
                @endif
                <td>{{ $dt->data }}</td>
                <td>{{ $dt->convert }}</td>
                <td>{{ $dt->created_at->format('d M Y H:i:s') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
