@extends('layouts.master')
@section('title', 'Create Merchant')

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
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('merchant.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="ci_csrf_token" value="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title text-bold">Data Informasi Merchant</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row gy-3">
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="nmid">National MID</label>
                                                            <input type="text"
                                                                class="form-control @error('nmid') is-invalid @enderror"
                                                                name="nmid" id="nmid" placeholder=""
                                                                value="{{ old('nmid') }}" autocomplete="off">
                                                            @error('nmid')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="merchant_name">Merchant Name</label>
                                                            <input type="text"
                                                                class="form-control @error('merchant_name') is-invalid @enderror"
                                                                name="merchant_name" id="merchant_name" placeholder=""
                                                                value="{{ old('merchant_name') }}" autocomplete="off">
                                                            @error('merchant_name')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="merchant_email">Merchant Email</label>
                                                            <input type="text"
                                                                class="form-control @error('merchant_email') is-invalid @enderror"
                                                                name="merchant_email" id="merchant_email" placeholder=""
                                                                value="{{ old('merchant_email') }}" autocomplete="off">
                                                            @error('merchant_email')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="merchant_category_id">Merchant Category</label>
                                                            <select
                                                                class="form-control @error('merchant_category_id') @enderror"
                                                                name="merchant_category_id" id="merchant_category_id">
                                                                <option value="">-- Select --</option>
                                                                @foreach ($merchant_category as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ old('merchant_category_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->merchants_category_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('merchant_category_id')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="merchant_category_id">Merchant Type</label>
                                                            <select class="form-control @error('merchant_type') @enderror"
                                                                name="merchant_type" id="merchant_type"
                                                                onchange="form_change()">
                                                                <option value="">-- Select --</option>
                                                                <option value="bussiness">Bussiness</option>
                                                                <option value="personal">Personal</option>
                                                            </select>
                                                            @error('merchant_type')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="bussiness_id">Bussiness</label>
                                                            <select class="form-control @error('bussiness_id') @enderror"
                                                                name="bussiness_id" id="bussiness_id">
                                                                <option value="">-- Select --</option>
                                                                @foreach ($bussiness as $busines)
                                                                    <option value="{{ $busines->id }}"
                                                                        {{ old('bussiness_id') == $busines->id ? 'selected' : '' }}>
                                                                        {{ $busines->bussiness_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('bussiness_id')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="mdr">Mdr (%)</label>
                                                            <input style="width:50%; height:1%" type="number"
                                                                step="0.01"
                                                                class="form-control @error('mdr') is-invalid @enderror"
                                                                name="mdr" id="mdr" placeholder=""
                                                                value="{{ old('mdr') }}" autocomplete="off">
                                                            @error('mdr')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="phone">Phone</label>
                                                            <input type="number" id="phone" name="phone"
                                                                class="form-control">
                                                            @error('phone')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="provinsi">Provinsi</label>
                                                            <select name="provinsi_id" id="provinsi"
                                                                class="form-control">
                                                                <option value="">-- Select --</option>
                                                                @foreach ($provinces as $province)
                                                                    <option value="{{ $province->id }}">
                                                                        {{ $province->provinsi }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="kota">Kab/Kota</label>
                                                            <select name="kabkot_id" id="kota" class="form-control">
                                                                <option value="">-- Select --</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="kecamatan">Kecamatan</label>
                                                            <select name="kecamatan_id" id="kecamatan"
                                                                class="form-control">
                                                                <option value="">-- Select --</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="kelurahan">Kelurahan</label>
                                                            <select name="kelurahan_id" id="kelurahan"
                                                                class="form-control">
                                                                <option value="">-- Select --</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="address1">Address1</label>
                                                            <textarea name="address1" id="address1" rows="3" class="form-control @error('address1') is-invalid @enderror"
                                                                placeholder="" value="{{ old('address1') }}" autocomplete="off">{{ old('address1') }}</textarea>
                                                            @error('address1')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="address2">Address2</label>
                                                            <textarea name="address2" id="address2" rows="3" class="form-control @error('address2') is-invalid @enderror"
                                                                placeholder="" value="{{ old('address2') }}" autocomplete="off">{{ old('address2') }}</textarea>
                                                            @error('address2')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="zip_code">Zip Code</label>
                                                            <input type="text"
                                                                class="form-control @error('zip_code') is-invalid @enderror"
                                                                name="zip_code" id="zip_code" placeholder=""
                                                                value="{{ old('zip_code') }}" autocomplete="off">
                                                            @error('zip_code')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="is_active" id="is_active"
                                                        value="nonactive">
                                                    <div class="col-md-3 col-md-6">
                                                        <div>
                                                            <label for="note">Note</label>
                                                            <textarea name="note" id="note" rows="3" class="form-control @error('note') is-invalid @enderror"
                                                                placeholder="" value="{{ old('note') }}" autocomplete="off"></textarea>
                                                            @error('note')
                                                                <span style="color: red;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-6">
                                                        <label for="password">Password</label>
                                                        <input type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" id="password" placeholder=""
                                                            value="{{ old('password') }}" autocomplete="off">
                                                        @error('password')
                                                            <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                        <div class="my-1">
                                                            <button class="btn btn-sm btn-primary" type="button"
                                                                onclick="generatePassword()">Generate Password</button>
                                                            <button class="btn btn-sm btn-secondary" type="button"
                                                                onclick="toggleShowPassword()"><i
                                                                    class="mdi mdi-eye"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title text-bold">Data File Merchant</h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <div class="row gy-3">
                                                            <!-- Foto KTP -->
                                                            <div class="col-md-3 col-md-6">
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Foto
                                                                        KTP</label>
                                                                    <input type="file" name="identity_card_photo"
                                                                        class="form-control @error('identity_card_photo') is-invalid @enderror"
                                                                        id="basiInput">
                                                                    @error('identity_card_photo')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- End Foto KTP -->
                                                            <!-- Foto Selfie KTP -->
                                                            <div class="col-md-3 col-md-6">
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Foto Selfie
                                                                        KTP</label>
                                                                    <input type="file" name="selfie_ktp_photo"
                                                                        class="form-control @error('selfie_ktp_photo') is-invalid @enderror"
                                                                        id="basiInput">
                                                                    @error('selfie_ktp_photo')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- End Foto Selfie KTP -->
                                                            <!-- NPWP -->
                                                            <div class="col-md-3 col-md-6">
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Foto
                                                                        NPWP</label>
                                                                    <input type="file" name="npwp_photo"
                                                                        class="form-control  @error('npwp_photo') is-invalid @enderror"
                                                                        id="basiInput">
                                                                    @error('npwp_photo')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- End NPWP -->
                                                            <!-- Outlet -->
                                                            <div class="col-md-3 col-md-6">
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Foto
                                                                        Outlet</label>
                                                                    <input type="file" name="outlet_photo"
                                                                        class="form-control @error('outlet_photo') is-invalid @enderror"
                                                                        id="basiInput">
                                                                    @error('outlet_photo')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- End Outlet -->
                                                            <!-- Owner + Outlet -->
                                                            <div class="col-md-3 col-md-6">
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Foto Owner +
                                                                        Outlet</label>
                                                                    <input type="file" name="owner_outlet_photo"
                                                                        class="form-control @error('owner_outlet_photo') is-invalid @enderror"
                                                                        id="basiInput">
                                                                    @error('owner_outlet_photo')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- End Owner + Outlet -->
                                                            <!-- In Outlet -->
                                                            <div class="col-md-3 col-md-6">
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Foto Dalam
                                                                        Outlet</label>
                                                                    <input type="file" name="in_outlet_photo"
                                                                        class="form-control @error('in_outlet_photo') is-invalid @enderror"
                                                                        id="basiInput">
                                                                    @error('in_outlet_photo')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- End In Outlet -->
                                                            <!-- Sertifikat domisili -->
                                                            <div class="col-md-3 col-md-6">
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Sertifikat
                                                                        Domisili (SKD / SITU)</label>
                                                                    <input type="file" name="certificate_of_domicile"
                                                                        class="form-control @error('certificate_of_domicile') is-invalid @enderror"
                                                                        id="basiInput">
                                                                    @error('certificate_of_domicile')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- End Sertifikat Domisili -->
                                                            <!-- Foto Buku Rekening -->
                                                            <div class="col-md-3 col-md-6">
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Foto Buku
                                                                        Rekening</label>
                                                                    <input type="file" name="copy_bank_account_book"
                                                                        class="form-control @error('copy_bank_account_book') is-invalid @enderror"
                                                                        id="basiInput">
                                                                    @error('copy_bank_account_book')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- End Foto Buku Rekening -->
                                                            <!-- Sertifikat Bukti Kepemilikan -->
                                                            <div class="col-md-3 col-md-6">
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Surat Sewa /
                                                                        Bukti Kepemilikan</label>
                                                                    <input type="file" name="copy_proof_ownership"
                                                                        class="form-control @error('copy_proof_ownership') is-invalid @enderror"
                                                                        id="basiInput">
                                                                    @error('copy_proof_ownership')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- End Sertifikat Kemepilikan -->
                                                            <!-- SIUP / Surat Ijin Usaha -->
                                                            <div class="col-md-3 col-md-6 merchant-bussiness d-none">
                                                                <div>
                                                                    <label for="basiInput" class="form-label">SIUP / Surat
                                                                        Ijin Usaha</label>
                                                                    <input type="file" name="siup_photo"
                                                                        class="form-control @error('siup_photo') is-invalid @enderror"
                                                                        id="basiInput">
                                                                    @error('siup_photo')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- End SIUP / Surat Ijin Usaha -->
                                                            <!-- TDP -->
                                                            <div class="col-md-3 col-md-6 merchant-bussiness d-none">
                                                                <div>
                                                                    <label for="basiInput" class="form-label">TDP</label>
                                                                    <input type="file" name="tdp_photo"
                                                                        class="form-control @error('tdp_photo') is-invalid @enderror"
                                                                        id="basiInput">
                                                                    @error('tdp_photo')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- End TDP -->
                                                            <!-- Akta Pendirian Perusahaan -->
                                                            <div class="col-md-3 col-md-6 merchant-bussiness d-none">
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Akta
                                                                        Pendirian
                                                                        Perusahaan</label>
                                                                    <input type="file" name="copy_corporation_deed"
                                                                        class="form-control @error('copy_corporation_deed') is-invalid @enderror"
                                                                        id="basiInput">
                                                                    @error('copy_corporation_deed')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- End Akta Pendirian Perusahaan -->
                                                            <!-- Akta Pengurus Perusahaan -->
                                                            <div class="col-md-3 col-md-6 merchant-bussiness d-none">
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Akta
                                                                        Pengurus
                                                                        Perusahaan</label>
                                                                    <input type="file" name="copy_management_deed"
                                                                        class="form-control @error('copy_management_deed') is-invalid @enderror"
                                                                        id="basiInput">
                                                                    @error('copy_management_deed')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- End Akta Pengurus Perusahaan -->
                                                            <!-- Akta Pengurus Perusahaan -->
                                                            <div class="col-md-3 col-md-6 merchant-bussiness d-none">
                                                                <div>
                                                                    <label for="basiInput" class="form-label">SK Menkeh /
                                                                        Depkumham</label>
                                                                    <input type="file" name="copy_sk_menkeh"
                                                                        class="form-control @error('copy_sk_menkeh') is-invalid @enderror"
                                                                        id="basiInput">
                                                                    @error('copy_sk_menkeh')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- End Akta Pengurus Perusahaan -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title text-bold">Data Bank Merchant</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row gy-3">
                                                            <div class="col-md-3 col-md-6">
                                                                <div>
                                                                    <label for="rek_pooling_id">BCA Branch Name</label>
                                                                    <select
                                                                        class="form-control @error('rek_pooling_id') @enderror"
                                                                        name="rek_pooling_id" id="rek_pooling_id">
                                                                        <option value="">-- Select --</option>
                                                                        @foreach ($rek_pooling as $rekening)
                                                                            <option value="{{ $rekening->id }}"
                                                                                {{ old('rek_pooling_id') == $rekening->id ? 'selected' : '' }}>
                                                                                {{ $rekening->rek_pooling_code }} -
                                                                                {{ $rekening->account_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('rek_pooling_id')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-md-6">
                                                                <div>
                                                                    <label for="bank_id">Settlement Account</label>
                                                                    <select
                                                                        class="form-control @error('bank_id') @enderror"
                                                                        name="bank_id" id="bank_id">
                                                                        <option value="">-- Select --</option>
                                                                        @foreach ($bank as $data)
                                                                            <option value="{{ $data->id }}"
                                                                                {{ old('bank_id') == $data->id ? 'selected' : '' }}>
                                                                                {{ $data->bank_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('bank_id')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-md-6">
                                                                <div>
                                                                    <label for="account_name">Account Name</label>
                                                                    <input type="text"
                                                                        class="form-control @error('account_name') is-invalid @enderror"
                                                                        name="account_name" id="account_name"
                                                                        placeholder="" value="{{ old('account_name') }}"
                                                                        autocomplete="off">
                                                                    @error('account_name')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-md-6">
                                                                <div>
                                                                    <label for="number_account">Settlement Number
                                                                        Account</label>
                                                                    <input type="text"
                                                                        class="form-control @error('number_account') is-invalid @enderror"
                                                                        name="number_account" id="number_account"
                                                                        placeholder=""
                                                                        value="{{ old('number_account') }}"
                                                                        autocomplete="off">
                                                                    @error('number_account')
                                                                        <span style="color: red;">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="{{ route('merchant.index') }}" class="btn btn-warning"><i
                                                    class="mdi mdi-arrow-left-thin"></i> Back</a>
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="mdi mdi-content-save"></i> SIMPAN</button>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Example</label>
                        <input type="text" id="example-pass" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Use</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        function form_change() {
            let type = $('select[name=merchant_type] option').filter(':selected').val()

            if (type == 'personal') {
                $('.merchant-bussiness').addClass('d-none');
            } else if (type == 'bussiness') {
                $('.merchant-bussiness').removeClass('d-none');
            }
        }
    </script>
    <script>
        const options_temp = '<option value="" selected disabled>-- Select --</option>';

        $('#provinsi').change(function() {
            $('#kota, #kecamatan, #kelurahan').html(options_temp);
            if ($(this).val() != "") {
                getKabupatenKota($(this).val());
            }
        })

        $('#kota').change(function() {
            $('#kecamatan, #kelurahan').html(options_temp);
            if ($(this).val() != "") {
                getKecamatan($(this).val());
            }

        })

        $('#kecamatan').change(function() {
            $('#kelurahan').html(options_temp);
            if ($(this).val() != "") {
                getKelurahan($(this).val());
            }
        })

        $('#kelurahan').change(function() {
            if ($(this).val() != "") {
                $('#zip_code').val($(this).find(':selected').data('pos'))
            } else {
                $('#zip_code').val('')
            }
        });


        function getKabupatenKota(provinsiId) {
            let url = '{{ route('api.kota', ':id') }}';
            url = url.replace(':id', provinsiId)
            $.ajax({
                url,
                method: 'GET',
                beforeSend: function() {
                    $('#kota').prop('disabled', true);
                },
                success: function(res) {
                    const options = res.data.map(value => {
                        return `<option value="${value.id}">${value.kabupaten_kota}</option>`
                    });
                    $('#kota').html(options_temp + options)
                    $('#kota').prop('disabled', false);
                },
                error: function(err) {
                    $('#kota').prop('disabled', false);
                    alert(JSON.stringify(err))
                }

            })
        }

        function getKecamatan(kotaId) {
            let url = '{{ route('api.kecamatan', ':id') }}';
            url = url.replace(':id', kotaId)
            $.ajax({
                url,
                method: 'GET',
                beforeSend: function() {
                    $('#kecamatan').prop('disabled', true);
                },
                success: function(res) {
                    const options = res.data.map(value => {
                        return `<option value="${value.id}">${value.kecamatan}</option>`
                    });
                    $('#kecamatan').html(options_temp + options);
                    $('#kecamatan').prop('disabled', false);
                },
                error: function(err) {
                    alert(JSON.stringify(err))
                    $('#kecamatan').prop('disabled', false);
                }
            })
        }

        function getKelurahan(kotaId) {
            let url = '{{ route('api.kelurahan', ':id') }}';
            url = url.replace(':id', kotaId)
            $.ajax({
                url,
                method: 'GET',
                beforeSend: function() {
                    $('#kelurahan').prop('disabled', true);
                },
                success: function(res) {
                    const options = res.data.map(value => {
                        return `<option value="${value.id}" data-pos="${value.kd_pos}">${value.kelurahan}</option>`
                    });
                    $('#kelurahan').html(options_temp + options);
                    $('#kelurahan').prop('disabled', false);
                },
                error: function(err) {
                    alert(JSON.stringify(err))
                    $('#kelurahan').prop('disabled', false);
                }
            })
        }

        function generatePassword() {
            let password = "";
            let passwordLength = 1;

            const lowerCase = 'abcdefghijklmnopqrstuvwxyz'
            for (let i = 0; i < passwordLength; i++) {
                const randomNumber = Math.floor(Math.random() * lowerCase.length);
                password += lowerCase.substring(randomNumber, randomNumber + 1);
            }

            passwordLength = 1;
            const number = '0123456789'
            for (let i = 0; i < passwordLength; i++) {
                const randomNumber = Math.floor(Math.random() * number.length);
                password += number.substring(randomNumber, randomNumber + 1);
            }

            passwordLength = 1;
            const upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            for (let i = 0; i < passwordLength; i++) {
                const randomNumber = Math.floor(Math.random() * upperCase.length);
                password += upperCase.substring(randomNumber, randomNumber + 1);
            }

            passwordLength = 1;
            const character = '!@#$%^&*()'
            for (let i = 0; i < passwordLength; i++) {
                const randomNumber = Math.floor(Math.random() * character.length);
                password += character.substring(randomNumber, randomNumber + 1);
            }

            const allChars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            passwordLength = 4;
            for (let i = 0; i < passwordLength; i++) {
                const randomNumber = Math.floor(Math.random() * allChars.length);
                password += allChars.substring(randomNumber, randomNumber + 1);
            }

            const shuffled = password.split('').sort(function() {
                return 0.5 - Math.random()
            }).join('');
            $('input#password').val(shuffled);
            $('input#password').attr('type', 'text')
        }

        function toggleShowPassword() {
            const type = $('input#password').attr('type');
            if (type === "password") {
                $('input#password').attr('type', 'text');
            } else {
                $('input#password').attr('type', 'password');
            }
        }
    </script>
@endpush
