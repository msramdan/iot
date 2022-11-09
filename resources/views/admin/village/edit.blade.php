@extends('layouts.master')
@section('title', 'Edit Kelurahan')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Kelurahan</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('village.index') }}">Kelurahan</a></li>
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
                        <form action="{{ route('village.update', $village->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="kecamatan_id">Kabupaten / Kota</label>
                                <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                                    <option value="" {{ old('kecamatan_id') ? '' :'selected' }} disabled>--PILIH--</option>
                                    @foreach ($kecamatan as $v)
                                    <option value="{{ $v->id }}" {{ $v->id == $village->kecamatan_id ? 'selected' : '' }}>{{ $v->kecamatan }}</option>
                                    @endforeach
                                </select>
                                @error('kecamatan_id')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kelurahan">Kelurahan</label>
                                <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan" id="kelurahan" placeholder="" value="{{ old('kelurahan') ? old('kelurahan') : $village->kelurahan }}" autocomplete="off">
                                @error('kelurahan')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{ route('village.index') }}" class="btn btn-warning"><i class="mdi mdi-arrow-left-thin"></i> Back</a>
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
