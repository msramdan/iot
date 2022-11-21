@extends('layouts.master')
@section('title', 'Edit Subinstance')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Subinstance</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('instance.index') }}">Instance</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <form action="{{ route('instance.subinstance.update', [$subinstance->instance_id, $subinstance->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="code_subinstance">Code Subinstance</label>
                                <input type="text" name="code_subinstance" id="code_subinstance" value="{{ old('code_subinstance') ?? $subinstance->code_subinstance }}"
                                    class="form-control @error('code_subinstance') is-invalid @enderror " readonly>
                                @error('code_subinstance')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="code_subinstance">Name Subinstance</label>
                                <input type="text" name="name_subinstance" id="name_subinstance" value="{{ old('name_subinstance') ?? $subinstance->name_subinstance }}"
                                    class="form-control @error('name_subinstance') is-invalid @enderror ">
                                @error('name_subinstance')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{ route('instance.index') }}" class="btn btn-warning"><i
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