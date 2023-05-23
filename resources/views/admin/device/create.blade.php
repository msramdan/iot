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
                                    <label for="hit_nms">Hit Nms</label>
                                    <select name="hit_nms" id="hit_nms"
                                        class="form-control @error('hit_nms') is-invalid @enderror">
                                        <option value="Y" @selected(old('hit_nms') == 'Y')>Yes</option>
                                        <option value="N" @selected(old('hit_nms') == 'N')>No</option>
                                    </select>
                                    @error('hit_nms')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="kategori">Device Category</label>
                                    <select name="category" id="category"
                                        class="form-control @error('category') is-invalid @enderror">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="Water Meter"
                                            {{ old('category') == 'Water Meter' ? 'selected' : '' }}>Water Meter</option>
                                        <option value="Power Meter"
                                            {{ old('category') == 'Power Meter' ? 'selected' : '' }}>Power Meter</option>
                                        <option value="Gas Meter" {{ old('category') == 'Gas Meter' ? 'selected' : '' }}>Gas
                                            Meter</option>
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
                                    <select name="appID" id="appID"
                                        class="form-control @error('appID') is-invalid @enderror">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        @foreach ($appID as $data)
                                            <option value="{{ $data->appID }}" @selected(old('appID') == $data->appID)>
                                                {{ $data->appID }} - {{ $data->instance_name }} </option>
                                        @endforeach
                                    </select>
                                    @error('appID')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-12 col-md-4" id="form_appEUI">
                                <div class="mb-3">
                                    <label for="appEUI">App EUI</label>
                                    <input type="text" name="appEUI" id="appEUI" value="{{ old('appEUI') }}"
                                        class="form-control @error('appEUI') is-invalid @enderror ">
                                    @error('appEUI')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4" id="form_devType">
                                <div class="mb-3">
                                    <label for="devType">Dev Type</label>
                                    <select name="devType" id="devType"
                                        class="form-control @error('devType') is-invalid @enderror">
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
                            <div class="col-12 col-md-4" id="form_region">
                                <div class="mb-3">
                                    <label for="region">Region</label>
                                    <input type="text" name="region" id="region" value="{{ old('region') }}"
                                        class="form-control @error('region') is-invalid @enderror ">
                                    @error('region')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4" id="form_subnet_id">
                                <div class="mb-3">
                                    <label for="subnet_id">Subnet</label>
                                    <select name="subnet_id" id="subnet_id"
                                        class="form-control @error('subnet_id') is-invalid @enderror">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        @foreach ($subnets as $subnet)
                                            <option value="{{ $subnet->id }}" @selected(old('subnet_id') == $subnet->id)>
                                                {{ $subnet->subnet }}</option>
                                        @endforeach
                                    </select>
                                    @error('subnet_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4" id="form_supportClassB">
                                <div class="mb-3">
                                    <label for="supportClassB">Support Class B</label>
                                    <select name="supportClassB" id="supportClassB"
                                        class="form-control @error('supportClassB') is-invalid @enderror">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="true" {{ old('supportClassB') == 'true' ? 'selected' : '' }}>True
                                        </option>
                                        <option value="false" {{ old('supportClassB') == 'false' ? 'selected' : '' }}>
                                            False</option>
                                    </select>
                                    @error('supportClassB')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4" id="form_supportClassC">
                                <div class="mb-3">
                                    <label for="supportClassC">Support Class C</label>
                                    <select name="supportClassC" id="supportClassC"
                                        class="form-control @error('supportClassC') is-invalid @enderror">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="true" {{ old('supportClassC') == 'true' ? 'selected' : '' }}>True
                                        </option>
                                        <option value="false" {{ old('supportClassC') == 'false' ? 'selected' : '' }}>
                                            False</option>
                                    </select>
                                    @error('supportClassC')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="appKey">App Key</label>
                                    <input type="text" name="appKey" id="appKey" value="{{ old('appKey') }}"
                                        class="form-control @error('appKey') is-invalid @enderror ">
                                    @error('appKey')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4" id="form_authType">
                                <div class="mb-3">
                                    <label for="authType">Auth Type</label>
                                    <select name="authType" id="authType"
                                        class="form-control @error('authType') is-invalid @enderror">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="abp" @selected(old('authType') == 'abp')>Abp</option>
                                        <option value="otaa" @selected(old('authType') == 'otaa')>Otaa</option>
                                    </select>
                                    @error('authType')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4" id="info_password">
                                <div class="mb-3">
                                    <label for="authType">Device Password </label>
                                    <p><span style="color: red;">Note : Available if the device category is a Power
                                            Meter</span></p>

                                    @if (old('category') == 'Power Meter')
                                        <input type="text" name="password_device" id="password_device"
                                            value="{{ old('password_device') }}"
                                            class="form-control @error('password_device') is-invalid @enderror ">
                                    @endif
                                    <input style="display: none" type="text" name="password_device"
                                        id="password_device"
                                        value="{{ old('password_device') ? old('password_device') : '04000000' }}"
                                        class="form-control @error('password_device') is-invalid @enderror ">
                                    @error('password_device')
                                        <div class="invalid-feedback" id="note">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row" id="type-condition">
                            @if (old('authType') == 'abp')
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label for="appSKey">App SKey</label>
                                        <input type="text" name="appSKey" id="appSKey"
                                            value="{{ old('appSKey') }}"
                                            class="form-control @error('appSKey') is-invalid @enderror ">
                                        @error('appSKey')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label for="nwkSKey">Nwk Skey</label>
                                        <input type="text" name="nwkSKey" id="nwkSKey"
                                            value="{{ old('nwkSKey') }}"
                                            class="form-control @error('nwkSKey') is-invalid @enderror ">
                                        @error('nwkSKey')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label for="devAddr">Dev Addr</label>
                                        <input type="text" name="devAddr" id="devAddr"
                                            value="{{ old('devAddr') }}"
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
                                        <input type="text" name="macVersion" id="macVersion"
                                            value="{{ old('macVersion') }}"
                                            class="form-control @error('macVersion') is-invalid @enderror ">
                                        @error('macVersion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="text-end">
                            <a href="{{ route('device.index') }}" class="btn btn-warning"><i
                                    class="mdi mdi-arrow-left-thin"></i> Back</a>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i>
                                SIMPAN</button>
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

        $(function() {
            $('#category').change(function() {
                if ($('#category').val() == 'Power Meter') {
                    $('#note').show();
                    $('#password_device').show();
                } else {
                    $('#note').hide();
                    $('#password_device').hide();
                }
            });
        });


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

        $('#devType').change(function() {
            if (this.value == 'abp-type') {
                $('#type-condition').html('')
                $('#type-condition').html(html)
                $('#authType').val('abp');
            } else {
                $('#type-condition').html('')
                $('#type-condition').html(html_otaa)
                $('#authType').val('otaa');
            }
        })

        $('#authType').change(function() {
            if (this.value == 'abp') {
                $('#type-condition').html('')
                $('#type-condition').html(html)
                $('#devType').val('abp-type');
            } else {
                $('#type-condition').html('')
                $('#type-condition').html(html_otaa)
                $('#devType').val('otaa-type');
            }
        })


        $(document).ready(function() {
            var value = $("#hit_nms").val();
            formInputan(value)
        });

        $('#hit_nms').change(function() {
            formInputan(this.value)
        })

        $('#myform :checkbox').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                // the checkbox is now checked
            } else {
                // the checkbox is now no longer checked
            }
        });


        function formInputan(value) {
            if (value == 'Y') {
                $('#form_appEUI').show();
                $('#form_devType').show();
                $('#form_region').show();
                $('#form_subnet_id').show();
                $('#form_supportClassB').show();
                $('#form_supportClassC').show();
                $('#form_authType').show();
                $('#info_password').show();
                $('#type-condition').html('')
                $("#category").val('');
                $('select[name="category"] option:not(:selected)').attr('disabled', false);
            } else {
                $('#form_appEUI').hide();
                $('#form_devType').hide();
                $('#form_region').hide();
                $('#form_subnet_id').hide();
                $('#form_supportClassB').hide();
                $('#form_supportClassC').hide();
                $('#form_authType').hide();
                $('#info_password').hide();
                $('#type-condition').html('')
                $("#category").val('Water Meter');
                $('select[name="category"] option:not(:selected)').attr('disabled', true);
            }
        }
    </script>
@endpush
