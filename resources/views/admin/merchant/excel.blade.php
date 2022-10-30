<table class="table table-bordered" id="dataTable" style="width:100%">
    <thead>
        <tr>
            <th>ID Merchant</th>
            <th>MID</th>
            <th>Merchant Name</th>
            <th>Email</th>
            <th>Merchant Type</th>
            <th>Merchant Category</th>
            <th>Phone</th>
            <th>Bussiness</th>
            <th>Province</th>
            <th>City / Districts</th>
            <th>Sub District</th>
            <th>Village</th>
            <th>Zip Code</th>
            <th>Address 1</th>
            <th>Address 2</th>
            <th>Bank</th>
            <th>Number Account</th>
            <th>Account Name</th>
            <th>Rek Pooling Code</th>
            <th>MDR</th>
            <th>Approved 1</th>
            <th>Approved 2</th>
            <th>Created at</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($merchants as $merchant)
        <tr>
            <td>{{ $merchant->id }}</td>
            <td>{{ $merchant->mid ? $merchant->mid : '-'}}</td>
            <td>{{ $merchant->merchant_name }}</td>
            <td>{{ $merchant->email }}</td>
            <td>{{ ucwords($merchant->type) }}</td>
            <td>{{ $merchant->merchant_category ? $merchant->merchant_category->merchants_category_name : '-' }}</td>
            <td>{{ $merchant->phone }}</td>
            <td>{{ $merchant->bussiness ? $merchant->bussiness->bussiness_name : '-' }}</td>
            <td>{{ $merchant->province->provinsi }}</td>
            <td>{{ $merchant->kabkot->kabupaten_kota }}</td>
            <td>{{ $merchant->kecamatan->kecamatan }}</td>
            <td>{{ $merchant->kelurahan->kelurahan }}</td>
            <td>{{ $merchant->zip_code }}</td>
            <td>{{ $merchant->address1 }}</td>
            <td>{{ $merchant->address2 }}</td>
            <td>{{ $merchant->bank ? $merchant->bank->bank_name : '-' }}</td>
            <td>{{ $merchant->number_account }}</td>
            <td>{{ $merchant->account_name }}</td>
            <td>{{ $merchant->rek_pooling ? $merchant->rek_pooling->rek_pooling_code : '-' }}</td>
            <td>{{ $merchant->mdr }} %</td>
            <td>
                @if ($merchant->approved1 == 'approved')
                Approved
                @elseif ($merchant->approved1 == 'need_approved')
                Need Approved
                @elseif ($merchant->approved1 == 'rejected')
                Rejected
                @endif
            </td>
            <td>
                @if ($merchant->approved2 == 'approved')
                Approved
                @elseif ($merchant->approved2 == 'need_approved')
                Need Approved
                @elseif ($merchant->approved2 == 'rejected')
                Rejected
                @endif
            </td>
            <td>{{ date('d F Y H:i:s', strtotime($merchant->created_at)) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
