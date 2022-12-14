<div id="form-personal" class="input-block form-merchant d-none" data-target_back="#form-merchant-type" data-target_active="#form-document">
    <h4>Personal Information</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="merchant-name">Merchant Name</label>
                <input type="text" name="merchant_name" class="form-control @error('merchant_name') is-invalid @enderror" placeholder="Merchant Name" value="{{ old('merchant_name') }}" id="merchant_name" onchange="onValidation('merchant_name')">
                <span class="d-none" style="color: red;" id="error-merchant_name"></span>
                @error('merchant_name')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}" onchange="onValidation('email')">
                <span class="d-none" style="color: red;" id="error-email"></span>
                @error('email')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" name="phone" value="{{ old('phone') }}" minlength="10" maxlength="13" id="phone" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" onchange="onValidation('phone')">
        <span class="d-none" style="color: red;" id="error-phone"></span>
        @error('phone')
        <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select name="provinsi_id" id="provinsi" class="form-control @error('provinsi_id') is-invalid @enderror" onchange="onValidation('provinsi')">
                    <option value="">-- Select --</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->provinsi }}</option>
                    @endforeach
                </select>
                <span class="d-none" style="color: red;" id="error-provinsi"></span>
                @error('provinsi_id')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="kota">Kab/Kota</label>
                <select name="kabkot_id" id="kota" class="form-control @error('kabkot_id') is-invalid @enderror" onchange="onValidation('kota')">
                    <option value="">-- Select --</option>
                </select>
                <span class="d-none" style="color: red;" id="error-kota"></span>
                @error('kabkot_id')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <select name="kecamatan_id" id="kecamatan" class="form-control @error('kecamatan_id') is-invalid @enderror" onchange="onValidation('kecamatan')">
                    <option value="">-- Select --</option>
                </select>
                <span class="d-none" style="color: red;" id="error-kecamatan"></span>
                @error('provinsi_id')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="kelurahan">Kelurahan</label>
                <select name="kelurahan_id" id="kelurahan" class="form-control @error('kelurahan_id') is-invalid @enderror" onchange="onValidation('kelurahan')">
                    <option value="">-- Select --</option>
                </select>
                <span class="d-none" style="color: red;" id="error-kelurahan"></span>
                @error('kabkot_id')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="zip_code">Zip Code</label>
        <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" placeholder="Zip Code" class="form-control @error('zip_code') is-invalid @enderror" onchange="onValidation('zip_code')">
        <span class="d-none" style="color: red;" id="error-zip_code"></span>
        @error('zip_code')
        <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="address1">Address Line 1</label>
        <input type="text" name="address1" class="form-control @error('address1') is-invalid @enderror" id="address1" placeholder="Address 1" value="{{ old('address1') }}" onchange="onValidation('address1')">
        <span class="d-none" style="color: red;" id="error-address1"></span>
        @error('address1')
        <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="address2">Address Line 2</label>
        <input type="text" name="address2" class="form-control @error('address2') is-invalid @enderror" id="address2" placeholder="Address 2" value="{{ old('address2') }}" onchange="onValidation('address2')">
        <span class="d-none" style="color: red;" id="error-address2"></span>
        @error('address2')
        <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="address2">Merchant Category</label>
                <select name="merchant_category_id" id="merchant_category" class="form-control @error('merchant_category_id') is-invalid @enderror" onchange="onValidation('merchant_category')">
                    <option value="">Select Merchant Category</option>
                    @foreach ($merchantCategories as $merchant_category)
                        <option value="{{ $merchant_category->id }}" {{ old('merchant_category_id') == $merchant_category->id  ? 'selected' : '' }} >{{ $merchant_category->merchants_category_name }}</option>
                    @endforeach
                </select>
                <span class="d-none" style="color: red;" id="error-merchant-category"></span>
                @error('merchant_category_id')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="address2">Bussiness Type</label>
                <select name="bussiness_id" id="bussiness" class="form-control @error('bussiness_id') is-invalid @enderror" onchange="onValidation('bussiness')">
                    <option value="">Select Bussiness Type</option>
                    @foreach ($bussinesses as $bussiness)
                        <option value="{{ $bussiness->id }}" {{ old('bussiness_id') == $bussiness->id ? 'selected' : ''  }}>{{ $bussiness->bussiness_name }}</option>
                    @endforeach
                </select>
                <span class="d-none" style="color: red;" id="error-bussiness"></span>
                @error('bussiness_id')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="address2">Bank</label>
                <select name="bank_id" id="bank" class="form-control @error('bank_id') is-invalid @enderror" onchange="onValidation('bank')">
                    <option value="">Select Bank</option>
                    @foreach ($banks as $bank)
                        <option value="{{ $bank->id }}" {{ old('bank_id') == $bank->id ? 'selected' : '' }}>{{ $bank->bank_name }}</option>
                    @endforeach
                </select>
                <span class="d-none" style="color: red;" id="error-bank"></span>
                @error('bank_id')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="city">Number Account</label>
                <input type="text" name="number_account" value="{{ old('number_account') }}" class="form-control @error('number_account') is-invalid @enderror" id="number_account" placeholder="Number Account" onchange="onValidation('number_account')">
                <span class="d-none" style="color: red;" id="error-number-account"></span>
                @error('number_account')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="zip">Account Name</label>
                <input type="text" name="account_name" value="{{ old('account_name') }}" class="form-control @error('account_name') is-invalid @enderror" id="account_name" placeholder="Account Name" onchange="onValidation('account_name')">
                <span class="d-none" style="color: red;" id="error-account-name"></span>
                @error('account_name')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="zip">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" onchange="onValidation('password')">
        <span class="d-none" style="color: red;" id="error-password"></span>
        @error('password')
        <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
</div>
