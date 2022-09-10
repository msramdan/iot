@extends('layouts.master')
@section('title', 'Edit Merchants Category')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Merchants Category</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('merchants_c.index') }}">Merchants Category</a></li>
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
                        <form action="{{ route('merchants_c.update',$merchantsCategory->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="merchants_category_name">Merchants Category Name</label>
                                <input type="text" class="form-control @error('merchants_category_name') is-invalid @enderror" name="merchants_category_name" id="merchants_category_name" placeholder="" value="{{ old('merchants_category_name') ? old('merchants_category_name') : $merchantsCategory->merchants_category_name }}" autocomplete="off">
                                @error('merchants_category_name')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{ route('merchants_c.index') }}" class="btn btn-warning"><i class="mdi mdi-arrow-left-thin"></i> Back</a>
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
