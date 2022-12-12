@extends('layouts.master')
@section('title', 'Edit Device')

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
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <form action="{{ route('device.update', $device->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="category">Category Device</label>
                                <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" readonly>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="Water Meter" {{  (old('category') == 'Water Meter' || $device->category == 'Water Meter') ? 'selected' : '' }} >Water Meter</option>
                                    <option value="Power Meter" {{  (old('category') == 'Power Meter' || $device->category == 'Power Meter') ? 'selected' : '' }} >Power Meter</option>
                                    <option value="Gas Meter" {{  (old('category') == 'Gas Meter' || $device->category == 'Gas Meter') ? 'selected' : '' }} >Gas Meter</option>
                                </select>
                                @error('category')
                                    {{-- <span style="color:#f06548;font-size: .875em;margin-top: 0.25rem;">{{ $message }}</span> --}}
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="appID">App ID</label>
                                <input type="text" name="appID" id="appID" value="{{ old('appID') ?? $device->appID }}"
                                    class="form-control @error('appID') is-invalid @enderror " readonly>
                                @error('appID')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="appEUI">App EUI</label>
                                <input type="text" name="appEUI" id="appEUI" value="{{ old('appEUI') ?? $device->appEUI }}"
                                    class="form-control @error('appEUI') is-invalid @enderror " readonly>
                                @error('appEUI')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="devType">Dev Type</label>
                                <select name="devType" id="devType" class="form-control" @error('devType') @enderror readonly>
                                    <option value="" selected disabled>==Pilih==</option>
                                    <option value="abp-type" @selected((old('devType') ?? $device->devType) == "abp-type")>Abp</option>
                                    <option value="otaa-type" @selected((old('devType') ?? $device->devType) == "otaa-type")>Otaa</option>
                                </select>
                                @error('devType')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="devName">Dev Name</label>
                                <input type="text" name="devName" id="devName" value="{{ old('devName') ?? $device->devName }}"
                                    class="form-control @error('devName') is-invalid @enderror ">
                                @error('devName')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="devEUI">Dev EUI</label>
                                <input type="text" name="devEUI" id="devEUI" value="{{ old('devEUI') ?? $device->devEUI }}"
                                    class="form-control @error('devEUI') is-invalid @enderror " readonly>
                                @error('devEUI')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="region">Region</label>
                                <input type="text" name="region" id="region" value="{{ old('region') ?? $device->region }}"
                                    class="form-control @error('region') is-invalid @enderror " readonly>
                                @error('region')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="subnet">Subnet</label>
                                <select name="subnet_id" id="subnet" class="form-control" @error('subnet') @enderror readonly>
                                    <option value="" selected disabled>==Pilih==</option>
                                    @foreach ($subnets as $subnet)
                                        <option value="{{ $subnet->id }}" @selected((old('subnet_id') ?? $device->subnet_id) == $subnet->id)>{{ $subnet->subnet }}</option>
                                    @endforeach
                                </select>
                                @error('subnet')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                               <label for="supportClassB">Support Class B</label>
                               <select name="supportClassB" id="supportClassB" class="form-control" @error('supportClassB') @enderror readonly>
                                    <option value="" selected disabled>==Pilih==</option>
                                    <option value="true" @selected((old('supportClassB') ?? $device->supportClassB) == true)>True</option>
                                    <option value="false"@selected((old('supportClassB') ?? $device->supportClassB) == false)>False</option>
                                </select>
                                @error('supportClassB')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                               <label for="supportClassC">Support Class C</label>
                               <select name="supportClassC" id="supportClassC" class="form-control" @error('supportClassC') @enderror readonly>
                                    <option value="" selected disabled>==Pilih==</option>
                                    <option value="true" @selected((old('supportClassC') ?? $device->supportClassC) == true)>True</option>
                                    <option value="false" @selected((old('supportClassC') ?? $device->supportClassC) == false)>False</option>
                                </select>
                                @error('supportClassC')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="macVersion">Mac Version</label>
                                <input type="text" name="macVersion" id="macVersion" value="{{ old('macVersion') ?? $device->macVersion }}"
                                    class="form-control @error('macVersion') is-invalid @enderror " readonly>
                                @error('macVersion')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="appKey">App Key</label>
                                <input type="text" name="appKey" id="appKey" value="{{ old('appKey') ?? $device->appKey }}"
                                    class="form-control @error('appKey') is-invalid @enderror " readonly>
                                @error('appKey')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="authType">Auth Type</label>
                                <select name="authType" id="authType" class="form-control" @error('authType') @enderror readonly>
                                    <option value="" selected disabled>==Pilih==</option>
                                    <option value="abp" @selected((old('authType') ?? $device->authType) == 'abp')>Abp</option>
                                    <option value="otaa" @selected((old('authType') ?? $device->authType) == 'otaa')>Otaa</option>
                                </select>
                                @error('authType')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row" id="type-condition">
                        @if (old('authType') == 'abp' || $device->authType == 'abp')
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="appSKey">App SKey</label>
                                    <input type="text" name="appSKey" id="appSKey" value="{{ old('appSKey') ?? $device->appSKey }}"
                                        class="form-control @error('appSKey') is-invalid @enderror " readonly>
                                    @error('appSKey')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="nwkSKey">NWK SKEY</label>
                                    <input type="text" name="nwkSKey" id="nwkSKey" value="{{ old('nwkSKey') ?? $device->nwkSKey }}"
                                        class="form-control @error('nwkSKey') is-invalid @enderror " readonly>
                                    @error('nwkSKey')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="devAddr">Dev Addr</label>
                                    <input type="text" name="devAddr" id="devAddr" value="{{ old('devAddr') ?? $device->devAddr }}"
                                        class="form-control @error('devAddr') is-invalid @enderror " readonly>
                                    @error('devAddr')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="text-end">
                        <a href="{{ route('device.index') }}" class="btn btn-warning"><i class="mdi mdi-arrow-left-thin"></i> Back</a>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> SIMPAN</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection

@push('js')
    <script>
        const html = `<div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="appSKey">App SKey</label>
                <input type="text" name="appSKey" id="appSKey" value="{{ old('appSKey') }}"
                    class="form-control @error('appSKey') is-invalid @enderror ">
                @error('appSKey')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="nwkSKey">NWK SKEY</label>
                <input type="text" name="nwkSKey" id="nwkSKey" value="{{ old('nwkSKey') }}"
                    class="form-control @error('nwkSKey') is-invalid @enderror ">
                @error('nwkSKey')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <label for="devAddr">Dev Addr</label>
                <input type="text" name="devAddr" id="devAddr" value="{{ old('devAddr') }}"
                    class="form-control @error('devAddr') is-invalid @enderror ">
                @error('devAddr')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>`;

        $('#authType').change(function(){
            if(this.value == 'abp'){
                $('#type-condition').html(html)
            }else{
                $('#type-condition').html('')
            }
        })


    </script>
@endpush
