<form action="#" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="instance_code" class="form-label">Instance Code</label>
                <input type="text" name="instance_code" class="form-control" readonly value="{{ Auth::guard('instances')->user()->instance_code }}">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="firstnameInput" class="form-label">Instance Name</label>
                <input type="text" name="instance_name" class="form-control" id="firstnameInput" readonly value="{{ Auth::guard('instances')->user()->instance_name }}">
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email Address</label>
                <input type="email" name="email" readonly class="form-control" id="emailInput" value="{{ Auth::guard('instances')->user()->email }}">
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="phonenumberInput" class="form-label">Phone Number</label>
                <input type="text" name="phone" readonly class="form-control" id="phonenumberInput" value="{{ Auth::guard('instances')->user()->phone }}">
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="provinsi">Provinsi</label>
                <select name="provinsi_id" id="provinsi" readonly class="form-control">
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}" {{ Auth::guard('instances')->user()->provinsi_id == $province->id ? 'selected' : '' }}>{{ $province->provinsi }}</option>
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
                <select name="kabkot_id" id="kota" readonly class="form-control">
                    @foreach ($city as $kab)
                        <option value="{{ $kab->id }}" {{ Auth::guard('instances')->user()->kabkot_id == $kab->id ? 'selected' : '' }}>{{ $kab->kabupaten_kota }}</option>
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
                <select name="kecamatan_id" id="kecamatan" readonly class="form-control">
                    @foreach ($district as $kecamatan)
                        <option value="{{ $kecamatan->id }}" {{ Auth::guard('instances')->user()->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->kecamatan }}</option>
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
                <select name="kelurahan_id" id="kelurahan" readonly class="form-control">
                    @foreach ($village as $kelurahan)
                        <option value="{{ $kelurahan->id }}" {{ Auth::guard('instances')->user()->kelurahan_id == $kelurahan->id ? 'selected' : '' }}>{{ $kelurahan->kelurahan }}</option>
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
                <input type="text" name="zip_code" readonly class="form-control" id="zip_code" value="{{ Auth::guard('instances')->user()->zip_code }}">
            </div>
        </div>
            <!--end col-->
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="address1" class="form-label">Address 1</label>
                <textarea name="address1" id="address1" readonly class="form-control @error('address1') is-invalid @enderror">{{ $instance->address1 }}</textarea>
            </div>
        </div>
        <!--end col-->
            <!--end col-->
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="address2" class="form-label">Address 2</label>
                <textarea name="address2" id="address1" readonly class="form-control @error('address2') is-invalid @enderror">{{ $instance->address2 }}</textarea>
                @error('address2')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="skillsInput" class="form-label">Bussiness</label>
                <select class="form-control" readonly name="bussiness_id">
                    <option value="">Select Bussiness</option>
                    @foreach ($bussinesses as $bussiness)
                        <option value="{{ $bussiness->id }}" {{ $instance->bussiness_id == $bussiness->id ? 'selected' : '' }}>{{ $bussiness->bussiness_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</form>
