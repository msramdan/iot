@extends('layouts.master')
@section('title', 'Create OTP')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">OTP</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('otp.index') }}">OTP</a></li>
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
                        <form action="{{ route('otp.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="merchant_id">Merchant</label>
                                <select name="merchant_id" id="merchant_id" class="form-control @error('merchant_id') is-invalid @enderror">
                                    <option value=""{{ $merchants->pluck('id')->contains(old('merchant_id')) ? '' : 'selected'}}  disabled>-- SELECT --</option>
                                    @foreach ($merchants as $merchant)
                                        <option value="{{ $merchant->id }}" data-email="{{ $merchant->email }}" {{ old('merchant_id') == $merchant->id ? 'selected' : '' }}>{{ $merchant->merchant_name }}</option>
                                    @endforeach
                                </select>
                                @error('merchant_id')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder=""
                                    value="{{ old('email') }}" autocomplete="off">
                                @error('email')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="otp_number">OTP Number</label>
                                <input type="number" class="form-control @error('otp_number') is-invalid @enderror"
                                    name="otp_number" id="otp_number" placeholder=""
                                    value="{{ old('otp_number') }}" autocomplete="off">
                                @error('otp_number')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="expired_date">Expire Date</label>
                                <input type="date" name="expired_date" id="expired_date" class="form-control @error('expired_date') is-invalid @enderror" >
                                @error('expired_date')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{ route('merchants_c.index') }}" class="btn btn-warning"><i class="mdi mdi-arrow-left-thin"></i> Back</a>
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

@push('js')
    <script>
        $('#merchant_id').change(function(){
            if(this.value != null){
                $('#email').val($(this).find(':selected').data('email'));
            }
        })
    </script>
@endpush
