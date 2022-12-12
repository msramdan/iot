@extends('layouts.master')
@section('title', 'Create Device')

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
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <form action="{{ route('device.store') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="kategori">Category Device</label>
                                <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="Water Meter" {{  old('category') == 'Water Meter' ? 'selected' : '' }} >Water Meter</option>
                                    <option value="Power Meter" {{  old('category') == 'Power Meter' ? 'selected' : '' }} >Power Meter</option>
                                    <option value="Gas Meter" {{  old('category') == 'Gas Meter' ? 'selected' : '' }} >Gas Meter</option>
                                </select>
                                @error('category')
                                    {{-- <span style="color:#f06548;font-size: .875em;margin-top: 0.25rem;">{{ $message }}</span> --}}
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="appID">App ID</label>
                                <select name="appID" id="appID" class="form-control @error('appID') is-invalid @enderror">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    @foreach ($appID as $data)
                                        <option value="{{ $data->appID }}" @selected(old('appID') == $data->appID)>{{ $data->appID }} - {{ $data->instance_name }} </option>
                                    @endforeach
                                </select>
                                @error('appID')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="appEUI">App EUI</label>
                                <input type="text" name="appEUI" id="appEUI" value="{{ old('appEUI') }}"
                                    class="form-control @error('appEUI') is-invalid @enderror ">
                                @error('appEUI')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="devType">Dev Type</label>
                                <select name="devType" id="devType" class="form-control @error('devType') is-invalid @enderror">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="abp-type" @selected(old('devType') == 'abp-type')>Abp</option>
                                    <option value="otaa-type" @selected(old('devType') == 'otaa-type')>Otaa</option>
                                </select>
                                @error('devType')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="devName">Dev Name</label>
                                <input type="text" name="devName" id="devName" value="{{ old('devName') }}"
                                    class="form-control @error('devName') is-invalid @enderror ">
                                @error('devName')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="devEUI">Dev EUI</label>
                                <input type="text" name="devEUI" id="devEUI" value="{{ old('devEUI') }}"
                                    class="form-control @error('devEUI') is-invalid @enderror ">
                                @error('devEUI')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="region">Region</label>
                                <input type="text" name="region" id="region" value="{{ old('region') }}"
                                    class="form-control @error('region') is-invalid @enderror ">
                                @error('region')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="subnet_id">Subnet</label>
                                <select name="subnet_id" id="subnet_id" class="form-control @error('subnet_id') is-invalid @enderror" >
                                    <option value="" selected disabled>-- Pilih --</option>
                                    @foreach ($subnets as $subnet)
                                        <option value="{{ $subnet->id }}" @selected(old('subnet_id') == $subnet->id)>{{ $subnet->subnet }}</option>
                                    @endforeach
                                </select>
                                @error('subnet_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                               <label for="supportClassB">Support Class B</label>
                               <select name="supportClassB" id="supportClassB" class="form-control @error('supportClassB') is-invalid @enderror" >
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="true" {{  old('supportClassB') == 'true' ? 'selected' : '' }} >True</option>
                                    <option value="false" {{  old('supportClassB') == 'false' ? 'selected' : '' }} >False</option>
                                </select>
                                @error('supportClassB')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                               <label for="supportClassC">Support Class C</label>
                               <select name="supportClassC" id="supportClassC" class="form-control @error('supportClassC') is-invalid @enderror" >
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="true" {{  old('supportClassC') == 'true' ? 'selected' : '' }} >True</option>
                                    <option value="false" {{  old('supportClassC') == 'false' ? 'selected' : '' }} >False</option>
                                </select>
                                @error('supportClassC')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="appKey">App Key</label>
                                <input type="text" name="appKey" id="appKey" value="{{ old('appKey') }}"
                                    class="form-control @error('appKey') is-invalid @enderror ">
                                @error('appKey')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="authType">Auth Type</label>
                                <select name="authType" id="authType" class="form-control @error('authType') is-invalid @enderror" >
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="abp" @selected(old('authType') == 'abp')>Abp</option>
                                    <option value="otaa" @selected(old('authType') == 'otaa')>Otaa</option>
                                </select>
                                @error('authType')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row" id="type-condition">
                        @if (old('authType') == 'abp')
                            <div class="col-12 col-md-4">
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
                                    <label for="nwkSKey">Nwk Skey</label>
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
                            </div>
                        @elseif (old('authType') == 'otaa')
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="macVersion">Mac Version</label>
                                    <input type="text" name="macVersion" id="macVersion" value="{{ old('macVersion') }}"
                                        class="form-control @error('macVersion') is-invalid @enderror ">
                                    @error('macVersion')
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
        $('.selectClass').select2();

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

        const html_otaa = `<div class="col-12 col-md-4">
                            <div class="mb-3">
                                <label for="macVersion">Mac Version</label>
                                <input type="text" name="macVersion" id="macVersion" value="{{ old('macVersion') }}"
                                    class="form-control @error('macVersion') is-invalid @enderror ">
                                @error('macVersion')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>`;

        $('#devType').change(function(){
            if(this.value == 'abp-type'){
                $('#type-condition').html('')
                $('#type-condition').html(html)
                $('#authType').val('abp');
            }else{
                $('#type-condition').html('')
                $('#type-condition').html(html_otaa)
                $('#authType').val('otaa');
            }
        })

        $('#authType').change(function(){
            if(this.value == 'abp'){
                $('#type-condition').html('')
                $('#type-condition').html(html)
                $('#devType').val('abp-type');
            }else{
                $('#type-condition').html('')
                $('#type-condition').html(html_otaa)
                $('#devType').val('otaa-type');
            }
        })

    </script>
@endpush
