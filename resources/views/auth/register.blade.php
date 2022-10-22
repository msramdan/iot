@extends('layouts.auth_merchant')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="ugf-form">
                <form action="{{ route('register.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-block form-merchant">
                        <h4>Personal Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="merchant-name">Merchant Name</label>
                                    <input type="text" name="merchant_name" class="form-control @error('merchant_name') is-invalid @enderror" id="merchant-name" placeholder="Merchant Name" value="{{ old('merchant_name') }}">
                                    @error('merchant_name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" name="phone" value="{{ old('phone') }}" id="phone" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" value="{{ old('city') }}" placeholder="City" class="form-control @error('city') is-invalid @enderror">
                                    @error('city')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="zip_code">Zip Code</label>
                                    <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" placeholder="Zip Code" class="form-control @error('zip_code') is-invalid @enderror">
                                    @error('zip_code')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address1">Address Line 1</label>
                            <input type="text" name="address1" class="form-control @error('address1') is-invalid @enderror" id="address1" placeholder="Address 1" value="{{ old('address1') }}">
                            @error('address1')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address2">Address Line 2</label>
                            <input type="text" name="address2" class="form-control @error('address2') is-invalid @enderror" id="address2" placeholder="Address 2" value="{{ old('address2') }}">
                            @error('address2')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address2">Merchant Category</label>
                                    <select name="merchant_category_id" id="merchant_category" class="form-control @error('merchant_category_id') is-invalid @enderror">
                                        <option value="">Select Merchant Category</option>
                                        @foreach ($merchantCategories as $merchant_category)
                                            <option value="{{ $merchant_category->id }}" {{ old('merchant_category_id') == $merchant_category->id  ? 'selected' : '' }} >{{ $merchant_category->merchants_category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('merchant_category_id')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address2">Bussiness Type</label>
                                    <select name="bussiness_id" id="bussiness" class="form-control @error('bussiness_id') is-invalid @enderror">
                                        <option value="">Select Bussiness Type</option>
                                        @foreach ($bussinesses as $bussiness)
                                            <option value="{{ $bussiness->id }}" {{ old('bussiness_id') == $bussiness->id ? 'selected' : ''  }}>{{ $bussiness->bussiness_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('bussiness_id')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address2">Bank</label>
                                    <select name="bank_id" id="bank" class="form-control @error('bank_id') is-invalid @enderror">
                                        <option value="">Select Bank</option>
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}" {{ old('bank_id') == $bank->id ? 'selected' : '' }}>{{ $bank->bank_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('bank_id')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">Number Account</label>
                                    <input type="text" name="number_account" value="{{ old('number_account') }}" class="form-control @error('number_account') is-invalid @enderror" id="number_account" placeholder="Number Account">
                                    @error('number_account')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="zip">Account Name</label>
                                    <input type="text" name="account_name" value="{{ old('account_name') }}" class="form-control @error('account_name') is-invalid @enderror" id="account_name" placeholder="Account Name">
                                    @error('account_name')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zip">Password</label>
                            <input type="password" name="password" class="form-control @error('account_name') is-invalid @enderror" id="password" placeholder="Password">
                            @error('password')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="input-block form-merchant-file d-none">
                        <h4>Upload Documents</h4>
                        <div class="file-input-wrap">
                            <div class="custom-file">
                                <input type="file" name="identity_card_photo" onchange="readUrl(this, '#show_identity_card_photo')" class="custom-file-input @error('identity_card_photo') is-invalid @enderror" id="identity_card_photo">
                                <label class="custom-file-label" for="identity_card_photo"><img id="show_identity_card_photo" src="{{ asset('frontend/images/cloud.png') }}"></label>
                                <span class="text">Foto KTP</span>
                                @error('identity_card_photo')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="custom-file">
                                <input type="file" name="selfie_ktp_photo" onchange="readUrl(this, '#show_selfie_ktp_photo')" class="custom-file-input @error('selfie_ktp_photo') is-invalid @enderror" id="selfie_ktp_photo">
                                <label class="custom-file-label" for="selfie_ktp_photo"><img id="show_selfie_ktp_photo" src="{{ asset('frontend/images/cloud.png') }}"></label>
                                <span class="text">Foto Selfie KTP</span>
                                @error('selfie_ktp_photo')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="custom-file">
                                <input type="file" name="npwp_photo" onchange="readUrl(this, '#show_npwp_photo')" class="custom-file-input @error('npwp_photo') is-invalid @enderror" id="npwp_photo">
                                <label class="custom-file-label" for="npwp_photo"><img id="show_npwp_photo" src="{{ asset('frontend/images/cloud.png') }}"></label>
                                <span class="text">Foto NPWP</span>
                                @error('npwp_photo')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="file-input-wrap">
                             <div class="custom-file">
                                <input type="file" name="outlet_photo" onchange="readUrl(this, '#show_outlet_photo')" class="custom-file-input @error('outlet_photo') is-invalid @enderror" id="outlet_photo">
                                <label class="custom-file-label" for="outlet_photo"><img id="show_outlet_photo" src="{{ asset('frontend/images/cloud.png') }}"></label>
                                <span class="text">Foto Outlet</span>
                                @error('outlet_photo')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="custom-file">
                                <input type="file" name="owner_outlet_photo" onchange="readUrl(this, '#show_owner_outlet_photo')" class="custom-file-input @error('owner_outlet_photo') is-invalid @enderror" id="owner_outlet_photo">
                                <label class="custom-file-label" for="owner_outlet_photo"><img id="show_owner_outlet_photo" src="{{ asset('frontend/images/cloud.png') }}"></label>
                                <span class="text">Foto Owner + Otlet</span>
                                @error('owner_outlet_photo')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="custom-file">
                                <input type="file" name="in_outlet_photo" onchange="readUrl(this, '#show_in_outlet_photo')" class="custom-file-input @error('in_outlet_photo') is-invalid @enderror" id="in_outlet_photo">
                                <label class="custom-file-label" for="in_outlet_photo"><img id="show_in_outlet_photo" src="{{ asset('frontend/images/cloud.png') }}"></label>
                                <span class="text">Foto Dalam Outlet</span>
                                @error('in_outlet_photo')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="conditions">
                            <ul>
                            <li class="complete">File accepted: JPEG/JPG/PNG (Max size: 2 MB)</li>
                            <li>Document should be good condition</li>
                            <li>Document must be  valid period</li>
                            <li>Face must be clear visible</li>
                            </ul>
                        </div>
                        <div class="form-group mt-2">
                            <div class="custom-checkbox">
                                <input type="checkbox" name="tos" class="custom-control-input" id="customControlValidation1" required>
                                <label class="custom-control-label" for="customControlValidation1">I accept the <a href="#">Terms & Conditions</a> and <a href="#">Privacy policy</a></label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-next" type="button">Next Step &nbsp; &#10140;</button>
                    <button class="btn btn-submit d-none">Submit &nbsp; <img src="{{ asset('images/check.svg') }}" alt=""></button>
                </form>
                <button type="button" class="btn-prev back-to-prev d-none"><img src="{{ ('images/arrow-left-grey.png') }}" alt=""> Back to Previous</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $('.btn-next').click(function() {
            $('.form-merchant').addClass('d-none none');
            $('.form-merchant-file').removeClass('d-none').addClass('block');
            $(this).addClass('d-none none');
            $('.btn-prev').removeClass('d-none none').addClass('block')
            $('.btn-submit').removeClass('d-none none').addClass('block')
            $('#progres-bar').addClass('progress-bar-full');
        });

        $('.btn-prev').click(function() {
            $('.form-merchant-file').removeClass('block').addClass('d-none none');
            $('.form-merchant').removeClass('d-none none').addClass('block');
            $(this).addClass('d-none none')
            $('.btn-submit').addClass('d-none none').removeClass('block')
            $('.btn-next').removeClass('d-none none').addClass('block')
            $('#progres-bar').removeClass('progress-bar-full');
        })

        function readUrl(input, id_show) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(id_show).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function upload(input, input_id, show_id) {
            readUrl(input, show_id);
        }
    </script>
@endpush
