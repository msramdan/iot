@extends('layouts.master')
@section('title', 'Edit Subnet')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Subnet</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('subnet.index') }}">Subnet</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <form action="{{ route('subnet.update', $subnet->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="subnet">Subnet</label>
                                <input type="text" name="subnet" id="subnet" value="{{ old('subnet') ?? $subnet->subnet }}"
                                    class="form-control @error('subnet') is-invalid @enderror ">
                                @error('subnet')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{ route('subnet.index') }}" class="btn btn-warning"><i
                                        class="mdi mdi-arrow-left-thin"></i> Back</a>
                                <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i>
                                    SIMPAN</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection