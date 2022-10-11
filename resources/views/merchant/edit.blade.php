@extends('layouts.master')
@section('title', 'Edit Merchant')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Merchant</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('merchant.index') }}">Merchant</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('merchant.update', $merchant->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="merchant_name">Merchant Name</label>
                                        <input type="text" class="form-control @error('merchant_name') is-invalid @enderror" name="merchant_name" id="merchant_name" placeholder="" value="{{ (old('merchant_name') ? old('merchant_name') : $merchant->merchant_name) }}" autocomplete="off">
                                        @error('merchant_name')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="merchant_email">Merchant Email</label>
                                        <input type="text" class="form-control @error('merchant_email') is-invalid @enderror" name="merchant_email" id="merchant_email" placeholder="" value="{{ old('merchant_email') ? old('merchant_email') : $merchant->merchant_email  }}" autocomplete="off">
                                        @error('merchant_email')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="merchant_category_id">Merchant Category</label>
                                        <select class="form-control @error('merchant_category_id') @enderror" name="merchant_category_id" id="merchant_category_id">
                                            @foreach ($merchant_category as $item)
                                            <option value="{{ $item->id }}" {{ (old('merchant_category_id') ? old('merchant_category_id') : $merchant->merchant_category_id) == $item->id ? 'selected' : ''}}>{{ $item->merchants_category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('merchant_category_id')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="bussiness_id">Bussiness</label>
                                        <select class="form-control @error('bussiness_id') @enderror" name="bussiness_id" id="bussiness_id">
                                            @foreach ($bussiness as $busines)
                                            <option value="{{ $busines->id }}" {{ (old('busines_id') ? old('busines_id') : $merchant->bussiness_id) == $busines->id ? 'selected' : ''}}>{{ $busines->bussiness_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('bussiness_name')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="rek_pooling_id">Rekening Pooling</label>
                                        <select class="form-control @error('rek_pooling_id') @enderror" name="rek_pooling_id" id="rek_pooling_id">
                                            @foreach ($rek_pooling as $rekening)
                                            <option value="{{ $rekening->id }}" {{ (old('rek_pooling_id') ? old('rek_pooling_id') : $merchant->rek_pooling_id) == $rekening->id ? 'selected' : ''}}>{{ $rekening->rek_pooling_code }}</option>
                                            @endforeach
                                        </select>
                                        @error('rek_pooling_code')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="bank_id">Bank</label>
                                        <select class="form-control @error('bank_id') @enderror" name="bank_id" id="bank_id">
                                            @foreach ($bank as $data)
                                            <option value="{{ $data->id }}" {{ (old('bank_id') ? old('bank_id') : $merchant->bank_id) == $data->id ? 'selected' : ''}}>{{ $data->bank_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('bank_name')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="account_name">Account Name</label>
                                        <input type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name" id="account_name" placeholder="" value="{{ old('account_name') ? old('account_name') : $merchant->account_name }}" autocomplete="off">
                                        @error('account_name')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="number_account">Number Account</label>
                                        <input type="text" class="form-control @error('number_account') is-invalid @enderror" name="number_account" id="number_account" placeholder="" value="{{ old('number_account') ? old('number_account') : $merchant->number_account }}" autocomplete="off">
                                        @error('number_account')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="mdr">Mdr</label>
                                        <input type="number" step="0.01" class="form-control @error('mdr') is-invalid @enderror" name="mdr" id="mdr" placeholder="" value="{{ old('mdr') ? old('mdr') : $merchant->mdr }}" autocomplete="off">
                                        @error('mdr')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="" value="{{ old('phone') ? old('phone') : $merchant->phone }}" autocomplete="off">
                                        @error('phone')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="address1">Address1</label>
                                        <textarea name="address1" id="address1" rows="3" class="form-control @error('address1') is-invalid @enderror" placeholder="" autocomplete="off">{{ old('address1') ?  old('address1') : $merchant->address1 }}
                                        </textarea>
                                        @error('address1')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="address2">Address2</label>
                                        <textarea name="address2" id="address2" rows="3" class="form-control @error('address2') is-invalid @enderror" placeholder="" autocomplete="off">{{ old('address2') ?  old('address2') : $merchant->address2 }}
                                        </textarea>
                                        @error('address2')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" placeholder="" value="{{ old('city') ? old('city') : $merchant->city }}" autocomplete="off">
                                        @error('city')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="zip_code">Zip Code</label>
                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" id="zip_code" placeholder="" value="{{ old('zip_code') ? old('zip_code') : $merchant->zip_code }}" autocomplete="off">
                                        @error('zip_code')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="is_active">Status</label>
                                        <select class="form-control @error('is_active') @enderror" name="is_active" id="is_active">
                                            <option value="active" {{ (old('is_active') ? old('is_active') : $merchant->is_active) == '1' ? 'selected' : ''}}>Aktif</option>
                                            <option value="nonactive" {{ (old('is_active') ? old('is_active') : $merchant->is_active) == '0' ? 'selected' : ''}}>Non Aktif</option>
                                        </select>
                                        @error('rek_pooling_code')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="note">Note</label>
                                        <textarea name="note" id="note" rows="3" class="form-control @error('note') is-invalid @enderror" placeholder="" value="{{ old('note') }}" autocomplete="off">{{ old('note') ?  old('note') : $merchant->note }}</textarea>
                                        @error('note')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="" value="{{ old('password') }}" autocomplete="off">
                                        <span style="color: red">*leave it blank if you don't want to change the password</span>
                                        @error('password')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('merchant.index') }}" class="btn btn-warning"><i class="mdi mdi-arrow-left-thin"></i> Back</a>
                                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> SIMPAN</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
