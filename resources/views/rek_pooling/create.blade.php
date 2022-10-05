@extends('layouts.master')
@section('title', 'Creat Rekening Pooling')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Rekening Pooling</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('rek_pooling.index') }}">Rekening Pooling</a></li>
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
                        <form action="{{ route('rek_pooling.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="rek_pooling_name">Rekening Pooling Code</label>
                                <input type="text" class="form-control @error('rek_pooling_code') is-invalid @enderror" name="rek_pooling_code" id="rek_pooling_code" placeholder="" value="{{ old('rek_pooling_code') }}" autocomplete="off">
                                @error('rek_pooling_code')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="bank_id">Bank</label>
                                <select class="form-control @error('bank_id') @enderror" name="bank_id" id="bank_id">
                                    @foreach ($bank as $item)
                                      <option value="{{ $item->id }}" {{ old('bank_id') == $item->id ? 'selected' : ''}}>{{ $item->bank_name }}</option>
                                    @endforeach
                                </select>
                                @error('bank_id')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="account_name">Account Name</label>
                                <input type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name" id="account_name" placeholder="" value="{{ old('account_name') }}" autocomplete="off">
                                @error('account_name')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="number_account">Number Account</label>
                                <input type="text" class="form-control @error('number_account') is-invalid @enderror" name="number_account" id="number_account" placeholder="" value="{{ old('number_account') }}" autocomplete="off">
                                @error('number_account')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{ route('rek_pooling.index') }}" class="btn btn-warning"><i class="mdi mdi-arrow-left-thin"></i> Back</a>
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
