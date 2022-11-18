@extends('layouts.master')
@section('title', 'Edit Kecamatan')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Kecamatan</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('district.index') }}">Kecamatan</a></li>
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
                        <form action="{{ route('district.update', $district->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="kabkot_id">Provinsi</label>
                                <select name="kabkot_id" id="kabkot_id" class="form-control">
                                    @foreach ($kabkot as $v)
                                    <option value="{{ $v->id }}" {{ $v->id == $district->ibukota ? 'selected' : '' }}>{{ $v->kabupaten_kota }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kecamatan">kecamatan</label>
                                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan" placeholder="" value="{{ old('kecamatan') ? old('kecamatan') : $district->kecamatan }}" autocomplete="off">
                                @error('kecamatan')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{ route('district.index') }}" class="btn btn-warning"><i class="mdi mdi-arrow-left-thin"></i> Back</a>
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
