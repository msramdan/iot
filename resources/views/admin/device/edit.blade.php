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
                            <input type="hidden" name="category" id="category" value="{{ $device->category }}"
                                class="form-control" readonly>

                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="devEUI">Dev EUI</label>
                                    <input type="text" name="devEUI" id="devEUI"
                                        value="{{ old('devEUI') ?? $device->devEUI }}"
                                        class="form-control @error('devEUI') is-invalid @enderror " readonly>
                                    @error('devEUI')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="devName">Dev Name</label>
                                    <input type="text" name="devName" id="devName"
                                        value="{{ old('devName') ?? $device->devName }}"
                                        class="form-control @error('devName') is-invalid @enderror ">
                                    @error('devName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @if ($device->category == 'Power Meter')
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label for="authType">Device Password </label>
                                        <input type="text" name="password_device" id="password_device"
                                            value="{{ old('password_device') ? old('password_device') : $device->password_device }}"
                                            class="form-control @error('password_device') is-invalid @enderror ">
                                        @error('password_device')
                                            <div class="invalid-feedback" id="note">{{ $message }}</div>
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
