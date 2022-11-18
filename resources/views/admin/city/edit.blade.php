@extends('layouts.master')
@section('title', 'Edit Province')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Province</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('province.index') }}">Province</a></li>
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
                        <form action="{{ route('city.update', $city->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="provinsi_id">Provinsi</label>
                                <select name="provinsi_id" id="provinsi_id" class="form-control">
                                    @foreach ($provinsi as $v)
                                        <option value="{{ $v->id }}" {{ $v->id == $city->ibukota  ? 'selected' : '' }}>{{ $v->provinsi }}</option>
                                    @endforeach
                                </select>
                                @error('provinsi_id')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kabupaten_kota">kabupaten_kota</label>
                                <input type="text" class="form-control @error('kabupaten_kota') is-invalid @enderror" name="kabupaten_kota" id="kabupaten_kota" placeholder="" value="{{ old('kabupaten_kota') ? old('kabupaten_kota') : $city->kabupaten_kota }}" autocomplete="off">
                                @error('kabupaten_kota')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="ibukota">Ibukota</label>
                                <input type="text" class="form-control @error('ibukota') is-invalid @enderror" name="ibukota" id="ibukota" placeholder="" value="{{ old('ibukota') ? old('ibukota') : $city->ibukota }}" autocomplete="off">
                                @error('ibukota')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{ route('city.index') }}" class="btn btn-warning"><i class="mdi mdi-arrow-left-thin"></i> Back</a>
                                <button type="submit" class="btn btn-primary" ><i class="mdi mdi-content-save"></i> UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
