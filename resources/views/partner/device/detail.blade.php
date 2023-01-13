@extends('layouts.master_partner')
@section('title', 'Detail Device')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Device</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('device.index') }}">Device</a></li>
                                <li class="breadcrumb-item active">Detail</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td>App ID</td>
                                    <td style="width:1px">:</td>
                                    <td>{{ $device->appID }}</td>
                                </tr>
                                <tr>
                                    <td>Instance</td>
                                    <td>:</td>
                                    <td>{{ $device->instance->instance_name }}</td>
                                </tr>
                                <tr>
                                    <td>Cluster</td>
                                    <td>:</td>
                                    <td>{{ $device->cluster ? $device->cluster->name : '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Device Category</td>
                                    <td>:</td>
                                    <td>{{ $device->category }}</td>
                                </tr>
                                <tr>
                                    <td>Dev EUI</td>
                                    <td>:</td>
                                    <td>{{ $device->devEUI }}</td>
                                </tr>
                                <tr>
                                    <td>App EUI</td>
                                    <td>:</td>
                                    <td>{{ $device->appEUI }}</td>
                                </tr>
                                <tr>
                                    <td>Dev Name</td>
                                    <td>:</td>
                                    <td>{{ $device->devName }}</td>
                                </tr>
                                <tr>
                                    <td>Dev Type</td>
                                    <td>:</td>
                                    <td>{{ $device->devType ? $device->devType : '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Dev Address</td>
                                    <td>:</td>
                                    <td>{{ $device->devAddr ? $device->devAddr : '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Region</td>
                                    <td>:</td>
                                    <td>{{ $device->region }}</td>
                                </tr>
                                <tr>
                                    <td>Subnet</td>
                                    <td>:</td>
                                    <td>{{ $device->devType ? $device->subnet->subnet : '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Auth Type</td>
                                    <td>:</td>
                                    <td>{{ $device->authType }}</td>
                                </tr>
                                <tr>
                                    <td>Support Class B</td>
                                    <td>:</td>
                                    <td>{{ $device->supportClassB }}</td>
                                </tr>
                                <tr>
                                    <td>Support Class C</td>
                                    <td>:</td>
                                    <td>{{ $device->supportClassC }}</td>
                                </tr>
                                <tr>
                                    <td>App Key</td>
                                    <td>:</td>
                                    <td>{{ $device->appKey }}</td>
                                </tr>
                                <tr>
                                    <td>App Skey</td>
                                    <td>:</td>
                                    <td>{{ $device->appSkey ? $device->appSkey : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mac Version</td>
                                    <td>:</td>
                                    <td>{{ $device->macVersion }}</td>
                                </tr>
                                <tr>
                                    <td>Device Password</td>
                                    <td>:</td>
                                    <td>{{ $device->password_device ? $device->password_device : '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>:</td>
                                    <td>{{ $device->created_at }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('instances.device.index') }}" class="btn btn-warning"><i
                                                class="mdi mdi-arrow-left-thin"></i> Back</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
