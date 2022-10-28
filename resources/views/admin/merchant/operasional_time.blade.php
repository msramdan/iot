@extends('layouts.master')
@section('title', 'Data Merchant Active')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Merchant Active</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Merchant Active</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('otp.store') }}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <a href="{{ route('merchant.index') }}" class="btn btn-warning"><i
                                        class="mdi mdi-arrow-left-thin"></i> Back</a>
                                <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i>
                                    SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')

@endpush