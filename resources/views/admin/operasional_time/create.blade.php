@extends('layouts.master')
@section('title', 'Create OTP')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Operasional Time</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('otp.index') }}">Merchant</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('otp.index') }}">Operasional Time</a></li>
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
                        <form action="{{ route('merchant.optime.store', $merchant->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="day">Day</label>
                                <select name="day" id="day" class="form-control">
                                    <option value="sunday">Sunday</option>
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                    <option value="staurday">Saturday</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="opening_hour">Opening Hour</label>
                                <input type="time" class="form-control @error('opening_hour') is-invalid @enderror"
                                    name="opening_hour" id="opening_hour" placeholder=""
                                    value="{{ old('opening_hour') }}" autocomplete="off">
                                @error('opening_hour')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="closing_hour">Closing Hour</label>
                                <input type="time" class="form-control @error('closing_hour') is-invalid @enderror"
                                    name="closing_hour" id="closing_hour" placeholder=""
                                    value="{{ old('closing_hour') }}" autocomplete="off">
                                @error('closing_hour')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{ route('merchant.optime.index', $merchant->id) }}" class="btn btn-warning"><i class="mdi mdi-arrow-left-thin"></i> Back</a>
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
