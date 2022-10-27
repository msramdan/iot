<div id="form-document" class="input-block form-merchant-file d-none" data-target_back="#form-personal">
    <h4>Upload Documents</h4>
    <div class="file-input-wrap">
        <!-- KTP -->
        <div class="custom-file">
            <input type="file" name="identity_card_photo" onchange="readUrl(this, '#show_identity_card_photo')" class="custom-file-input @error('identity_card_photo') is-invalid @enderror" id="identity_card_photo">
            <label class="custom-file-label" for="identity_card_photo"><img id="show_identity_card_photo" src="{{ asset('frontend/images/cloud.png') }}"></label>
            <span class="text">Foto KTP</span>
            @error('identity_card_photo')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- End KTP -->
        <!-- Selfie KTP -->
        <div class="custom-file">
            <input type="file" name="selfie_ktp_photo" onchange="readUrl(this, '#show_selfie_ktp_photo')" class="custom-file-input @error('selfie_ktp_photo') is-invalid @enderror" id="selfie_ktp_photo">
            <label class="custom-file-label" for="selfie_ktp_photo"><img id="show_selfie_ktp_photo" src="{{ asset('frontend/images/cloud.png') }}"></label>
            <span class="text">Foto Selfie KTP</span>
            @error('selfie_ktp_photo')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- End Selfie KTP -->
        <!-- NPWP -->
        <div class="custom-file">
            <input type="file" name="npwp_photo" onchange="readUrl(this, '#show_npwp_photo')" class="custom-file-input @error('npwp_photo') is-invalid @enderror" id="npwp_photo">
            <label class="custom-file-label" for="npwp_photo"><img id="show_npwp_photo" src="{{ asset('frontend/images/cloud.png') }}"></label>
            <span class="text">Foto NPWP</span>
            @error('npwp_photo')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- End NPWP -->
    </div>
    <div class="file-input-wrap">
        <!-- Outlet Photo -->
        <div class="custom-file">
            <input type="file" name="outlet_photo" onchange="readUrl(this, '#show_outlet_photo')" class="custom-file-input @error('outlet_photo') is-invalid @enderror" id="outlet_photo">
            <label class="custom-file-label" for="outlet_photo"><img id="show_outlet_photo" src="{{ asset('frontend/images/cloud.png') }}"></label>
            <span class="text">Foto Outlet</span>
            @error('outlet_photo')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- End Photo -->
        <!-- Owner + Outlet Photo -->
        <div class="custom-file">
            <input type="file" name="owner_outlet_photo" onchange="readUrl(this, '#show_owner_outlet_photo')" class="custom-file-input @error('owner_outlet_photo') is-invalid @enderror" id="owner_outlet_photo">
            <label class="custom-file-label" for="owner_outlet_photo"><img id="show_owner_outlet_photo" src="{{ asset('frontend/images/cloud.png') }}"></label>
            <span class="text">Foto Owner + Otlet</span>
            @error('owner_outlet_photo')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- End Owner + Outlet Photo -->
        <!-- Dalam Outlet -->
        <div class="custom-file">
            <input type="file" name="in_outlet_photo" onchange="readUrl(this, '#show_in_outlet_photo')" class="custom-file-input @error('in_outlet_photo') is-invalid @enderror" id="in_outlet_photo">
            <label class="custom-file-label" for="in_outlet_photo"><img id="show_in_outlet_photo" src="{{ asset('frontend/images/cloud.png') }}"></label>
            <span class="text">Foto Dalam Outlet</span>
            @error('in_outlet_photo')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- End Dalam Outlet -->
    </div>
    <div class="file-input-wrap">
        <!-- Surat Keterangan Domisili -->
        <div class="custom-file">
            <input type="file" name="certificate_of_domicile" onchange="readUrl(this, '#show_certificate_of_domicile')" class="custom-file-input @error('certificate_of_domicile') is-invalid @enderror" id="certificate_of_domicile">
            <label class="custom-file-label" for="certificate_of_domicile"><img id="show_certificate_of_domicile" src="{{ asset('frontend/images/cloud.png') }}"></label>
            <span class="text">Sertifikat Domisili (SKD / SITU)</span>
            @error('certificate_of_domicile')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- End Surat Keterangan Domisili -->
        <!-- Buku Rekening -->
        <div class="custom-file">
            <input type="file" name="copy_bank_account_book" onchange="readUrl(this, '#show_copy_bank_account_book')" class="custom-file-input @error('copy_bank_account_book') is-invalid @enderror" id="copy_bank_account_book">
            <label class="custom-file-label" for="copy_bank_account_book"><img id="show_copy_bank_account_book" src="{{ asset('frontend/images/cloud.png') }}"></label>
            <span class="text">Foto Buku Rekening</span>
            @error('copy_bank_account_book')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- End Buku Rekening -->
        <!-- Surat Sewa / Bukti Kepemilikan -->
        <div class="custom-file merchant-personal">
            <input type="file" name="copy_proof_ownership" onchange="readUrl(this, '#show_copy_proof_ownership')" class="custom-file-input @error('copy_proof_ownership') is-invalid @enderror" id="copy_proof_ownership">
            <label class="custom-file-label" for="copy_proof_ownership"><img id="show_copy_proof_ownership" src="{{ asset('frontend/images/cloud.png') }}"></label>
            <span class="text">Surat Sewa / Bukti Kepemilikan</span>
            @error('copy_proof_ownership')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- End Surat Sewa / Bukti Kepemilikan -->
    </div>
    <div class="file-input-wrap" id="merchant-bisnis1">
        <!-- SIUP / SURAT IJIN USAHA -->
        <div class="custom-file">
            <input type="file" name="siup_photo" onchange="readUrl(this, '#show_siup_photo')" class="custom-file-input @error('siup_photo') is-invalid @enderror" id="siup_photo">
            <label class="custom-file-label" for="siup_photo"><img id="show_siup_photo" src="{{ asset('frontend/images/cloud.png') }}"></label>
            <span class="text">SIUP / Surat Ijin Usaha</span>
            @error('siup_photo')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- END SIUP -->
        <!-- TDP -->
        <div class="custom-file">
            <input type="file" name="tdp_photo" onchange="readUrl(this, '#show_tdp_photo')" class="custom-file-input @error('tdp_photo') is-invalid @enderror" id="tdp_photo">
            <label class="custom-file-label" for="tdp_photo"><img id="show_tdp_photo" src="{{ asset('frontend/images/cloud.png') }}"></label>
            <span class="text">TDP</span>
            @error('tdp_photo')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- END TDP -->
        <!-- Akta Pendirian Perusahaan -->
        <div class="custom-file">
            <input type="file" name="copy_corporation_deed" onchange="readUrl(this, '#show_copy_corporation_deed')" class="custom-file-input @error('copy_corporation_deed') is-invalid @enderror" id="copy_corporation_deed">
            <label class="custom-file-label" for="copy_corporation_deed"><img id="show_copy_corporation_deed" src="{{ asset('frontend/images/cloud.png') }}"></label>
            <span class="text">Akta Pendirian Perusahaan</span>
            @error('copy_corporation_deed')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- End Akta Pendirian Perusahaan -->
    </div>
    <div class="file-input-wrap" id="merchant-bisnis2">
        <!-- Copy Akta Perubahan / Pengurus Perusahaan -->
        <div class="custom-file">
            <input type="file" name="copy_management_deed" onchange="readUrl(this, '#show_copy_management_deed')" class="custom-file-input @error('copy_management_deed') is-invalid @enderror" id="copy_management_deed">
            <label class="custom-file-label" for="copy_management_deed"><img id="show_copy_management_deed" src="{{ asset('frontend/images/cloud.png') }}"></label>
            <span class="text">Akta Pengurus Perusahaan</span>
            @error('copy_management_deed')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- End Copy Akta Perubahan / Pengurus Perusahaan -->
        <!-- Copy SK Menkeh -->
        <div class="custom-file">
            <input type="file" name="copy_sk_menkeh" onchange="readUrl(this, '#show_copy_sk_menkeh')" class="custom-file-input @error('copy_sk_menkeh') is-invalid @enderror" id="copy_sk_menkeh">
            <label class="custom-file-label" for="copy_sk_menkeh"><img id="show_copy_sk_menkeh" src="{{ asset('frontend/images/cloud.png') }}"></label>
            <span class="text">SK Menkeh / Depkumham</span>
            @error('copy_sk_menkeh')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- End SK Menkeh -->
         <div class="custom-file">
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
