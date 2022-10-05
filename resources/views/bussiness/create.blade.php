@extends('layouts.master')
@section('title', 'Creat Bussiness')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Bussiness</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('bussiness.index') }}">Bussiness</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('bussiness.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="bussiness_name">Bussiness Code</label>
                                <input type="text" class="form-control @error('bussiness_code') is-invalid @enderror" name="bussiness_code" id="bussiness_code" placeholder="" value="{{ old('bussiness_code') }}" autocomplete="off">
                                @error('bussiness_code')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="bussiness_name">Bussiness Name</label>
                                <input type="text" class="form-control @error('bussiness_name') is-invalid @enderror" name="bussiness_name" id="bussiness_name" placeholder="" value="{{ old('bussiness_name') }}" autocomplete="off">
                                @error('bussiness_name')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{ route('bussiness.index') }}" class="btn btn-warning"><i class="mdi mdi-arrow-left-thin"></i> Back</a>
                                <button type="submit" class="btn btn-primary" ><i class="mdi mdi-content-save"></i> SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
