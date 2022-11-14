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
                        <form action="{{ route('merchant.update', $merchant->id) }}" method="POST" enctype="multipart/form-data" id="form-merchant">
                            @csrf
                            @method('PUT')
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
                                                        <input type="text" class="form-control @error('nmid') is-invalid @enderror" name="nmid" id="nmid" placeholder="" value="{{ (old('nmid') ? old('nmid') : $merchant->nmid) }}" autocomplete="off" onchange="onValidation('nmid')">
                                                        <span class="d-none" style="color: red;" id="error-nmid"></span>
                                                        @error('nmid')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="merchant_name">Merchant Name</label>
                                                        <input type="text" class="form-control @error('merchant_name') is-invalid @enderror" name="merchant_name" id="merchant_name" placeholder="" value="{{ (old('merchant_name') ? old('merchant_name') : $merchant->merchant_name) }}" autocomplete="off" onchange="onValidation('merchant_name')">
                                                        <span class="d-none" style="color: red;" id="error-merchant_name"></span>
                                                        @error('merchant_name')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="merchant_email">Merchant Email</label>
                                                        <input type="text" class="form-control @error('merchant_email') is-invalid @enderror" name="merchant_email" id="merchant_email" placeholder="" value="{{ old('merchant_email') ? old('merchant_email') : $merchant->email  }}" autocomplete="off" onchange="onValidation('merchant_email')">
                                                        <span class="d-none" style="color: red;" id="error-merchant_email"></span>
                                                        @error('merchant_email')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="merchant_category_id">Merchant Category</label>
                                                        <select class="form-control @error('merchant_category_id') @enderror" name="merchant_category_id" id="merchant_category_id" onchange="onValidation('merchant_category_id')">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($merchant_category as $item)
                                                            <option value="{{ $item->id }}" {{ (old('merchant_category_id') ? old('merchant_category_id') : $merchant->merchant_category_id) == $item->id ? 'selected' : ''}}>{{ $item->merchants_category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="d-none" style="color: red;" id="error-merchant_category_id"></span>
                                                        @error('merchant_category_id')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="merchant_category_id">Merchant Type</label>
                                                        <select class="form-control @error('merchant_type') @enderror" name="merchant_type" id="merchant_type" onchange="form_change()">
                                                            <option value="">-- Select --</option>
                                                            <option value="bussiness" {{ $merchant->type == 'bussiness' ? 'selected' : ''  }}>Bussiness</option>
                                                            <option value="personal" {{ $merchant->type == 'personal' ? 'selected' : ''  }}>Personal</option>
                                                        </select>
                                                        <span class="d-none" style="color: red;" id="error-merchant_type"></span>
                                                        @error('merchant_type')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="bussiness_id">Bussiness</label>
                                                        <select class="form-control @error('bussiness_id') @enderror" name="bussiness_id" id="bussiness_id" onchange="onValidation('bussiness_id')">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($bussiness as $busines)
                                                            <option value="{{ $busines->id }}" {{ (old('busines_id') ? old('busines_id') : $merchant->bussiness_id) == $busines->id ? 'selected' : ''}}>{{ $busines->bussiness_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="d-none" style="color: red;" id="error-bussiness_id"></span>
                                                        @error('bussiness_id')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="mdr">Mdr</label>
                                                        <input type="number" step="0.01" class="form-control @error('mdr') is-invalid @enderror" name="mdr" id="mdr" placeholder="" value="{{ old('mdr') ? old('mdr') : $merchant->mdr }}" autocomplete="off" onchange="onValidation('mdr')">
                                                        <span class="d-none" style="color: red;" id="error-mdr"></span>
                                                        @error('mdr')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="phone">Phone</label>
                                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="" value="{{ old('phone') ? old('phone') : $merchant->phone }}" autocomplete="off" onchange="onValidation('phone')">
                                                        <span class="d-none" style="color: red;" id="error-phone"></span>
                                                        @error('phone')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                  <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="provinsi">Provinsi</label>
                                                        <select name="provinsi_id" id="provinsi" class="form-control">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}" {{ $province->id == $merchant->provinsi_id ? 'selected' : '' }}>{{ $province->provinsi
                                                                }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="d-none" style="color: red;" id="error-provinsi"></span>
                                                        @error('provinsi')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="kota">Kab/Kota</label>
                                                        <select name="kabkot_id" id="kota" class="form-control">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($kabkot as $item)
                                                            <option value="{{ $item->id }}" {{ $item->id == $merchant->kabkot_id ? 'selected' : '' }}>{{ $item->kabupaten_kota }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="d-none" style="color: red;" id="error-kota"></span>
                                                        @error('kota')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="kecamatan">Kecamatan</label>
                                                        <select name="kecamatan_id" id="kecamatan" class="form-control">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($kecamatans as $kecamatan)
                                                            <option value="{{ $kecamatan->id }}" {{ $kecamatan->id == $merchant->kecamatan_id ? 'selected' : '' }}>{{ $kecamatan->kecamatan }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="d-none" style="color: red;" id="error-kecamatan"></span>
                                                        @error('kecamatan')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="kelurahan">Kelurahan</label>
                                                        <select name="kelurahan_id" id="kelurahan" class="form-control">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($kelurahans as $kelurahan)
                                                            <option value="{{ $kelurahan->id }}" {{ $kelurahan->id == $merchant->kelurahan_id ? 'selected' : '' }}>{{ $kelurahan->kelurahan }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="d-none" style="color: red;" id="error-kelurahan"></span>
                                                        @error('kelurahan')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="address1">Address1</label>
                                                        <textarea name="address1" id="address1" rows="3" class="form-control @error('address1') is-invalid @enderror" placeholder="" value="{{ old('address1') }}" autocomplete="off" onchange="onValidation('address1')">{{ old('address1') ?  old('address1') : $merchant->address1 }}</textarea>
                                                        <span class="d-none" style="color: red;" id="error-address1"></span>
                                                        @error('address1')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="address2">Address2</label>
                                                        <textarea name="address2" id="address2" rows="3" class="form-control @error('address2') is-invalid @enderror" placeholder="" value="{{ old('address2') }}" autocomplete="off" onchange="onValidation('address2')">{{ old('address2') ?  old('address2') : $merchant->address2 }}</textarea>
                                                        <span class="d-none" style="color: red;" id="error-address2"></span>
                                                        @error('address2')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="zip_code">Zip Code</label>
                                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" id="zip_code" placeholder="" value="{{ old('zip_code') ? old('zip_code') : $merchant->zip_code }}" autocomplete="off" onchange="onValidation('zip_code')">
                                                        <span class="d-none" style="color: red;" id="error-zip_code"></span>
                                                        @error('zip_code')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <input type="hidden" name="is_active" id="is_active" value="nonactive">
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="note">Note</label>
                                                        <textarea name="note" id="note" rows="3" class="form-control @error('note') is-invalid @enderror" placeholder="" value="{{ old('note') }}" autocomplete="off" onchange="onValidation('note')">{{ old('note') ?  old('note') : $merchant->note }}</textarea>
                                                        <span class="d-none" style="color: red;" id="error-note"></span>
                                                        @error('note')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="" value="{{ old('password') }}" autocomplete="off" onchange="onValidation('password')">
                                                    <span class="d-none" style="color: red;" id="error-password"></span>
                                                    @error('password')
                                                    <span style="color: red;">{{ $message }}</span>
                                                    @enderror
                                                    <div class="my-1">
                                                        <button class="btn btn-sm btn-primary" type="button" onclick="generatePassword()">Generate Password</button>
                                                        <button class="btn btn-sm btn-secondary" type="button" onclick="toggleShowPassword()"><i
                                                                class="mdi mdi-eye"></i>
                                                        </button>
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
                                                                <label for="identity_card_photo" class="form-label">Foto KTP</label>
                                                                <input type="file" name="identity_card_photo" class="form-control @error('identity_card_photo') is-invalid @enderror" id="identity_card_photo" onchange="onValidation('identity_card_photo')">
                                                                <span class="d-none" style="color: red;" id="error-identity_card_photo"></span>
                                                                @error('identity_card_photo')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                                @if ($merchant->merchant_approve && $merchant->merchant_approve->identity_card_photo)
                                                                <a href="{{ Storage::url('public/backend/images/identity_card/'.$merchant->merchant_approve->identity_card_photo ) }}" target="_blank">Click to see images</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- End Foto KTP -->
                                                        <!-- Foto Selfie KTP -->
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="selfie_ktp_photo" class="form-label">Foto Selfie KTP</label>
                                                                <input type="file" name="selfie_ktp_photo" class="form-control @error('selfie_ktp_photo') is-invalid @enderror" id="selfie_ktp_photo" onchange="onValidation('selfie_ktp_photo')">
                                                                <span class="d-none" style="color: red;" id="error-selfie_ktp_photo"></span>
                                                                @error('selfie_ktp_photo')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                                @if ($merchant->merchant_approve && $merchant->merchant_approve->selfie_ktp_photo)
                                                                <a href="{{ Storage::url('public/backend/images/selfie_ktp/'.$merchant->merchant_approve->selfie_ktp_photo ) }}" target="_blank">Click to see images</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- End Foto Selfie KTP -->
                                                        <!-- NPWP -->
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="npwp_photo" class="form-label">Foto NPWP</label>
                                                                <input type="file" name="npwp_photo" class="form-control  @error('npwp_photo') is-invalid @enderror" id="npwp_photo" onchange="onValidation('npwp_photo')">
                                                                <span class="d-none" style="color: red;" id="error-npwp_photo"></span>
                                                                @error('npwp_photo')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                                @if ($merchant->merchant_approve && $merchant->merchant_approve->npwp_photo)
                                                                <a href="{{ Storage::url('public/backend/images/npwp/'.$merchant->merchant_approve->npwp_photo ) }}" target="_blank">Click to see images</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- End NPWP -->
                                                        <!-- Outlet -->
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="outlet_photo" class="form-label">Foto Outlet</label>
                                                                <input type="file" name="outlet_photo" class="form-control @error('outlet_photo') is-invalid @enderror" id="outlet_photo" onchange="onValidation('outlet_photo')">
                                                                <span class="d-none" style="color: red;" id="error-outlet_photo"></span>
                                                                @error('outlet_photo')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                                @if ($merchant->merchant_approve && $merchant->merchant_approve->outlet_photo)
                                                                <a href="{{ Storage::url('public/backend/images/outlet/'.$merchant->merchant_approve->outlet_photo ) }}" target="_blank">Click to see images</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- End Outlet -->
                                                        <!-- Owner + Outlet -->
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="owner_outlet_photo" class="form-label">Foto Owner + Outlet</label>
                                                                <input type="file" name="owner_outlet_photo" class="form-control @error('owner_outlet_photo') is-invalid @enderror" id="owner_outlet_photo" onchange="onValidation('owner_outlet_photo')">
                                                                <span class="d-none" style="color: red;" id="error-owner_outlet_photo"></span>
                                                                @error('owner_outlet_photo')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                                @if ($merchant->merchant_approve && $merchant->merchant_approve->owner_outlet_photo)
                                                                <a href="{{ Storage::url('public/backend/images/owner_outlet/'.$merchant->merchant_approve->owner_outlet_photo ) }}" target="_blank">Click to see images</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- End Owner + Outlet -->
                                                        <!-- In Outlet -->
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="in_outlet_photo" class="form-label">Foto Dalam Outlet</label>
                                                                <input type="file" name="in_outlet_photo" class="form-control @error('in_outlet_photo') is-invalid @enderror" id="in_outlet_photo" onchange="onValidation('in_outlet_photo')">
                                                                <span class="d-none" style="color: red;" id="error-in_outlet_photo"></span>
                                                                @error('in_outlet_photo')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                                @if ($merchant->merchant_approve && $merchant->merchant_approve->in_outlet_photo)
                                                                <a href="{{ Storage::url('public/backend/images/in_outlet/'.$merchant->merchant_approve->in_outlet_photo ) }}" target="_blank">Click to see images</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- End In Outlet -->
                                                        <!-- Sertifikat domisili -->
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="certificate_of_domicile" class="form-label">Sertifikat Domisili (SKD / SITU)</label>
                                                                <input type="file" name="certificate_of_domicile" class="form-control @error('certificate_of_domicile') is-invalid @enderror" id="certificate_of_domicile" onchange="onValidation('certificate_of_domicile')">
                                                                <span class="d-none" style="color: red;" id="error-certificate_of_domicile"></span>
                                                                @error('certificate_of_domicile')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                                @if ($merchant->merchant_approve && $merchant->merchant_approve->certificate_of_domicile)
                                                                <a href="{{ Storage::url('public/backend/images/certificate_of_domicile/'.$merchant->merchant_approve->certificate_of_domicile ) }}" target="_blank">Click to see images</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- End Sertifikat Domisili -->
                                                        <!-- Foto Buku Rekening -->
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="copy_bank_account_book" class="form-label">Foto Buku Rekening</label>
                                                                <input type="file" name="copy_bank_account_book" class="form-control @error('copy_bank_account_book') is-invalid @enderror" id="copy_bank_account_book" onchange="onValidation('copy_bank_account_book')">
                                                                <span class="d-none" style="color: red;" id="error-copy_bank_account_book"></span>
                                                                @error('copy_bank_account_book')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                                @if ($merchant->merchant_approve && $merchant->merchant_approve->copy_bank_account_book)
                                                                <a href="{{ Storage::url('public/backend/images/copy_bank_account_book/'.$merchant->merchant_approve->copy_bank_account_book ) }}" target="_blank">Click to see images</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- End Foto Buku Rekening -->
                                                        <!-- Sertifikat Bukti Kepemilikan -->
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="copy_proof_ownership" class="form-label">Surat Sewa / Bukti Kepemilikan</label>
                                                                <input type="file" name="copy_proof_ownership" class="form-control @error('copy_proof_ownership') is-invalid @enderror" id="copy_proof_ownership" onchange="onValidation('copy_proof_ownership')">
                                                                <span class="d-none" style="color: red;" id="error-copy_proof_ownership"></span>
                                                                @error('copy_proof_ownership')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                                @if ($merchant->merchant_approve && $merchant->merchant_approve->copy_proof_ownership)
                                                                <a href="{{ Storage::url('public/backend/images/copy_proof_ownership/'.$merchant->merchant_approve->copy_proof_ownership ) }}" target="_blank">Click to see images</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- End Sertifikat Kemepilikan -->
                                                        <!-- SIUP / Surat Ijin Usaha -->
                                                        <div class="col-md-3 col-md-6 merchant-bussiness d-none">
                                                            <div>
                                                                <label for="siup_photo" class="form-label">SIUP / Surat Ijin Usaha</label>
                                                                <input type="file" name="siup_photo" class="form-control @error('siup_photo') is-invalid @enderror" id="siup_photo" onchange="onValidation('siup_photo')">
                                                                <span class="d-none" style="color: red;" id="error-siup_photo"></span>
                                                                @error('siup_photo')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                                @if ($merchant->merchant_approve && $merchant->merchant_approve->siup_photo)
                                                                <a href="{{ Storage::url('public/backend/images/siup_photo/'.$merchant->merchant_approve->siup_photo ) }}" target="_blank">Click to see images</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- End SIUP / Surat Ijin Usaha -->
                                                        <!-- TDP -->
                                                        <div class="col-md-3 col-md-6 merchant-bussiness d-none">
                                                            <div>
                                                                <label for="tdp_photo" class="form-label">TDP</label>
                                                                <input type="file" name="tdp_photo" class="form-control @error('tdp_photo') is-invalid @enderror" id="tdp_photo" onchange="onValidation('tdp_photo')">
                                                                <span class="d-none" style="color: red;" id="error-tdp_photo"></span>
                                                                @error('tdp_photo')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                                @if ($merchant->merchant_approve && $merchant->merchant_approve->tdp_photo)
                                                                <a href="{{ Storage::url('public/backend/images/tdp_photo/'.$merchant->merchant_approve->tdp_photo ) }}" target="_blank">Click to see images</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- End TDP -->
                                                        <!-- Akta Pendirian Perusahaan -->
                                                        <div class="col-md-3 col-md-6 merchant-bussiness d-none">
                                                            <div>
                                                                <label for="copy_corporation_deed" class="form-label">Akta Pendirian Perusahaan</label>
                                                                <input type="file" name="copy_corporation_deed" class="form-control @error('copy_corporation_deed') is-invalid @enderror" id="copy_corporation_deed" onchange="onValidation('copy_corporation_deed')">
                                                                <span class="d-none" style="color: red;" id="error-copy_corporation_deed"></span>
                                                                @error('copy_corporation_deed')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                                @if ($merchant->merchant_approve && $merchant->merchant_approve->copy_corporation_deed)
                                                                <a href="{{ Storage::url('public/backend/images/copy_corporation_deed/'.$merchant->merchant_approve->copy_corporation_deed ) }}" target="_blank">Click to see images</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- End Akta Pendirian Perusahaan -->
                                                        <!-- Akta Pengurus Perusahaan -->
                                                        <div class="col-md-3 col-md-6 merchant-bussiness d-none">
                                                            <div>
                                                                <label for="copy_management_deed" class="form-label">Akta Pengurus Perusahaan</label>
                                                                <input type="file" name="copy_management_deed" class="form-control @error('copy_management_deed') is-invalid @enderror" id="copy_management_deed" onchange="onValidation('copy_management_deed')">
                                                                <span class="d-none" style="color: red;" id="error-copy_management_deed"></span>
                                                                @error('copy_management_deed')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                                @if ($merchant->merchant_approve && $merchant->merchant_approve->copy_management_deed)
                                                                <a href="{{ Storage::url('public/backend/images/copy_management_deed/'.$merchant->merchant_approve->copy_management_deed ) }}" target="_blank">Click to see images</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- End Akta Pengurus Perusahaan -->
                                                        <!-- Akta Pengurus Perusahaan -->
                                                        <div class="col-md-3 col-md-6 merchant-bussiness d-none">
                                                            <div>
                                                                <label for="copy_sk_menkeh" class="form-label">SK Menkeh / Depkumham</label>
                                                                <input type="file" name="copy_sk_menkeh" class="form-control @error('copy_sk_menkeh') is-invalid @enderror" id="copy_sk_menkeh" onchange="onValidation('copy_sk_menkeh')">
                                                                <span class="d-none" style="color: red;" id="error-copy_sk_menkeh"></span>
                                                                @error('copy_sk_menkeh')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                                @if ($merchant->merchant_approve && $merchant->merchant_approve->copy_sk_menkeh)
                                                                <a href="{{ Storage::url('public/backend/images/copy_sk_menkeh/'.$merchant->merchant_approve->copy_sk_menkeh ) }}" target="_blank">Click to see images</a>
                                                                @endif
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
                                                                <select class="form-control @error('rek_pooling_id') @enderror" name="rek_pooling_id" id="rek_pooling_id" onchange="onValidation('rek_pooling_id')">
                                                                    <option value="">-- Select --</option>
                                                                    @foreach ($rek_pooling as $rekening)
                                                                    <option value="{{ $rekening->id }}" {{ (old('rek_pooling_id') ? old('rek_pooling_id') : $merchant->rek_pooling_id) == $rekening->id ? 'selected' : ''}}>{{ $rekening->rek_pooling_code }} - {{ $rekening->account_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="d-none" style="color: red;" id="error-rek_pooling_id"></span>
                                                                @error('rek_pooling_id')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="bank_id">Settlement Account</label>
                                                                <select class="form-control @error('bank_id') @enderror" name="bank_id" id="bank_id" onchange="onValidation('bank_id')">
                                                                    <option value="">-- Select --</option>
                                                                    @foreach ($bank as $data)
                                                                    <option value="{{ $data->id }}" {{ (old('bank_id') ? old('bank_id') : $merchant->bank_id) == $data->id ? 'selected' : ''}}>{{ $data->bank_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="d-none" style="color: red;" id="error-bank_id"></span>
                                                                @error('bank_id')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="account_name">Account Name</label>
                                                                <input type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name" id="account_name" placeholder=""value="{{ old('account_name') ? old('account_name') : $merchant->account_name }}" autocomplete="off" onchange="onValidation('account_name')">
                                                                <span class="d-none" style="color: red;" id="error-account_name"></span>
                                                                @error('account_name')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="number_account">Settlement Number Account</label>
                                                                <input type="text" class="form-control @error('number_account') is-invalid @enderror" name="number_account" id="number_account" placeholder="" value="{{ old('number_account') ? old('number_account') : $merchant->number_account }}" autocomplete="off" onchange="onValidation('number_account')">
                                                                <span class="d-none" style="color: red;" id="error-number_account"></span>
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
                                        <a href="{{ route('merchant.index') }}" class="btn btn-warning"><i class="mdi mdi-arrow-left-thin"></i> Back</a>
                                        <button type="submit" class="btn btn-primary" id="submit-merchant"><i class="mdi mdi-content-save"></i> SIMPAN</button>
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
@push('js')
<script>
    function form_change() {
        let type = $('select[name=merchant_type] option').filter(':selected').val()

        if (type == 'personal') {
            $('.merchant-bussiness').addClass('d-none');
        } else if(type == 'bussiness') {
            $('.merchant-bussiness').removeClass('d-none');
        }

        onValidation('merchant_type')
    }
</script>

<script>
    const options_temp ='<option value="" selected disabled>-- Select --</option>';

    $('#provinsi').change(function(){
        $('#kota, #kecamatan, #kelurahan').html(options_temp);
        if($(this).val() != ""){
            getKabupatenKota($(this).val());
        }
        onValidation('provinsi')
    })

    $('#kota').change(function(){
        $('#kecamatan, #kelurahan').html(options_temp);
        if($(this).val() != ""){
            getKecamatan($(this).val());
        }
        onValidation('kota')
    })

    $('#kecamatan').change(function(){
        $('#kelurahan').html(options_temp);
        if($(this).val() != ""){
            getKelurahan($(this).val());
        }
        onValidation('kecamatan')
    })

    $('#kelurahan').change(function(){
        if($(this).val() != ""){
            $('#zip_code').val($(this).find(':selected').data('pos'))
        }else{
            $('#zip_code').val('')
        }
        onValidation('kelurahan')
    });


    function getKabupatenKota (provinsiId){
        let url = '{{ route("api.kota", ":id") }}';
        url = url.replace(':id', provinsiId)
        $.ajax({
            url,
            method: 'GET',
            beforeSend: function(){
                $('#kota').prop('disabled', true);
            },
            success: function(res){
                const options = res.data.map(value => {
                    return `<option value="${value.id}">${value.kabupaten_kota}</option>`
                });
                $('#kota').html(options_temp+options)
                $('#kota').prop('disabled', false);
            },
            error: function(err){
                $('#kota').prop('disabled', false);
                alert(JSON.stringify(err))
            }

        })
    }

    function getKecamatan (kotaId){
        let url = '{{ route("api.kecamatan", ":id") }}';
        url = url.replace(':id', kotaId)
        $.ajax({
            url,
            method: 'GET',
            beforeSend: function(){
                $('#kecamatan').prop('disabled', true);
            },
            success: function(res){
                const options = res.data.map(value => {
                    return `<option value="${value.id}">${value.kecamatan}</option>`
                });
                $('#kecamatan').html(options_temp+options);
                $('#kecamatan').prop('disabled', false);
            },
            error: function(err){
                alert(JSON.stringify(err))
                $('#kecamatan').prop('disabled', false);
            }
        })
    }

    function getKelurahan (kotaId){
        let url = '{{ route("api.kelurahan", ":id") }}';
        url = url.replace(':id', kotaId)
        $.ajax({
            url,
            method: 'GET',
            beforeSend: function(){
                $('#kelurahan').prop('disabled', true);
            },
            success: function(res){
                const options = res.data.map(value => {
                    return `<option value="${value.id}" data-pos="${value.kd_pos}">${value.kelurahan}</option>`
                });
                $('#kelurahan').html(options_temp+options);
                $('#kelurahan').prop('disabled', false);
            },
            error: function(err){
                alert(JSON.stringify(err))
                $('#kelurahan').prop('disabled', false);
            }
        })
    }

    function generatePassword (){
        let password = "";
        let passwordLength = 1;

        const lowerCase = 'abcdefghijklmnopqrstuvwxyz'
        for (let i = 0; i < passwordLength; i++) {
            const randomNumber=Math.floor(Math.random() * lowerCase.length);
            password+=lowerCase.substring(randomNumber, randomNumber +1);
        }

        passwordLength = 1;
        const number = '0123456789'
        for (let i = 0; i < passwordLength; i++) {
            const randomNumber=Math.floor(Math.random() * number.length);
            password+=number.substring(randomNumber, randomNumber +1);
        }

        passwordLength = 1;
        const upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
        for (let i = 0; i < passwordLength; i++) {
            const randomNumber=Math.floor(Math.random() * upperCase.length);
            password+=upperCase.substring(randomNumber, randomNumber +1);
        }

        passwordLength = 1;
        const character = '!@#$%^&*()'
        for (let i = 0; i < passwordLength; i++) {
            const randomNumber=Math.floor(Math.random() * character.length);
            password+=character.substring(randomNumber, randomNumber +1);
        }

        const allChars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        passwordLength = 4;
        for (let i = 0; i < passwordLength; i++) {
            const randomNumber = Math.floor(Math.random() * allChars.length);
            password += allChars.substring(randomNumber, randomNumber +1);
        }

        const shuffled = password.split('').sort(function(){return 0.5-Math.random()}).join('');
        $('input#password').val(shuffled);
        $('input#password').attr('type', 'text')
    }

    function toggleShowPassword (){
        const type = $('input#password').attr('type');
        if (type === "password") {
            $('input#password').attr('type', 'text');
        } else {
            $('input#password').attr('type', 'password');
        }
    }

</script>

<script>
function onValidation(input_id) {
    var form = new FormData();
    var input = document.querySelector(`#${input_id}`);
    var input_name = input.getAttribute('name');
    var input_value = input.value;

    if (input.tagName == 'INPUT' && input.getAttribute('type') == 'file') {
        form.append(input_name, input.files[0]);
    } else {
        form.append(input_name, input_value);
    }

    if (form) {
        $.ajax({
            type: 'POST',
            url : "{{ route('merchant.update', $merchant->id) }}",
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            data : form,
            success: function(result) {
                if (result.success) {
                    $(`#error-${input_id}`).addClass('d-none');
                } else {
                    $(`#error-${input_id}`).removeClass('d-none');
                }
            } ,error:function(err) {
                $(`#error-${input_id}`).removeClass('d-none').text(err.responseJSON.message);
            }
        });
    }
}
</script>
@endpush
