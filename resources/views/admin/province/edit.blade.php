@extends('layouts.master')
@section('title', 'Edit Provinsi')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Provinsi</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('province.index') }}">Provinsi</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">
                            <form action="{{ route('province.update', $province->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" class="form-control @error('provinsi') is-invalid @enderror"
                                        name="provinsi" id="provinsi" placeholder=""
                                        value="{{ old('provinsi') ? old('provinsi') : $province->provinsi }}"
                                        autocomplete="off">
                                    @error('provinsi')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ibukota">Ibukota</label>
                                    <input type="text" class="form-control @error('ibukota') is-invalid @enderror"
                                        name="ibukota" id="ibukota" placeholder=""
                                        value="{{ old('ibukota') ? old('ibukota') : $province->ibukota }}"
                                        autocomplete="off">
                                    @error('ibukota')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('province.index') }}" class="btn btn-warning"><i
                                            class="mdi mdi-arrow-left-thin"></i> Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i>
                                        UPDATE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
