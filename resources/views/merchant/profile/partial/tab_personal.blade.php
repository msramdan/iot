<form action="{{ route('merchants.update_personal') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="firstnameInput" class="form-label">Merchant Name</label>
                <input type="text" name="merchant_name" class="form-control @error('merchant_name') is-invalid @enderror" id="firstnameInput" placeholder="Enter your firstname" value="{{ Auth::guard('merchant')->user()->merchant_name }}">
                @error('merchant_name')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" placeholder="Enter your email" value="{{ Auth::guard('merchant')->user()->email }}">
                @error('email')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="phonenumberInput" class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phonenumberInput" placeholder="Enter your phone number" value="{{ Auth::guard('merchant')->user()->phone }}">
                @error('phone')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="provinsi">Provinsi</label>
                <select name="provinsi_id" id="provinsi" class="form-control">
                    <option value="">-- Select --</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}" {{ Auth::guard('merchant')->user()->provinsi_id == $province->id ? 'selected' : '' }}>{{ $province->provinsi }}</option>
                    @endforeach
                </select>
                @error('provinsi_id')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
       <div class="col-lg-6">
            <div class="mb-3">
                <label for="kota">Kab/Kota</label>
                <select name="kabkot_id" id="kota" class="form-control">
                    <option value="">-- Select --</option>
                    @foreach ($kabkot as $kab)
                        <option value="{{ $kab->id }}" {{ Auth::guard('merchant')->user()->kabkot_id == $kab->id ? 'selected' : '' }}>{{ $kab->kabupaten_kota }}</option>
                    @endforeach
                </select>
                @error('kabkot_id')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="kecamatan">Kecamatan</label>
                <select name="kecamatan_id" id="kecamatan" class="form-control">
                    <option value="">-- Select --</option>
                    @foreach ($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->id }}" {{ Auth::guard('merchant')->user()->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->kecamatan }}</option>
                    @endforeach
                </select>
                @error('kecamatan_id')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="kelurahan">Kelurahan</label>
                <select name="kelurahan_id" id="kelurahan" class="form-control">
                    <option value="">-- Select --</option>
                    @foreach ($kelurahans as $kelurahan)
                        <option value="{{ $kelurahan->id }}" {{ Auth::guard('merchant')->user()->kelurahan_id == $kelurahan->id ? 'selected' : '' }}>{{ $kelurahan->kelurahan }}</option>
                    @endforeach
                </select>
                @error('kelurahan_id')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="city" class="form-label">Zip Code</label>
                <input type="text" name="zip_code" class="form-control @error('zip_code') is-invalid @enderror" id="zip_code" placeholder="Enter your zip code" value="{{ Auth::guard('merchant')->user()->zip_code }}">
                @error('zip_code')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
            <!--end col-->
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="address1" class="form-label">Address 1</label>
                <textarea name="address1" id="address1" class="form-control @error('address1') is-invalid @enderror">{{ $merchant->address1 }}</textarea>
                @error('zip_code')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
            <!--end col-->
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="address2" class="form-label">Address 2</label>
                <textarea name="address2" id="address1" class="form-control @error('address2') is-invalid @enderror">{{ $merchant->address2 }}</textarea>
                @error('address2')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="skillsInput" class="form-label">Merchant Category</label>
                <select class="form-control @error('merchant_category_id') is-invalid @enderror" name="merchant_category_id">
                    <option value="">Select Merchant Category</option>
                    @foreach ($merchant_categories as $merchant_category)
                        <option value="{{ $merchant_category->id }}" {{ $merchant->merchant_category_id == $merchant_category->id ? 'selected' : '' }}>{{ $merchant_category->merchants_category_name }}</option>
                    @endforeach
                </select>
                @error('merchant_category_id')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="skillsInput" class="form-label">Bussiness</label>
                <select class="form-control @error('bussiness_id') is-invalid @enderror" name="bussiness_id">
                    <option value="">Select Bussiness</option>
                    @foreach ($bussinesses as $bussiness)
                        <option value="{{ $bussiness->id }}" {{ $merchant->bussiness_id == $bussiness->id ? 'selected' : '' }}>{{ $bussiness->bussiness_name }}</option>
                    @endforeach
                </select>
                @error('bussiness_id')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="submit" class="btn btn-primary">Updates</button>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</form>
