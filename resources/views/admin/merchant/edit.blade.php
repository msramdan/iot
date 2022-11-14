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
                                                        <input type="text" class="form-control @error('nmid') is-invalid @enderror" name="nmid" id="nmid" placeholder="" value="{{ (old('nmid') ? old('nmid') : $merchant->nmid) }}" autocomplete="off">
                                                        <span class="d-none" style="color: red;" id="error-nmid"></span>
                                                        @error('nmid')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="merchant_name">Merchant Name</label>
                                                        <input type="text" class="form-control @error('merchant_name') is-invalid @enderror" name="merchant_name" id="merchant_name" placeholder="" value="{{ (old('merchant_name') ? old('merchant_name') : $merchant->merchant_name) }}" autocomplete="off">
                                                        <span class="d-none" style="color: red;" id="error-merchant_name"></span>
                                                        @error('merchant_name')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="merchant_email">Merchant Email</label>
                                                        <input type="text" class="form-control @error('merchant_email') is-invalid @enderror" name="merchant_email" id="merchant_email" placeholder="" value="{{ old('merchant_email') ? old('merchant_email') : $merchant->email  }}" autocomplete="off">
                                                        <span class="d-none" style="color: red;" id="error-merchant_email"></span>
                                                        @error('merchant_email')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="merchant_category_id">Merchant Category</label>
                                                        <select class="form-control @error('merchant_category_id') @enderror" name="merchant_category_id" id="merchant_category_id">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($merchant_category as $item)
                                                            <option value="{{ $item->id }}" {{ (old('merchant_category_id') ? old('merchant_category_id') : $merchant->merchant_category_id) == $item->id ? 'selected' : ''}}>{{ $item->merchants_category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="d-none" style="color: red;" id="error-merchant_category"></span>
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
                                                        <select class="form-control @error('bussiness_id') @enderror" name="bussiness_id" id="bussiness_id">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($bussiness as $busines)
                                                            <option value="{{ $busines->id }}" {{ (old('busines_id') ? old('busines_id') : $merchant->bussiness_id) == $busines->id ? 'selected' : ''}}>{{ $busines->bussiness_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="d-none" style="color: red;" id="error-bussiness"></span>
                                                        @error('bussiness_id')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="mdr">Mdr</label>
                                                        <input type="number" step="0.01" class="form-control @error('mdr') is-invalid @enderror" name="mdr" id="mdr" placeholder="" value="{{ old('mdr') ? old('mdr') : $merchant->mdr }}" autocomplete="off">
                                                        <span class="d-none" style="color: red;" id="error-mdr"></span>
                                                        @error('mdr')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="phone">Phone</label>
                                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="" value="{{ old('phone') ? old('phone') : $merchant->phone }}" autocomplete="off">
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
                                                        <textarea name="address1" id="address1" rows="3" class="form-control @error('address1') is-invalid @enderror" placeholder="" value="{{ old('address1') }}" autocomplete="off">{{ old('address1') ?  old('address1') : $merchant->address1 }}</textarea>
                                                        <span class="d-none" style="color: red;" id="error-address1"></span>
                                                        @error('address1')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="address2">Address2</label>
                                                        <textarea name="address2" id="address2" rows="3" class="form-control @error('address2') is-invalid @enderror" placeholder="" value="{{ old('address2') }}" autocomplete="off">{{ old('address2') ?  old('address2') : $merchant->address2 }}</textarea>
                                                        <span class="d-none" style="color: red;" id="error-address2"></span>
                                                        @error('address2')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <div>
                                                        <label for="zip_code">Zip Code</label>
                                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" id="zip_code" placeholder="" value="{{ old('zip_code') ? old('zip_code') : $merchant->zip_code }}" autocomplete="off">
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
                                                        <textarea name="note" id="note" rows="3" class="form-control @error('note') is-invalid @enderror" placeholder="" value="{{ old('note') }}" autocomplete="off">{{ old('note') ?  old('note') : $merchant->note }}</textarea>
                                                        <span class="d-none" style="color: red;" id="error-note"></span>
                                                        @error('note')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-6">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="" value="{{ old('password') }}" autocomplete="off">
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
                                                                <input type="file" name="identity_card_photo" class="form-control @error('identity_card_photo') is-invalid @enderror" id="identity_card_photo">
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
                                                                <input type="file" name="selfie_ktp_photo" class="form-control @error('selfie_ktp_photo') is-invalid @enderror" id="selfie_ktp_photo">
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
                                                                <input type="file" name="npwp_photo" class="form-control  @error('npwp_photo') is-invalid @enderror" id="npwp_photo">
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
                                                                <input type="file" name="outlet_photo" class="form-control @error('outlet_photo') is-invalid @enderror" id="outlet_photo">
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
                                                                <input type="file" name="owner_outlet_photo" class="form-control @error('owner_outlet_photo') is-invalid @enderror" id="owner_outlet_photo">
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
                                                                <input type="file" name="in_outlet_photo" class="form-control @error('in_outlet_photo') is-invalid @enderror" id="in_outlet_photo">
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
                                                                <input type="file" name="certificate_of_domicile" class="form-control @error('certificate_of_domicile') is-invalid @enderror" id="certificate_of_domicile">
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
                                                                <input type="file" name="copy_bank_account_book" class="form-control @error('copy_bank_account_book') is-invalid @enderror" id="copy_bank_account_book">
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
                                                                <input type="file" name="copy_proof_ownership" class="form-control @error('copy_proof_ownership') is-invalid @enderror" id="basiInput">
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
                                                                <input type="file" name="siup_photo" class="form-control @error('siup_photo') is-invalid @enderror" id="siup_photo">
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
                                                                <input type="file" name="tdp_photo" class="form-control @error('tdp_photo') is-invalid @enderror" id="tdp_photo">
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
                                                                <input type="file" name="copy_corporation_deed" class="form-control @error('copy_corporation_deed') is-invalid @enderror" id="basiInput">
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
                                                                <input type="file" name="copy_management_deed" class="form-control @error('copy_management_deed') is-invalid @enderror" id="copy_management_deed">
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
                                                                <input type="file" name="copy_sk_menkeh" class="form-control @error('copy_sk_menkeh') is-invalid @enderror" id="copy_sk_menkeh">
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
                                                                <select class="form-control @error('rek_pooling_id') @enderror" name="rek_pooling_id" id="rek_pooling_id">
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
                                                                <select class="form-control @error('bank_id') @enderror" name="bank_id" id="bank_id">
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
                                                                <input type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name" id="account_name" placeholder=""value="{{ old('account_name') ? old('account_name') : $merchant->account_name }}" autocomplete="off">
                                                                <span class="d-none" style="color: red;" id="error-account_name"></span>
                                                                @error('account_name')
                                                                <span style="color: red;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-md-6">
                                                            <div>
                                                                <label for="number_account">Settlement Number Account</label>
                                                                <input type="text" class="form-control @error('number_account') is-invalid @enderror" name="number_account" id="number_account" placeholder="" value="{{ old('number_account') ? old('number_account') : $merchant->number_account }}" autocomplete="off">
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
                                        <button type="button" class="btn btn-primary" id="submit-merchant"><i class="mdi mdi-content-save"></i> SIMPAN</button>
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
    }
</script>

<script>
    const options_temp ='<option value="" selected disabled>-- Select --</option>';

    $('#provinsi').change(function(){
        $('#kota, #kecamatan, #kelurahan').html(options_temp);
        if($(this).val() != ""){
            getKabupatenKota($(this).val());
        }
    })

    $('#kota').change(function(){
        $('#kecamatan, #kelurahan').html(options_temp);
        if($(this).val() != ""){
            getKecamatan($(this).val());
        }

    })

    $('#kecamatan').change(function(){
        $('#kelurahan').html(options_temp);
        if($(this).val() != ""){
            getKelurahan($(this).val());
        }
    })

    $('#kelurahan').change(function(){
        if($(this).val() != ""){
            $('#zip_code').val($(this).find(':selected').data('pos'))
        }else{
            $('#zip_code').val('')
        }
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
    $('#submit-merchant').click(function () {
    event.preventDefault();
    let nmid = $('#nmid').val();
    let merchant_name = $('#merchant_name').val();
    let merchant_email = $('#merchant_email').val();
    let merchant_category = $('select[name=merchant_category_id] option').filter(':selected').val();
    let merchant_type = $('select[name=merchant_type] option').filter(':selected').val();
    let bussiness = $('select[name=bussiness_id] option').filter(':selected').val();
    let mdr = $('#mdr').val();
    let phone = $('#phone').val();
    let provinsi = $('select[name=provinsi_id] option').filter(':selected').val();
    let kota = $('select[name=kabkot_id] option').filter(':selected').val();
    let kecamatan = $('select[name=kecamatan_id] option').filter(':selected').val();
    let kelurahan = $('select[name=kelurahan_id] option').filter(':selected').val();
    let address1 = $('#address1').val();
    let address2 = $('#address2').val();
    let zip_code = $('#zip_code').val();
    let note = $('#note').val();
    let password = $('#password').val();
    let bank = $('select[name=bank_id] option').filter(':selected').val();
    let number_account = $('#number_account').val();
    let account_name = $('#account_name').val();
    let identity_card_photo = $('#identity_card_photo').val();
    let selfie_ktp_photo = $('#selfie_ktp_photo').val();
    let npwp_photo = $('#npwp_photo').val();
    let outlet_photo = $('#outlet_photo').val();
    let owner_outlet_photo = $('#owner_outlet_photo').val();
    let in_outlet_photo = $('#in_outlet_photo').val();
    let certificate_of_domicile = $('#certificate_of_domicile').val();
    let copy_bank_account_book = $('#copy_bank_account_book').val();
    let copy_proof_ownership = $('#copy_proof_ownership').val();
    let siup_photo = $('#siup_photo').val();
    let tdp_photo = $('#tdp_photo').val();
    let copy_corporation_deed = $('#copy_corporation_deed').val();
    let copy_management_deed = $('#copy_management_deed').val();
    let copy_sk_menkeh = $('#copy_sk_menkeh').val();
    let rek_pooling = $('select[name=rek_pooling_id] option').filter(':selected').val();
    let error_message = [];

    if (['undefined', '', null].includes(nmid)) {
        error_message.push('nmid');
        $('#nmid').addClass('is-invalid');
        $('#error-nmid').removeClass('d-none').text('NMID field is required')
    } else {
        $('#nmid').removeClass('is-invalid');
        $('#error-nmid').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(mdr)) {
        error_message.push('mdr');
        $('#mdr').addClass('is-invalid');
        $('#error-mdr').removeClass('d-none').text('MDR field is required')
    } else {
        $('#mdr').removeClass('is-invalid');
        $('#error-mdr').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(merchant_name)) {
        error_message.push('merchant_name');
        $('#merchant_name').addClass('is-invalid');
        $('#error-merchant_name').removeClass('d-none').text('Merchant name field is required')
    } else {
        $('#merchant_name').removeClass('is-invalid');
        $('#error-merchant_name').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(merchant_type)) {
        error_message.push('merchant_type');
        $('#merchant_type').addClass('is-invalid');
        $('#error-merchant_type').removeClass('d-none').text('Merchant name field is required')
    } else {
        $('#merchant_type').removeClass('is-invalid');
        $('#error-merchant_type').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(merchant_email)) {
        error_message.push('merchant_email');
        $('#email').addClass('is-invalid');
        $('#error-email').removeClass('d-none').text('Email field is required')
    } else {
        if (!validateEmail(merchant_email)) {
            error_message.push('merchant_email');
            $('#email').addClass('is-invalid');
            $('#error-email').removeClass('d-none').text('Email is not valid');
        } else {
            $('#email').removeClass('is-invalid');
            $('#error-email').addClass('d-none').text('');
        }
    }

    if (['undefined', '', null].includes(phone)) {
        error_message.push('phone');
        $('#phone').addClass('is-invalid');
        $('#error-phone').removeClass('d-none').text('Phone field is required')
    } else {
        $('#phone').removeClass('is-invalid');
        $('#error-phone').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(provinsi)) {
        error_message.push('provinsi');
        $('#provinsi').addClass('is-invalid');
        $('#error-provinsi').removeClass('d-none').text('Provinsi field is required')
    } else {
        $('#provinsi').removeClass('is-invalid');
        $('#error-provinsi').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(kota)) {
        error_message.push('kota');
        $('#kota').addClass('is-invalid');
        $('#error-kota').removeClass('d-none').text('Kota / Kabupaten field is required')
    } else {
        $('#kota').removeClass('is-invalid');
        $('#error-kota').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(kecamatan)) {
        error_message.push('kecamatan');
        $('#kecamatan').addClass('is-invalid');
        $('#error-kecamatan').removeClass('d-none').text('Kecamatan field is required')
    } else {
        $('#kecamatan').removeClass('is-invalid');
        $('#error-kecamatan').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(kelurahan)) {
        error_message.push('kelurahan');
        $('#kelurahan').addClass('is-invalid');
        $('#error-kelurahan').removeClass('d-none').text('Kelurahan field is required')
    } else {
        $('#kelurahan').removeClass('is-invalid');
        $('#error-kelurahan').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(zip_code)) {
        error_message.push('zip_code');
        $('#zip_code').addClass('is-invalid');
        $('#error-zip_code').removeClass('d-none').text('Zip Code field is required')
    } else {
        $('#zip_code').removeClass('is-invalid');
        $('#error-zip_code').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(address1)) {
        error_message.push('address1');
        $('#address1').addClass('is-invalid');
        $('#error-address1').removeClass('d-none').text('Address1 field is required')
    } else {
        $('#address1').removeClass('is-invalid');
        $('#error-address1').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(address2)) {
        error_message.push('address2');
        $('#address2').addClass('is-invalid');
        $('#error-address2').removeClass('d-none').text('Address2 field is required')
    } else {
        $('#address2').removeClass('is-invalid');
        $('#error-address2').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(merchant_category)) {
        error_message.push('merchant_category');
        $('#merchant_category').addClass('is-invalid');
        $('#error-merchant_category').removeClass('d-none').text('Merchant Category field is required')
    } else {
        $('#merchant_category').removeClass('is-invalid');
        $('#error-merchant_category').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(bussiness)) {
        error_message.push('bussiness');
        $('#bussiness').addClass('is-invalid');
        $('#error-bussiness').removeClass('d-none').text('Bussiness field is required')
    } else {
        $('#bussiness').removeClass('is-invalid');
        $('#error-bussiness').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(bank)) {
        error_message.push('bank');
        $('#bank_id').addClass('is-invalid');
        $('#error-bank_id').removeClass('d-none').text('Bank field is required')
    } else {
        $('#bank_id').removeClass('is-invalid');
        $('#error-bank_id').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(number_account)) {
        error_message.push('number_account');
        $('#number_account').addClass('is-invalid');
        $('#error-number-account').removeClass('d-none').text('Number account field is required')
    } else {
        $('#number_account').removeClass('is-invalid');
        $('#error-number-account').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(account_name)) {
        error_message.push('account_name');
        $('#account_name').addClass('is-invalid');
        $('#error-account_name').removeClass('d-none').text('Account Name field is required')
    } else {
        $('#account_name').removeClass('is-invalid');
        $('#error-account_name').addClass('d-none').text('');
    }

    if (['undefined', '', null].includes(password)) {
        error_message.push('password');
        $('#password').addClass('is-invalid');
        $('#error-password').removeClass('d-none').text('Password field is required')
    } else {
        $('#password').removeClass('is-invalid');
        $('#error-password').addClass('d-none').text('');
    }

    // if (['undefined', '', null].includes(identity_card_photo)) {
    //     error_message.push('identity_card_photo');
    //     $('#identity_card_photo').addClass('is-invalid');
    //     $('#error-identity_card_photo').removeClass('d-none').text('Identity Card photo field is required')
    // } else {
    //     $('#identity_card_photo').removeClass('is-invalid');
    //     $('#error-identity_card_photo').addClass('d-none').text('');
    // }

    // if (['undefined', '', null].includes(selfie_ktp_photo)) {
    //     error_message.push('selfie_ktp_photo');
    //     $('#selfie_ktp_photo').addClass('is-invalid');
    //     $('#error-selfie_ktp_photo').removeClass('d-none').text('Selfie KTP photo field is required')
    // } else {
    //     $('#selfie_ktp_photo').removeClass('is-invalid');
    //     $('#error-selfie_ktp_photo').addClass('d-none').text('');
    // }

    // if (['undefined', '', null].includes(npwp_photo)) {
    //     error_message.push('npwp_photo');
    //     $('#npwp_photo').addClass('is-invalid');
    //     $('#error-npwp_photo').removeClass('d-none').text('NPWP Photo field is required')
    // } else {
    //     $('#npwp_photo').removeClass('is-invalid');
    //     $('#error-npwp_photo').addClass('d-none').text('');
    // }

    // if (['undefined', '', null].includes(outlet_photo)) {
    //     error_message.push('outlet_photo');
    //     $('#outlet_photo').addClass('is-invalid');
    //     $('#error-outlet_photo').removeClass('d-none').text('Outlet Photo field is required')
    // } else {
    //     $('#outlet_photo').removeClass('is-invalid');
    //     $('#error-outlet_photo').addClass('d-none').text('');
    // }

    // if (['undefined', '', null].includes(owner_outlet_photo)) {
    //     error_message.push('owner_outlet_photo');
    //     $('#owner_outlet_photo').addClass('is-invalid');
    //     $('#error-owner_outlet_photo').removeClass('d-none').text('Owner Outlet Photo field is required')
    // } else {
    //     $('#owner_outlet_photo').removeClass('is-invalid');
    //     $('#error-owner_outlet_photo').addClass('d-none').text('');
    // }

    // if (['undefined', '', null].includes(in_outlet_photo)) {
    //     error_message.push('in_outlet_photo');
    //     $('#in_outlet_photo').addClass('is-invalid');
    //     $('#error-in_outlet_photo').removeClass('d-none').text('In Outlet Photo field is required')
    // } else {
    //     $('#in_outlet_photo').removeClass('is-invalid');
    //     $('#error-in_outlet_photo').addClass('d-none').text('');
    // }

    // if (['undefined', '', null].includes(certificate_of_domicile)) {
    //     error_message.push('certificate_of_domicile');
    //     $('#certificate_of_domicile').addClass('is-invalid');
    //     $('#error-certificate_of_domicile').removeClass('d-none').text('Certificate of domicile field is required')
    // } else {
    //     $('#certificate_of_domicile').removeClass('is-invalid');
    //     $('#error-certificate_of_domicile').addClass('d-none').text('');
    // }

    // if (['undefined', '', null].includes(copy_bank_account_book)) {
    //     error_message.push('copy_bank_account_book');
    //     $('#copy_bank_account_book').addClass('is-invalid');
    //     $('#error-copy_bank_account_book').removeClass('d-none').text('Copy Bank Account Book field is required')
    // } else {
    //     $('#copy_bank_account_book').removeClass('is-invalid');
    //     $('#error-copy_bank_account_book').addClass('d-none').text('');
    // }

    // if (['undefined', '', null].includes(copy_proof_ownership)) {
    //     error_message.push('copy_proof_ownership');
    //     $('#copy_proof_ownership').addClass('is-invalid');
    //     $('#error-copy_proof_ownership').removeClass('d-none').text('Copy Proof Ownership field is required')
    // } else {
    //     $('#copy_proof_ownership').removeClass('is-invalid');
    //     $('#error-copy_proof_ownership').addClass('d-none').text('');
    // }

    if (['undefined', '', null].includes(rek_pooling)) {
        error_message.push('rek_pooling_id');
        $('#rek_pooling_id').addClass('is-invalid');
        $('#error-rek_pooling_id').removeClass('d-none').text('Copy SK Menkeh field is required')
    } else {

        $('#rek_pooling_id').removeClass('is-invalid');
        $('#error-rek_pooling_id').addClass('d-none').text('');
    }

    // if (merchant_type == 'bussiness') {
    //     if (['undefined', '', null].includes(siup_photo)) {
    //         error_message.push('siup_photo');
    //         $('#siup_photo').addClass('is-invalid');
    //         $('#error-siup_photo').removeClass('d-none').text('Siup Photo field is required')
    //     } else {
    //         $('#siup_photo').removeClass('is-invalid');
    //         $('#error-siup_photo').addClass('d-none').text('');
    //     }

    //     if (['undefined', '', null].includes(tdp_photo)) {
    //         error_message.push('tdp_photo');
    //         $('#tdp_photo').addClass('is-invalid');
    //         $('#error-tdp_photo').removeClass('d-none').text('Tdp Photo field is required')
    //     } else {
    //         $('#tdp_photo').removeClass('is-invalid');
    //         $('#error-tdp_photo').addClass('d-none').text('');
    //     }

    //     if (['undefined', '', null].includes(copy_corporation_deed)) {
    //         error_message.push('copy_corporation_deed');
    //         $('#copy_corporation_deed').addClass('is-invalid');
    //         $('#error-copy_corporation_deed').removeClass('d-none').text('Copy Corporation deed field is required')
    //     } else {

    //         $('#copy_corporation_deed').removeClass('is-invalid');
    //         $('#error-copy_corporation_deed').addClass('d-none').text('');
    //     }

    //     if (['undefined', '', null].includes(copy_management_deed)) {
    //         error_message.push('copy_management_deed');
    //         $('#copy_management_deed').addClass('is-invalid');
    //         $('#error-copy_management_deed').removeClass('d-none').text('Copy Management deed field is required')
    //     } else {

    //         $('#copy_management_deed').removeClass('is-invalid');
    //         $('#error-copy_management_deed').addClass('d-none').text('');
    //     }

    //     if (['undefined', '', null].includes(copy_sk_menkeh)) {
    //         error_message.push('copy_sk_menkeh');
    //         $('#copy_sk_menkeh').addClass('is-invalid');
    //         $('#error-copy_sk_menkeh').removeClass('d-none').text('Copy SK Menkeh field is required')
    //     } else {

    //         $('#copy_sk_menkeh').removeClass('is-invalid');
    //         $('#error-copy_sk_menkeh').addClass('d-none').text('');
    //     }

    //     if (error_message.length <= 0) {
    //         $('#form-merchant').submit();
    //     }
    // }
})

const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};

</script>
@endpush
